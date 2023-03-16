@extends('admin.layout.app')

@section('images')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>Upload Image</h6>
                            <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data" class="d-flex gap-4">
                                @csrf
                                <input type="hidden" name="motel_id" value="{{ $images[0]->motel->id }}">
                                <input type="file" name="images[]" id="image" class="form-control" multiple>
                                <button type="submit" class="btn btn-primary m-0">Upload</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-lg-3 col-md-4 col-sm-6 mt-3" style="position: relative">
                                    <img src="{{ asset('motel_images/' . $image->name) }}"
                                        data-mdb-img="{{ asset('motel_images/' . $image->name) }}" alt="Gallery image 1"
                                        class="img active w-100 border-radius-lg shadow-sm"
                                        style="height:100%; aspect-ratio: 16/11" />
                                    <form action="{{ route('images.destroy', [$image->id]) }}" method="post"
                                        style="position: absolute; top: 100px; left:120px">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
