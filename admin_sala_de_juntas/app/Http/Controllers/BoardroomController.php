<?php

namespace App\Http\Controllers;

use App\Models\Boardroom;
use Illuminate\Http\Request;

/**
 * Class BoardroomController
 * @package App\Http\Controllers
 */
class BoardroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boardrooms = Boardroom::paginate();

        return view('boardroom.index', compact('boardrooms'))
            ->with('i', (request()->input('page', 1) - 1) * $boardrooms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boardroom = new Boardroom();
        return view('boardroom.create', compact('boardroom'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Boardroom::$rules);

        $boardroom = Boardroom::create($request->all());

        return redirect()->route('boardrooms.index')
            ->with('success', 'Boardroom created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boardroom = Boardroom::find($id);

        return view('boardroom.show', compact('boardroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $boardroom = Boardroom::find($id);

        return view('boardroom.edit', compact('boardroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Boardroom $boardroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boardroom $boardroom)
    {
        request()->validate(Boardroom::$rules);

        $boardroom->update($request->all());

        return redirect()->route('boardrooms.index')
            ->with('success', 'Boardroom updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $boardroom = Boardroom::find($id)->delete();

        return redirect()->route('boardrooms.index')
            ->with('success', 'Boardroom deleted successfully');
    }
}
