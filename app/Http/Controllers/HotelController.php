<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $hotels = Hotel::all();

        return view('hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $hotelRequest, Hotel $hotel): RedirectResponse
    {
        DB::beginTransaction();

        try {

            $hotel->create($hotelRequest->all());

            DB::commit();

            return redirect()->route('hotel.index')->with('success', 'Hotel cadastrado com sucesso');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('hotel.index', $hotel->id)->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel): View
    {
        return view('hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel): View
    {
        return view('hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $hotelRequest, Hotel $hotel): RedirectResponse
    {
        DB::beginTransaction();

        try {

            $hotel->update($hotelRequest->all());

            DB::commit();

            return redirect()->route('hotel.index', $hotel->id)->with('success', 'Hotel atualizado com sucesso!');
        } catch (\Exception $e) {

            DB::rollback();

            return redirect()->route('hotel.index', $hotel->id)->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel): RedirectResponse
    {
        DB::beginTransaction();

        try {
            if ($hotel->rooms()->exists()) {
                return redirect()->back()->with('error', 'Não é possível excluir o hotel, pois existem quartos vinculadas à ele.');
            }

            $hotel->delete();

            DB::commit();

            return redirect()->route('hotel.index')->with('success', 'Hotel excluído com sucesso!');
        } catch (ModelNotFoundException $e) {

            DB::rollback();

            return redirect()->route('hotel.index')->with('error', $e->getMessage());
        }
    }
}
