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
                        <img src="{{ asset('motel_images/' . $motel->images[0]->name) }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-xl" style="aspect-ratio: 128/73; object-fit:cover" />
                    </a>
                </div>
                <div class="card-body px-1 pb-0 d-flex flex-column justify-content-between" style="height: 192px">
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
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Elena Morison">
                                <img alt="Image placeholder" src="img/team-1.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Ryan Milly">
                                <img alt="Image placeholder" src="img/team-2.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Nick Daniel">
                                <img alt="Image placeholder" src="img/team-3.jpg">
                            </a>
                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Peterson">
                                <img alt="Image placeholder" src="img/team-4.jpg">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row mt-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $motels->links() }}
            </div>
        </div>
    </div>
</div>
