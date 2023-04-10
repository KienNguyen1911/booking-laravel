{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Motel Filter</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motels.search') }}" method="post">
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
</div> --}}
