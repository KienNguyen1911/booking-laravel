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
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Attributes Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Function
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attrs as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('attributes.edit', [$item->id]) }}"
                                                    class="btn text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                            <td class="align-middle">

                                                <form action="{{ route('attributes.destroy', [$item->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Form Add</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('attributes.store') }}" method="post" class="px-4">
                            @csrf
                            <x-text-input name="name" class="form-control" :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-2">Add new</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
