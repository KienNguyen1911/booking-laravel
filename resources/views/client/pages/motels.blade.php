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
            <div class="row ">
                <div class="col-lg-6">
                    <h2 class="mb-4">Motels</h2>
                </div>
                <div class="col-lg-6">
                    <button type="button" class="btn bg-primary text-white float-right" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Filters
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Motel Filter</h5>
                                    <button type="button" class="btn btn-close text-dark" data-bs-dismiss="modal"
                                        aria-label="Close">X
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('motels.search.client') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <input type="text" class="form-control" placeholder="Motel Name"
                                                    name="name" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <select class="form-control" name="price" id="">
                                                    <option value="">Price</option>
                                                    <option value="asc">Low-High</option>
                                                    <option value="desc">High-Low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <select class="form-control" name="province_id" id="province">
                                                    <option value="">Province</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <select class="form-control" name="district_id" id="district">
                                                    <option value="">District</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                <select class="form-control" name="ward_id" id="ward">
                                                    <option value="">Ward</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row px-4">
                                                @foreach ($attrs as $item)
                                                    <div class="form-check col-4">
                                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                            name="attribute[]" value="{{ $item->id }}">
                                                        <label class="form-check-label" for="customCheck1">
                                                            {{ $item->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn bg-gradient-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                <a href="{{ route('motels.show.client', [$motel->id]) }}"
                                    class="card-title h5 d-block text-darker">
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
