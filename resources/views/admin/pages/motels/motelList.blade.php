@extends('admin.layout.app')

@section('title')
    Mot3l List
@endsection

@section('motels.index')
    <div class="container-fluid">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 p-3 d-flex align-items-center justify-content-between gap-3">
                            <div class="">
                                <h6 class="mb-1">Projects</h6>
                                <p class="text-sm">Architects design houses</p>
                            </div>
                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Filters
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Motel Filter</h5>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('motels.search') }}" method="post">
                                                @csrf
                                                {{-- include: price, provinces, districts, wards, checkbox attribute, name --}}
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                        <input type="text" class="form-control" placeholder="Motel Name"
                                                            name="name" aria-label="Username"
                                                            aria-describedby="basic-addon1">
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
                                                    <div class="row">
                                                        @foreach ($attrs as $item)
                                                            <div class="form-check col-4">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="fcustomCheck1" name="attribute[]"
                                                                    value="{{ $item->id }}">
                                                                <label class="custom-control-label" for="customCheck1">
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
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <a href="{{ route('motels.create') }}">
                                        <div class="card h-100 card-plain border">
                                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                                <a href="{{ route('motels.create') }}">
                                                    <i class="fa fa-plus text-secondary mb-3"></i>
                                                    <h5 class=" text-secondary"> New project </h5>
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @foreach ($motels as $motel)
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-3">
                                        <div class="card card-blog card-plain">
                                            <div class="position-relative">
                                                {{-- @dd($motel->images[1]->name) --}}
                                                <a class="d-block shadow-xl border-radius-xl">
                                                    <img src="{{ asset('motel_images/' . $motel->images[0]->name) }}"
                                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-xl"
                                                        style="aspect-ratio: 128/73" />
                                                </a>
                                            </div>
                                            <div class="card-body px-1 pb-0 d-flex flex-column justify-content-between"
                                                style="height: 192px">
                                                <div>
                                                    <p class="text-gradient text-dark mb-2 text-sm">
                                                        VND {{ number_format($motel->price) }}/night</p>
                                                    <a href="javascript:;">
                                                        <h5>
                                                            {{ $motel->name }}
                                                        </h5>
                                                    </a>
                                                    <p class="mb-4 text-sm">
                                                        {{ $motel->province->name }}, {{ $motel->district->name }},
                                                        {{ $motel->ward->name }}
                                                    </p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <a href="{{ route('motels.show', [$motel->id]) }}" type="button"
                                                        class="btn btn-outline-primary btn-sm mb-0">View
                                                        Project</a>
                                                    <div class="avatar-group mt-2">
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Elena Morison">
                                                            <img alt="Image placeholder" src="img/team-1.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Ryan Milly">
                                                            <img alt="Image placeholder" src="img/team-2.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Nick Daniel">
                                                            <img alt="Image placeholder" src="img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Peterson">
                                                            <img alt="Image placeholder" src="img/team-4.jpg">
                                                        </a>
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
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#province').on('change', function() {
                var province_id = this.value;
                console.log(province_id);
                $("#district").html('');
                $.ajax({
                    type: "POST",
                    url: "{{ route('district') }}",
                    data: {
                        province_id: province_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        console.log(result);
                        $('#district').html('<option value="">Select District</option>');
                        $.each(result, function(key, value) {
                            $("#district").append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                        $('#ward').html(
                            '<option value="">Select District First</option>');
                    }
                });
            });
            $('#district').on('change', function() {
                var district_id = this.value;
                $("#ward").html('');
                $.ajax({
                    type: "POST",
                    url: "{{ route('ward') }}",
                    data: {
                        district_id: district_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        $('#ward').html('<option value="">Select Ward</option>');
                        $.each(result, function(key, value) {
                            $("#ward").append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
