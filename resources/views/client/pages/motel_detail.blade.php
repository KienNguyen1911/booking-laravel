@extends('client.layout.app')

@section('title')
    <title>Motel - {{ $motel->name }}</title>
@endsection

@section('motel_details')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Motel - {{ $motel->name }}</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia
                            and Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container my-1">
            <div class="mb-5">
                <div class="mb-5">
                    <div class="owl-single dots-absolute owl-carousel">
                        @foreach ($motel->images as $image)
                            <img src="{{ asset('motel_images/' . $image->name) }}" alt="Free HTML Template by Untree.co"
                                class="img-fluid" style="height: 600px;" />
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="card">

                        <div class="card-header">
                            <h2 class="section-title">
                                {{ $motel->name }}
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="price ml-auto">
                                <h5>Price: $ {{ $motel->price }} /night</h5>
                            </div>
                            <h5>Address: {{ $motel->province->name }}, {{ $motel->district->name }},
                                {{ $motel->ward->name }}</h5>
                            <p class="description">
                                {{ $motel->description }}
                            </p>
                            <div class="services">
                                <h5>Services</h5>
                                <ul>
                                    @foreach ($motel->attrs as $attr)
                                        <li>{{ $attr->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="services">
                                <h5>Owner: {{ $motel->user->name }}</h5>
                                <h5>Contact: {{ $motel->user->email }}</h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-5">
                    <div class="card">

                        <div class="card-header">
                            <h2 class="section-title">
                                Check-In & Check-Out
                            </h2>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('booking.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="motel_id" value="{{ $motel->id }}">
                                <div class="my-3">
                                    <h4>Day In</h4>
                                    <input type="text" class="daterange form-control" name="start">
                                </div>
                                <div class="my-3">
                                    <h4>Day Out</h4>
                                    <input type="text" class="daterange form-control" name="end">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Search">
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(".daterange").daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: "Clear",
                },
                minDate: moment().subtract(0, "days"),

            });

            $(".daterange").on("apply.daterangepicker", function(ev, picker) {
                $('input[name="start"]').val(picker.startDate.format("YYYY-MM-DD"));
                $('input[name="end"]').val(picker.endDate.format("YYYY-MM-DD"));
            });

            $('input[name="start"], input[name="end"] ').on(
                "cancel.daterangepicker",
                function(ev, picker) {
                    $(this).val("");
                }
            );

        });
    </script>
@endsection
