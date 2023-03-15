@extends('admin.layout.app')

@section('title')
    Show Mot3l
@endsection

@section('motels.show')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ __('Product Details') }}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 ">
                                <div class="ecommerce-gallery mx-3" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                                    <div class="row py-3 shadow-5">
                                        <div class="col-12 mb-1">
                                            <div class="lightbox">
                                                <img src="{{ asset('motel_images/' . $motel->images[0]->name) }}"
                                                    alt="Gallery image 1"
                                                    class="ecommerce-gallery-main-img active w-100 border-radius-lg shadow-sm"
                                                    style="height: 500px;" />
                                            </div>
                                        </div>
                                        @foreach ($motel->images as $image)
                                            <div class="col-3 mt-1">
                                                <img src="{{ asset('motel_images/' . $image->name) }}"
                                                    data-mdb-img="{{ asset('motel_images/' . $image->name) }}"
                                                    alt="Gallery image 1"
                                                    class="img active w-100 border-radius-lg shadow-sm"
                                                    style="height:100%" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class=" py-3 mx-auto">
                                    <h3>{{ $motel->name }}</h3>
                                    <br>
                                    <h6>Price: VND {{ number_format($motel->price) }}</h6>
                                    <span class="badge bg-gradient-success">{{ $motel->status }}</span>
                                    <br>
                                    <h6>Address: {{ $motel->province->name }}, {{ $motel->district->name }},
                                        {{ $motel->ward->name }}</h6>
                                    <p>{{ $motel->address }}</p>
                                    <h6 for="description">
                                        Description:
                                    </h6>
                                    <p id="description">{{ $motel->description }}</p>
                                    {{-- <br> --}}
                                    <h6 for="description">
                                        Attributes:
                                    </h6>
                                    <div class="row">
                                        {{-- {{ dd($motel->attrs) }} --}}
                                        @foreach ($motel->attrs as $attribute)
                                            <div class="col-6">
                                                <p>
                                                    <i class="fa-regular fa-circle-check"></i>
                                                    {{ $attribute->name }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <a class="btn btn-info" href="{{ route('motels.edit', [$motel->id]) }}">Edit this motel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // slider image gallery
        const galleryMainImg = document.querySelector('.ecommerce-gallery-main-img');
        const galleryImgs = document.querySelectorAll('.ecommerce-gallery img');

        galleryImgs.forEach(img => {
            img.addEventListener('click', (e) => {
                galleryMainImg.src = e.target.dataset.mdbImg;
                galleryImgs.forEach(img => img.classList.remove('active'));
                e.target.classList.add('active');
            });
        });
    </script>
@endsection
