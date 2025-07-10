@extends('admin.main.app')
@section('content')
@include('alert.top-end')
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <h4 class="mb-0">Users Table</h4>
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
            </div>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Last Login</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['users'] as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->role_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->last_login }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td name="bstable-actions">
                                    <div class="btn-group pull-right">

                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-default">
                                                <span class="fa fa-trash"> </span>
                                            </button>
                                        </form>
                                        <a href="{{ route('user.edit', $item->id) }}">
                                            <button type="submit" class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </button>
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
