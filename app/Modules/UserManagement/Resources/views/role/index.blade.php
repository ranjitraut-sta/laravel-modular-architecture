@extends('admin.main.app')
@section('content')
@include('alert.top-end')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <h4 class="mb-0">Role Table</h4>
                <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
            </div>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['roles'] as $role => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('role.edit', $item->id) }}" class="btn btn-sm btn-default">
                                            <span class="fa fa-edit"> </span>
                                        </a>
                                        <form action="{{ route('role.destroy', $item->id) }}" method="POST"
                                            style="display: inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-default">
                                                <span class="fa fa-trash"> </span>
                                            </button>
                                        </form>
                                        <a href="{{ route('role.permission', $item->id) }}" class="btn btn-sm btn-default">
                                            <span class="fa fa-key"></span>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
