{{-- Filter Modal --}}
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Motel Filter</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motels.search') }}" method="get" class="searchModal" id="search">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Motel Name" name="name"
                                aria-label="Username" aria-describedby="basic-addon1">
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
                            <select class="form-control province" name="province_id">
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
                            <select class="form-control district" name="district_id">
                                <option value="">District</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <select class="form-control ward" name="ward_id">
                                <option value="">Ward</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            @foreach ($attrs as $item)
                                <div class="form-check col-4">
                                    <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                        name="attribute[]" value="{{ $item->id }}">
                                    <label class="custom-control-label" for="customCheck1">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Create Modal --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body px-0 pt-0 pb-2">
                    <form method="post" action="{{ route('motels.store') }}" style="padding: 10px 20px 0px;"
                        enctype="multipart/form-data" class="motelModal" id="create">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 col-sm-12">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Name
                                                Motel</label>
                                            <x-text-input class="form-control" type="text" name="name"
                                                :value="old('name')" id="example-text-input"
                                                placeholder="ex: Hotel Tinh Yeu" />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Price</label>
                                            <x-text-input class="form-control" type="number" name="price"
                                                value="{{ old('price') }}" id="example-number-input" min="100000"
                                                placeholder="ex: 1000$" />
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
                                                placeholder="ex: Open" />
                                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Area</label>
                                            <x-text-input class="form-control" type="number" name="acreage"
                                                value="{{ old('acreage') }}" id="example-text-input" max="200"
                                                placeholder="ex: 30m2" />
                                            <x-input-error :messages="$errors->get('acreage')" class="mt-2" />

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Province</label>
                                            <select class="form-control province" id="province" name="province_id"
                                                data-url="{{ route('district') }}">
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
                                            <select class="form-control district" id="district" name="district_id"
                                                data-url="{{ route('ward') }}">
                                                <option selected>Choose District</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Ward</label>
                                            <select class="form-control ward" id="ward" name="ward_id">
                                                <option selected>Choose Ward</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Address</label>
                                        <x-text-input type="text" class="form-control" name="address"
                                            id="address" :value="old('address')" placeholder="ex: 123 Nguyen Van Linh" />
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="files" class="form-control-label">Motel Image</label>
                                    <input class="form-control upload__inputfile" type="file" name="images[]"
                                        multiple id="files" placeholder="ex: Air-Conditioner">
                                    <div class="upload-img"></div>
                                    <x-input-error :messages="$errors->get('images')" />
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description</label>
                                    <textarea class="form-control" type="text" name="description" id="example-text-input"
                                        placeholder="ex: Air-Conditioner">
                                        {{ old('description') }}
                                    </textarea>
                                </div>

                            </div>

                            <div class="col-lg-4 col-sm-12 d-flex flex-wrap gap-3">
                                @foreach ($attrs as $item)
                                    {{-- {{ dd($item) }} --}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                            name="attribute[]" value="{{ $item->id }}" />
                                        <label class="custom-control-label" for="customCheck1">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-create"
                            style="width: 100%;">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{-- Update Modal --}}
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body px-0 pt-0 pb-2">
                    <form method="post" action="" style="padding: 10px 20px 0px;"
                        enctype="multipart/form-data" id="myForm" class="updateMotel">
                        @csrf
                        @method('PUT')
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
                                                :value="$motel->price" id="example-number-input" placeholder="ex: 1000$"
                                                required />
                                            <x-input-error :messages="$errors->get('price')" class="mt-2" />

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Status</label>
                                            <x-text-input class="form-control" type="text" name="status"
                                                :value="$motel->status" id="example-text-input" placeholder="ex: Open"
                                                required />
                                            <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Area</label>
                                            <x-text-input class="form-control" type="text" name="acreage"
                                                :value="$motel->acreage" id="example-text-input" placeholder="ex: 30m2"
                                                required />
                                            <x-input-error :messages="$errors->get('acreage')" class="mt-2" />

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Province</label>
                                            <select class="form-control" id="province" name="province_id" required>
                                                <option value="" selected disabled>Choose province</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}"
                                                        @if ($motel->province_id == $province->id) selected @endif>
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">District</label>
                                            <select class="form-control" id="district" name="district_id" required>
                                                <option selected value="{{ $motel->district->id }}">
                                                    {{ $motel->district->name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Ward</label>
                                            <select class="form-control" id="ward" name="ward_id" required>
                                                <option selected value="{{ $motel->ward->id }}">
                                                    {{ $motel->ward->name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="">Address</label>
                                        <x-text-input type="text" class="form-control" name="address"
                                            id="address" :value="$motel->address" placeholder="ex: 123 Nguyen Van Linh"
                                            required />
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="files" class="form-control-label">Motel Image</label>
                                    <input class="form-control upload__inputfile" type="file" name="images[]"
                                        multiple id="files" placeholder="ex: Air-Conditioner">
                                    <div class="upload-img"></div>
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Description</label>
                                    <textarea class="form-control" type="text" name="description" id="example-text-input"
                                        placeholder="ex: Air-Conditioner" required>{{ $motel->description }}</textarea>
                                </div>

                            </div>

                            <div class="col-lg-4 col-sm-12">
                                @foreach ($attrs as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"
                                            name="attribute[]" value="{{ $item->id }}"
                                            @if (in_array($item->id, $motel->attrs->pluck('id')->toArray())) checked @endif>
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
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
