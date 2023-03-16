<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\BookingService;
use App\Services\OrderService;
use App\Services\VNPayService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Replace;

class OrderController extends Controller
{
    protected $orderService;
    protected $vnpayService;
    protected $bookingService;

    public function __construct(OrderService $orderService, VNPayService $vnpayService, BookingService $bookingService)
    {
        $this->orderService = $orderService;
        $this->vnpayService = $vnpayService;
        $this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = $this->orderService->getOrderByUser();
        return view('client.pages.order_list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): View
    {
        // dd($request->all());
        return view('vnpay.vnpay_pay', [
            'request' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): View
    {
        //
        $order = $this->vnpayService->postVNPay($request);
        return view('vnpay.vnpay_pay', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        //
        $order = $this->orderService->getById($id);
        return view('client.pages.order_detail', [
            'order' => $order,
        ]);
    }

    public function postVNPay(Request $request)
    {
        // convert string to integer
        $this->vnpayService->postVNPay($request);
    }

    public function vnpayReturn(Request $request)
    {
        // convert string to integer
        $order = $this->vnpayService->returnVnpay($request);
        return view('vnpay.vnpay_return', ['order' => $order]);
    }

    // ================== ADMIN ==================
    public function getAllOrder()
    {
        $orders = $this->orderService->getAll();
        $totalByMonth = $this->orderService->getTotalByMonth();
        // dd($totalByMonth);
        return view('admin.pages.billing', [
            'orders' => $orders,
            'totalByMonth' => $totalByMonth,
        ]);
    }

    public function getOrderByOwner()
    {
        $orders = $this->orderService->getOrderByOwner();
        return view('admin.pages.order_owner', [
            'orders' => $orders,
        ]);
    }
}
