@extends('admin.main.app')
@section('content')
@include('alert.top-end')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <h4 class="mb-0">Permission Table</h4>
                <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
            </div>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Controller</th>
                            <th>Action Name</th>
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['permissions'] as $groupName => $permissions)
                            <tr>
                                <td colspan="6"><strong>{{ $groupName }}</strong></td>
                            </tr>
                            @foreach ($permissions as $item)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->controller }}</td>
                                    <td>{{ $item->action }}</td>
                                    <td>{{ $item->group_name }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('permission.edit', $item->id) }}"
                                                class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </a>
                                            <form action="{{ route('permission.destroy', $item->id) }}" method="POST"
                                                style="display: inline;" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <span class="fa fa-trash"> </span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
