@extends('client.layout.app')

@section('title')
    <title>VNPay</title>
@endsection

@section('return_vnpay')
    <!--Begin display -->
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">VNPay Response</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <!--Begin display -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Thông tin thanh toán</h2>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <h3>Thông tin đơn hàng</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <td>
                                        <?php echo $_GET['vnp_TxnRef']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Motel Name</th>
                                    <td>
                                        {{ $order->booking->motel->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Số tiền</th>
                                    <td>
                                        {{ number_format($order->total) }} VNĐ
                                    </td>
                                </tr>
                                <tr>
                                    <th>Check In - Out</th>
                                    <td>
                                        {{ $order->booking->start }} - {{ $order->booking->end }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Thông tin giao dịch</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Mã phản hồi</th>
                                    <td>
                                        <?php echo $_GET['vnp_ResponseCode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mã GD tại VNPAY</th>
                                    <td>
                                        <?php echo $_GET['vnp_TransactionNo']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mã Ngân hàng</th>
                                    <td>
                                        <?php echo $_GET['vnp_BankCode']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Thời gian thanh toán</th>
                                    <td>
                                        <?php echo $_GET['vnp_PayDate']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Kết quả giao dịch</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kết quả</th>
                                    <td>
                                        <?php
                                        if ($_GET['vnp_ResponseCode'] == '00') {
                                            echo 'GD Thanh cong';
                                        } else {
                                            echo 'GD Khong thanh cong';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nội dung</th>
                                    <td>
                                        No Message
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
