<form method="post" action="{{ route('motels.update', [$motel->id]) }}" style="padding: 10px 20px 0px;"
    enctype="multipart/form-data" id="myForm" class="updateForm">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-8 col-sm-12">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Name
                            Motel</label>
                        <x-text-input class="form-control" type="text" name="name" :value="$motel->name"
                            id="example-text-input" placeholder="ex: Hotel Tinh Yeu" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Price</label>
                        <x-text-input class="form-control" type="number" name="price" :value="$motel->price"
                            id="example-number-input" placeholder="ex: 1000$" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status</label>
                        <x-text-input class="form-control" type="text" name="status" :value="$motel->status"
                            id="example-text-input" placeholder="ex: Open" required />
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />

                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Area</label>
                        <x-text-input class="form-control" type="text" name="acreage" :value="$motel->acreage"
                            id="example-text-input" placeholder="ex: 30m2" required />
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
                                <option value="{{ $province->id }}" @if ($motel->province_id == $province->id) selected @endif>
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
                            <option selected value="{{ $motel->ward->id }}">{{ $motel->ward->name }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Address</label>
                    <x-text-input type="text" class="form-control" name="address" id="address" :value="$motel->address"
                        placeholder="ex: 123 Nguyen Van Linh" required />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />

                </div>
            </div>

            <div class="form-group">
                <label for="files" class="form-control-label">Motel Image</label>
                <input class="form-control upload__inputfile" type="file" name="images[]" multiple id="files"
                    placeholder="ex: Air-Conditioner">
                <div class="upload-img"></div>
            </div>

            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Description</label>
                <textarea class="form-control" type="text" name="description" id="example-text-input"
                    placeholder="ex: Air-Conditioner" required>{{ $motel->description }}</textarea>
            </div>

        </div>

        <div class="col-lg-4 col-sm-12 d-flex flex-wrap gap-3">
            @foreach ($attrs as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="attribute[]"
                        value="{{ $item->id }}" @if (in_array($item->id, $motel->attrs->pluck('id')->toArray())) checked @endif>
                    <label class="custom-control-label" for="customCheck1">
                        {{ $item->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
</form>
