@extends('admin.layout.app')

@section('title')
    Create Motel
@endsection

@section('motels.create')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Add new motel </h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form method="post" action="{{ route('motels.store') }}" style="padding: 10px 20px 0px;"
                            enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 col-sm-12">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Name
                                                    Motel</label>
                                                <x-text-input class="form-control" type="text" name="name"
                                                    :value="$motel->name" id="example-text-input"
                                                    placeholder="ex: Hotel Tinh Yeu" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Price</label>
                                                <x-text-input class="form-control" type="number" name="price"
                                                    value="{{ old('price') }}" id="example-number-input"
                                                    placeholder="ex: 1000$" required />
                                                <x-input-error :messages="$errors->get('price')" class="mt-2" />

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Status</label>
                                                <x-text-input class="form-control" type="text" name="status"
                                                    value="{{ old('status') }}" id="example-text-input"
                                                    placeholder="ex: Open" required />
                                                <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Area</label>
                                                <x-text-input class="form-control" type="text" name="acreage"
                                                    value="{{ old('acreage') }}" id="example-text-input"
                                                    placeholder="ex: 30m2" required />
                                                <x-input-error :messages="$errors->get('acreage')" class="mt-2" />

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Province</label>
                                                <select class="form-control" id="province" name="province_id">
                                                    <option value="" selected disabled>Choose province</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">
                                                            {{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">District</label>
                                                <select class="form-control" id="district" name="district_id">
                                                    <option selected>Choose District</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Ward</label>
                                                <select class="form-control" id="ward" name="ward_id">
                                                    <option selected>Choose Ward</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="">Address</label>
                                            <x-text-input type="text" class="form-control" name="address" id="address"
                                                :value="old('address')" placeholder="ex: 123 Nguyen Van Linh" required />
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="files" class="form-control-label">Motel Image</label>
                                        <input class="form-control upload__inputfile" type="file" name="images[]"
                                            multiple id="files" placeholder="ex: Air-Conditioner" required>
                                        <div class="upload-img"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Description</label>
                                        <textarea class="form-control" type="text" name="description" id="example-text-input"
                                            placeholder="ex: Air-Conditioner" required>
                                            {{ old('description') }}
                                        </textarea>
                                    </div>

                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    @foreach ($attrs as $item)
                                        {{-- {{ dd($item) }} --}}
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                                name="attribute[]" value="{{ $item->id }}">
                                            <label class="custom-control-label" for="customCheck1">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Motel Creator </h6>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-xxl position-relative">
                                    <img src="{{ asset('admin/img/bruce-mars.jpg') }}" alt="profile_image"
                                        class="w-100 border-radius-lg shadow-sm">
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-1">
                                        {{ Auth::user()->name }}
                                    </h5>
                                    <p class="mb-0 font-weight-bold text-sm">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @error('field')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script>
        // preview multiple upload image
        const uploadInput = document.querySelector('.upload__inputfile');
        const uploadImg = document.querySelector('.upload-img');

        uploadInput.addEventListener('change', function() {
            const files = this.files;
            if (files) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        const img = document.createElement('img');
                        img.src = this.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                        img.style.margin = '5px';
                        uploadImg.appendChild(img);
                    });
                    reader.readAsDataURL(file);
                });
            }
        });

        // delete an image in preview and input file
        uploadImg.addEventListener('click', function(e) {
            if (e.target.tagName === 'IMG') {
                const imgSrc = e.target.src;
                const imgName = imgSrc.split('/').pop();
                const allFiles = uploadInput.files;
                Array.from(allFiles).forEach(file => {
                    if (file.name === imgName) {
                        file.remove();
                    }
                });
                e.target.remove();
            }
        });
    </script>

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
