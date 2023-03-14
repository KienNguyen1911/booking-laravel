@extends('admin.layout.app')

@section('attributes.edit')
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-xl-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Form Edit</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('attributes.update', $attr->id) }}" method="post" class="px-4">
                            @csrf
                            @method('PUT')
                            <x-text-input name="name" class="form-control" :value="$attr->name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-2">Update Attribute</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
