@extends('admin.layout.app')

@section('title')
    Mot3l List
@endsection

@section('motels.index')
    <div class="container-fluid">
        <div class="container-fluid py-4">
            <div class="row row-motel">
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between gap-3">
                            <div class="">
                                <h6 class="mb-1">Projects</h6>
                                <p class="text-sm">Architects design houses</p>
                            </div>
                            {{-- <form action="" method="get" class="d-flex">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <input type="text" class="form-control search-name" placeholder="Motel Name"
                                            data-route="{{ route('motels.search.name') }}" name="name"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <select class="form-control search-price" name="price" id=""
                                            data-route="{{ route('motels.search.name') }}">
                                            <option value="">Price</option>
                                            <option value="asc">Low - High</option>
                                            <option value="desc">High - Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">@</span>
                                        <select class="form-control province search-province" name="province_id"
                                            data-route="{{ route('motels.search.name') }}">
                                            <option value="">Province</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">
                                                    {{ $province->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form> --}}
                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                data-bs-target="#filterModal">
                                Filters
                            </button>
                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                Create a new Motel
                            </button>
                            <!-- Modal -->
                        </div>
                        <div class="card-body p-3">
                            {{-- loading... --}}
                            @include('admin.pages.motels.motel-load')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.motels.modal')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{ asset('admin/js/custom/address.js') }}"></script>
    <script src="{{ asset('admin/js/custom/motel.js') }}"></script>
@endsection
