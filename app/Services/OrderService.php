<?php

namespace App\Services;

use App\Models\Motel;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function getAll()
    {
        $orders = Order::with('booking', 'motel', 'user')->orderBy('created_at', 'desc')->paginate(10);
        return $orders;
    }
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

    public function getTotalByMonth()
    {
        // select count(total) as totalmoney, month(created_at) as month from orders group by month(created_at)
        $money = Order::select(DB::raw('sum(total) as totalmoney, month(created_at) as month'))
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        return $money;
    }

    public function getOrderByOwner($id)
    {
        $orders = Order::with('booking', 'motel', 'user')
            ->join('bookings', 'bookings.id', '=', 'orders.booking_id')
            ->join('motels', 'motels.id', '=', 'bookings.motel_id')
            ->where('motels.owner_id', $id)
            ->orderBy('orders.created_at', 'desc')
            ->paginate(10);
        return $orders;
    }

    public function getTotalByMonthOwner($id)
    {
        // get total money by month of owner
        $money = Order::select(DB::raw('sum(total) as totalmoney, month(orders.created_at) as month'))
            ->join('bookings', 'bookings.id', '=', 'orders.booking_id')
            ->join('motels', 'motels.id', '=', 'bookings.motel_id')
            ->where('motels.owner_id', $id)
            ->groupBy(DB::raw('month(created_at)'))
            ->get();

        return $money;
    }
}
