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
