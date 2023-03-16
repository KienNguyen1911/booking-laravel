<?php

namespace App\Services;

use App\Models\Motel;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function create($request)
    {
        try {
            //code...
            DB::beginTransaction();
            $order = Order::create($request);
            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function getById($id)
    {
        $order = Order::findOrFail($id);
        return $order;
    }

    public function getOrderByMotel($id)
    {
        // join table order and booking and motel where motel_id = $id
        $order = Order::join('bookings', 'bookings.id', '=', 'orders.booking_id')
            ->join('motels', 'motels.id', '=', 'bookings.motel_id')
            ->where('motels.id', $id)
            ->select('bookings.start', 'bookings.end')
            ->get();
        return $order;
    }

    public function getOrderByUser()
    {
        $orders = Order::join('bookings', 'bookings.id', '=', 'orders.booking_id')
            ->join('motels', 'motels.id', '=', 'bookings.motel_id')
            ->where('bookings.user_id', Auth::user()->id)
            ->select('orders.*', 'motels.name as motel_name', 'motels.address as motel_address')
            ->get();
        return $orders;
    }
}
