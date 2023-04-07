@extends('admin.layout.app')

@section('attributes.index')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Attributes table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @if (count($attrs) > 0)
                            @include('admin.pages.attributes.load-attr-data')
                        @else
                            <div class="alert alert-warning" role="alert">
                                <strong>Warning!</strong> No data found.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Form Add</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('attributes.store') }}" class="px-4 form-add">
                            @csrf
                            <x-text-input name="name" class="form-control" :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-2 add">Add new</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('admin.pages.attributes.modal')
@endsection

@section('script')
    <script src="{{ asset('admin/js/custom/attribute.js') }}"></script>
@endsection
