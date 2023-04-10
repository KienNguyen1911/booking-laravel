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
                            <img src="{{ asset('admin/img/team-2.jpg') }}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="{{ route('attributes.edit', [$item->id]) }}"
                        class="btn text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                        data-original-title="Edit user">
                        Edit
                    </a>
                </td>
                <td class="align-middle">
                    <button class="btn text-secondary font-weight-bold text-xs btn-delete"
                        data-action="{{ route('attributes.destroy', $item->id) }}" data-id="{{ $item->id }}"
                        data-toggle="tooltip">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">
                {{ $attrs->links() }}
            </td>
        </tr>
    </tbody>
</table>
