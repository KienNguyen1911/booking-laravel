@extends('client.layout.app')

@section('title')
    <title>VNPay Sandbox</title>
@endsection

@section('vnpay_pay')
    {{-- @dd($request->all()) --}}
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">VNPay </h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container card my-3">
        <h3>Tạo mới đơn hàng</h3>
        <div class="table-responsive">
            <form action="{{ route('postVNPay') }}" id="frmCreateOrder" method="post" class="py-3">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $request->booking_id }}">
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" data-val="true" data-val-number="The field Amount must be a number."
                        id="amount" max="100000000" min="1" name="total" type="text"
                        value="{{ $request->total }}" readonly />
                </div>
                <h4>Chọn phương thức thanh toán</h4>
                <div class="form-group">
                    <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
                    <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                    <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>

                    <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
                    <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
                    <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                    <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>

                    <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                    <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>

                </div>
                <div class="form-group">
                    <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                    <input type="radio" id="language" Checked="True" name="language" value="vn">
                    <label for="language">Tiếng việt</label><br>
                    <input type="radio" id="language" name="language" value="en">
                    <label for="language">Tiếng anh</label><br>

                </div>
                <button type="submit" name="redirect" class="btn btn-primary">Thanh toán</button>
            </form>
        </div>
    </div>
@endsection
