<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Carbon;
use DateTime;

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
}
