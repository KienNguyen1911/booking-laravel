<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VNPayService
{
    protected $orderService;
    protected $mailService;
    public function __construct(OrderService $orderService, MailService $mailService)
    {
        $this->orderService = $orderService;
        $this->mailService = $mailService;
    }

    public function  postVNPay(Request $request)
    {
        // dd($request->all());

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $vnp_Returnurl = route('vnpayReturn');
        $vnp_TmnCode = "3TFOBTC5"; //Mã website tại VNPAY 
        $vnp_HashSecret = "FNFUEFRHYUKMOZVLFQIIJOXTARGKCXOD"; //Chuỗi bí mật

        $total = $request->total;
        $total = str_replace(',', '', $total);
        $total = (int) $total;
        // dd($total);

        $vnp_TxnRef = $request->booking_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        // $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $_POST['bankCode'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            // "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function returnVnpay()
    {
        $vnp_TmnCode = "RM8VTI9U"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "YDBWOBZLBAWFDGIVAUIDWDFCASTQAJRH"; //Secret key

        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $data = [
            'booking_id' => $inputData['vnp_TxnRef'],
            'total' => $inputData['vnp_Amount'] / 100,
        ];
        $order = $this->orderService->create($data);
        $owner = User::findOrFail($order->booking->motel->owner_id);
        $this->mailService->mailOrder(Auth::user()->email, $order, 'Order Success!!!');
        $this->mailService->mailOrderOwner($owner->email, $order, 'New Order!!!');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        return $order;
    }
}
