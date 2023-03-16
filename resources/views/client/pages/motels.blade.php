@extends('client.layout.app')

@section('motels')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Elements</h1>
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
                @foreach ($motels as $motel)
                    <div class="col-lg-3 col-md-4 col-sm-1">
                        <div class="card my-2" style="height: 370px;">
                            <div class="card-header p-0 position-relative z-index-1">
                                <a href="{{ route('motels.show.client', [$motel->id]) }}" class="d-block">
                                    <img src="{{ asset('motel_images/' . $motel->images[0]->name) }}"
                                        class="img-fluid border-radius-lg" style="aspect-ratio: 16/11">
                                </a>
                            </div>

                            <div class="card-body pt-2 d-flex"
                                style="flex-direction: column; justify-content: space-evenly;">
                                <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">
                                    {{ $motel->province->name }}
                                </span>
                                <a href="{{ route('motels.show.client', [$motel->id]) }}" class="card-title h5 d-block text-darker">
                                    {{ $motel->name }}
                                </a>
                                <div class="author align-items-center">
                                    <div class="name">
                                        <span>Price: VND {{ number_format($motel->price) }}/night
                                        </span>
                                        <div class="stats">
                                            <small>Posted on
                                                {{ $motel->user->name }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    </div>
@endsection
