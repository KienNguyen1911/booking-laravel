@extends('client.layout.app')

@section('title')
    <title>Order - {{ $order->booking->motel->name }}</title>
@endsection

@section('order_detail')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Your Orders</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container my-5">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order #{{ $order->id }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Booking Information</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Booking ID</th>
                                            <td>{{ $order->booking->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Check In</th>
                                            <td>{{ $order->booking->start }}</td>
                                        </tr>
                                        <tr>
                                            <th>Check Out</th>
                                            <td>{{ $order->booking->end }}</td>
                                        </tr>
                                    </table>
                                    <h5>Motel Information</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Motel Name</th>
                                            <td>{{ $order->booking->motel->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Price/night</th>
                                            <td>{{ number_format($order->booking->motel->price) }}VND</td>
                                        </tr>
                                        <tr>
                                            <th>Province</th>
                                            <td>{{ $order->booking->motel->province->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>District</th>
                                            <td>{{ $order->booking->motel->district->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ward</th>
                                            <td>{{ $order->booking->motel->ward->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td><a class="btn btn-success py-1 px-3" target="_blank"
                                                    href="{{ route('motels.show.client', [$order->booking->motel->id]) }}">View
                                                    Iamges Here!!!</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h5>Order Information</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Order ID</th>
                                            <td>{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Date</th>
                                            <td class="text-danger">{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Amount</th>
                                            <td>{{ number_format($order->total) }} VND</td>
                                        </tr>
                                    </table>

                                    <h5>Owner Information</h5>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Owner Name</th>
                                            <td>{{ $order->booking->motel->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Owner Email</th>
                                            <td>{{ $order->booking->motel->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Owner Phone</th>
                                            <td>{{ $order->booking->motel->user->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
