@extends('admin.layout.app')

@section('order_owner')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fas fa-landmark opacity-10"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">VNPay</h6>
                                <span class="text-xs">Belong Interactive</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">+$2000</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="fab fa-paypal opacity-10"></i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Paypal</h6>
                                <span class="text-xs">Freelance Payment</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">$455.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Billing Information</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            {{-- @dd($orders) --}}
                            @foreach ($orders as $order)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{ $order->id }} - {{ $order->booking->motel->name }}
                                        </h6>
                                        <span class="mb-2 text-xs">Customer Name:
                                            <span class="text-dark font-weight-bold ms-sm-2">
                                                {{ $order->booking->user->name }}- {{ $order->booking->user->email }}
                                            </span>
                                        </span>
                                        <span class="mb-2 text-xs">In-Out:
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                {{ $order->booking->start }} to {{ $order->booking->end }}
                                            </span>
                                        </span>
                                        <span class="mb-2 text-xs">Total:
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                {{ number_format($order->total) }}VND
                                            </span>
                                        </span>
                                        <span class="text-xs">Owner:
                                            <span class="text-dark ms-sm-2 font-weight-bold">
                                                {{ $order->booking->motel->user->name }} -
                                                {{ $order->booking->motel->user->email }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                                class="fas fa-pencil-alt text-dark me-2"
                                                aria-hidden="true"></i>created_at</a>
                                        <a class="btn btn-link px-3 mb-0" href="javascript:;">
                                            {{ $order->created_at }}
                                        </a>

                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Your Transaction's</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>23 - 30 March 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                        <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                        <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,000
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                        <span class="text-xs">26 March 2020, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 750
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                                        <span class="text-xs">26 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 1,000
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                        <span class="text-xs">26 March 2020, at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-exclamation"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                        <span class="text-xs">26 March 2020, at 05:00 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                    Pending
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
