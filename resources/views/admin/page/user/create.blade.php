@extends('admin.main.app')
@include('alert.top-end')
@section('content')
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    Add New User
                </div>
                <div class="col-md-6">
                    <a href="{{ route('user.index') }}">
                        <span class="back d-flex" style="flex-direction: row-reverse"><span class="btn btn-light m-1 px-5"
                                style="font-size:13px;"><i class="fa-solid fa-angles-left"></span></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="p-4 border rounded">
                <form class="row g-3" action="{{ route('user.store') }}" method="POST">
                   @csrf
                    <div class="col-md-6 mb-3">
                        <x-form.text-input :id="'name'" :label="'User Name'" :name="'name'" :value="old('name')" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-form.email-input :id="'email'" :label="'User Email'" :name="'email'" :value="old('email')" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-form.password-input :id="'password'" :label="'Password'" :name="'password'" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-form.password-input :id="'confirm_password'" :label="'Confirm Password'" :name="'password_confirmation'" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-form.select-input :id="'role_id'" :label="'Role'" :name="'role_id' " :options="$data['roles']->pluck('name', 'id')" :value="old('role_id')" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-form.select-input :id="'status'" :label="'Status'" :name="'status' " :options="['1' => 'Active', '0' => 'Inactive']" :value="old('status')" />
                    </div>

                    <div class="col-12 button_submit">
                        <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
