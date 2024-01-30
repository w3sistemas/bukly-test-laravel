<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index(): JsonResponse
    {
        $hotels = Hotel::all();
        return response()->json(['hotels' => $hotels], 200);
    }

    public function store(HotelRequest $hotelRequest): JsonResponse
    {
        DB::beginTransaction();

        try {
            $hotel = Hotel::create($hotelRequest->all());

            DB::commit();

            return response()->json(['hotel' => $hotel], 201);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
