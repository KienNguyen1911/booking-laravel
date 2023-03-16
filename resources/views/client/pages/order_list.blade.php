@extends('client.layout.app')

@section('title')
    <title>Order List</title>
@endsection

@section('order_list')
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
                @forelse ($orders as $order)
                    <div class="col-lg-3 col-md-4 col-sm-1">
                        <div class="card my-2" style="height: 370px;">
                            <div class="card-header p-0 position-relative z-index-1">
                                <a href="{{ route('order.show', [$order->id]) }}" class="d-block">
                                    <img src="{{ asset('motel_images/' . $order->booking->motel->images[0]->name) }}"
                                        class="img-fluid border-radius-lg" style="aspect-ratio: 16/11">
                                </a>
                            </div>

                            <div class="card-body pt-2 d-flex"
                                style="flex-direction: column; justify-content: space-evenly;">
                                <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">
                                    {{ $order->booking->motel->province->name }}
                                </span>
                                <a href="{{ route('order.show', [$order->id]) }}" class="card-title h5 d-block text-darker">
                                    {{ $order->booking->motel->name }}
                                </a>
                                <div class="author align-items-center">
                                    <div class="name">
                                        <span>Total: VND {{ number_format($order->total) }}
                                        </span>
                                        <div class="stats">
                                            <small>Posted on
                                                {{ $order->booking->start }} - {{ $order->booking->end }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card-body pt-2 d-flex" style="flex-direction: column; justify-content: space-evenly;">
                            <h1 class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2 text-center">
                                You have no order
                            </h1>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
