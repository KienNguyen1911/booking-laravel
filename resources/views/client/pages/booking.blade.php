@extends('client.layout.app')

@section('title')
    <title>Booking - {{ $booking->motel->name }}</title>
@endsection

@section('booking')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Booking - {{ $booking->motel->name }} </h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="custom-block" data-aos="fade-up">

                    <h2 class="section-title text-center" style="display: block;">Gallery</h2>
                    <div class="row gutter-v2 gallery">
                        @foreach ($booking->motel->images as $image)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <a href="{{ asset('motel_images/' . $image->name) }}" class="gal-item" data-fancybox="gal"
                                    style="height: 250px; object-fit: cover; overflow: hidden;">
                                    <img src="{{ asset('motel_images/' . $image->name) }}" alt="Image" class="img-fluid">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="untree_co-section" style="padding-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <form class="contact-form" action="" data-aos="fade-up" data-aos-delay="200" method="post">

                        <div class="form-group">
                            <label class="text-black" for="email">Name Home</label>
                            <input type="text" class="form-control" id="email" value="{{ $booking->motel->name }}"
                                readonly>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="fname">Check In</label>
                                    <input type="text" class="form-control" id="fname" value="{{ $booking->start }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="lname">Check Out</label>
                                    <input type="text" class="form-control" id="lname" value="{{ $booking->end }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="message">Price/night</label>
                                    <input name="" class="form-control" id="message" cols="30" rows="5"
                                        value="{{ number_format($booking->motel->price) }}" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="message">Number of night</label>
                                    <input name="" class="form-control" id="message" cols="30" rows="5"
                                        value="{{ $booking->days }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-black" for="message">Total Moneyyy</label>
                            <input name="total" class="form-control" id="message" cols="30" rows="5"
                                value="{{ number_format($booking->total) }}" readonly>
                        </div>

                        <div class="d-flex">
                            <!-- <button type="submit" class="btn btn-primary w-100">Order</button> -->
                            <button name="redirect" type="submit" class="btn btn-primary w-100">VNPay</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5 ml-auto">
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-house"></span>
                        <address class="text">
                            {{ $booking->motel->address }},
                            {{ $booking->motel->ward->name }},{{ $booking->motel->district->name }},
                            {{ $booking->motel->province->name }}
                        </address>
                    </div>
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-phone-call"></span>
                        <address class="text">
                            {{ $booking->user->phone }}
                        </address>
                    </div>
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-mail"></span>
                        <address class="text">
                            {{ $booking->user->email }}
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
