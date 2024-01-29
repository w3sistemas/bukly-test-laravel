<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $rooms = Room::all();

        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $roomRequest, Room $room): RedirectResponse
    {
        DB::beginTransaction();

        try {

            $room->create($roomRequest->all());

            DB::commit();

            return redirect()->route('room.index')->with('success', 'Quarto cadastrado com sucesso');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('room.index', $room->id)->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room): View
    {
        return view('room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room): View
    {
        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $roomRequest, Room $room): RedirectResponse
    {
        DB::beginTransaction();

        try {

            $room->update($roomRequest->all());

            DB::commit();

            return redirect()->route('room.index', $room->id)->with('success', 'Quarto atualizado com sucesso!');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('room.index', $room->id)->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room): RedirectResponse
    {
        DB::beginTransaction();

        try {

            $room->delete();

            DB::commit();

            return redirect()->route('room.index')->with('success', 'Quarto excluído com sucesso!');
        } catch (ModelNotFoundException $e) {

            DB::rollback();

            return redirect()->route('room.index')->with('error', $e->getMessage());
        }
    }
}
