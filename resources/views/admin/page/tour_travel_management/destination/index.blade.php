@extends('admin.main.app')
@include('alert.top-end')
@section('content')

    @if ($data['records']->isEmpty())
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between">
                    <h4 class="mb-0">Destination List</h4>
                    <a href="{{ route('destination.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="no__data_found py-5">
                    <div class="text-center">
                        <h5 class="text-muted">Use Search Filter to Find Data!</h5>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Table List --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between">
                    <h4 class="mb-0">Destination List</h4>
                    <a href="{{ route('destination.create') }}" class="btn btn-primary btn-sm">+ Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('destination.search') }}" method="POST">
                        @csrf
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">
                                    Show
                                    <select name="length" class="form-select form-select-sm d-inline-block w-auto mx-1"
                                        onchange="this.form.submit()">
                                        <option value="10" {{ request('length') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request('length') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request('length') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request('length') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <label class="form-label">
                                    Search:
                                    <input type="search" name="search" value="{{ request('search') }}"
                                        class="form-control form-control-sm d-inline-block w-auto ms-1"
                                        placeholder="Search..." onchange="this.form.submit()">
                                </label>
                            </div>
                        </div>
                    </form>

                    <table id="exampleOne" class="table table-striped table-bordered dataTable no-footer"
                        style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($data['records'] as $record => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['location'] }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('destination.edit', $item['id']) }}"
                                                class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </a>
                                            <form action="{{ route('destination.destroy', $item['id']) }}" method="POST"
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
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xxl-12 justify-content-center">
                            {{ $data['records']->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
