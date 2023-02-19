<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



/**
 * Class RoomController
 * @package App\Http\Controllers
 */

 
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate();

        return view('room.index', compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * $rooms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = new Room();
        return view('room.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Room::$rules);

        $room = Room::create($request->all());

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);

        return view('room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        //return view('room.available', compact('room'));
        
        return view('room.edit', compact('room'));
        
    }

    public function drop($id)
    {
        /*$room = Room::find($id);
            return view('room.available', compact('room'));*/
        /*$room->available = 'Available';
        $room->entry_time = null;
        $room->departure_time = null;
        $room->reserve = 'yes';
        $room->save();

        return response()->json(['success' => true]);*/
        //Ocupied validation 
        /*$availability = $room->available;
        if($availability == 'Occupied'){
            //update the room and redirect back to the rooms index with a success message
            $room->update($request->all());

            return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully');
        }else{
            return redirect()->route('rooms.index')
            ->with('error', 'This room is not occupied')
            ->with('alert', 'alert');
        }*/

        $room=Room::find($id);
        $room->available = 'Available';
        $room->entry_time = null;
        $room->departure_time = null;
        $room->reserve = 'yes';
        $room->save();
        return redirect()->route('rooms.index')
        ->with('success', 'Room updated successfully');
    }

    public function timer(){
        $rooms=Room::all('*');
        foreach($rooms as $room){
            echo '<script>console.log("'. $room->id .'")</script>';
            echo '<script>console.log("hi")</script>';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        // Validate the request
        request()->validate(Room::$rules);
        
        //time validation 
        // Get the entry and departure times from the request
        $entry_time = $request->entry_time;
        $departure_time = $request->departure_time;
        
        // Create DateTime objects from the entry and departure times
        $now = DateTime::createFromFormat('Y-m-d H:i:s', $entry_time);
        $until = DateTime::createFromFormat('Y-m-d H:i:s', $departure_time);
        
        // Check if the DateTime objects were created successfully
        if (!$now || !$until) {
            // If not, redirect back to the rooms index with an error message
            return redirect()->route('rooms.index')
                ->with('error', 'Invalid date format. Please use Y-m-d H:i:s format.');
        }
        
        // Calculate the time difference between the entry and departure times
        $diff = $until->diff($now);
        // Convert the time difference to hours, including any days
        $hrs = $diff->h + ($diff->days * 24);
        
        // Check if the time difference is more than 2 hours
        if($hrs > 2){
            // If it is, redirect back to the rooms index with an error message and an alert
            return redirect()->route('rooms.index')
                ->with('error', 'You cannot be in a room for more than 2hrs')
                ->with('alert', 'alert');
        }
        else{
            //Ocupied validation 
            $availability = $room->available;
            if($availability == 'Available'){
                //update the room and redirect back to the rooms index with a success message
                $room->update($request->all());
                return redirect()->route('rooms.index')
                ->with('success', 'Room updated successfully');
            }else{
                return redirect()->route('rooms.index')
                ->with('error', 'You cannot reserve an ocupied room')
                ->with('alert', 'alert');
            }
        }
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $room = Room::find($id)->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully');
    }

    public function makeRoomsAvailable()
    {
        $occupiedRooms = Room::where('Available', 'Occupied')->get();
        
        foreach ($occupiedRooms as $room) {
            $departureTime = Carbon::parse($room->departure_time);
            
            echo '<script>console.log("Now: '. Carbon::now('America/Mexico_City') .'")</script>';
            echo '<script>console.log("Table: '. $departureTime .'")</script>';
            echo '<script>console.log("London: '. Carbon::now('Europe/London') .'")</script>';

            $now=Carbon::now('America/Mexico_City');
            $table=Carbon::now('Europe/London');
            $time= $departureTime->format('Y-m-d H:i:s');

            if ($now->gt($time)) {
                DB::transaction(function () use ($room) {
                    $room->available = 'Available';
                    $room->entry_time = null;
                    $room->departure_time = null;
                    $room->reserve = 'yes';
                    $room->save();
                    
                });
                
            }
        }

        
    }



    /*private function releaseRoom(Room $room)
{
    // Check if the room has been occupied for 2 hours
    $entry_time = $room->entry_time;
    if ($entry_time) {
        $now = Carbon::now();
        $entry_time = Carbon::parse($entry_time);
        $diff = $now->diffInMinutes($entry_time);
        if ($diff >= 120) {
            // The room has been occupied for 2 hours or more, release the room
            DB::table('rooms')
                ->where('id', $room->id)
                ->update([
                    'available' => 'Available',
                    'entry_time' => null,
                    'departure_time' => null,
                    'reserve' => 'yes',
                ]);
        }
    }
}*/
}



