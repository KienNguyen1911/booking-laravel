<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Motel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function create($request)
    {
        try {
            //code...
            DB::beginTransaction();
            $booking = new Booking();
            $booking->motel_id = $request->motel_id;
            $booking->user_id = Auth::user()->id;
            $booking->start = $request->start;
            $booking->end = $request->end;
            $booking->save();
            DB::commit();
            return $booking;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function getById($id)
    {
        $booking = Booking::findOrFail($id);

        $diff = strtotime($booking->start) - strtotime($booking->end);
        $result = abs(round($diff / 86400));

        $booking->days = $result;
        $booking->total = $result * $booking->motel->price;
        return $booking;
    }
}
