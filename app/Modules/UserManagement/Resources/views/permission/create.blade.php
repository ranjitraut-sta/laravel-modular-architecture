@extends('admin.main.app')
@section('content')
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Add Permission
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('permission.index') }}">
                                <span class="back d-flex" style="flex-direction: row-reverse"><span
                                        class="btn btn-light m-1 px-5" style="font-size:13px;"><i
                                            class="fa-solid fa-angles-left"></span></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('permission.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <x-form.text-input :id="'name'" :label="'Name'" :name="'name'" :value="old('name')" />
                        </div>

                          <div class="col-md-12 mb-3">
                            <x-form.text-input :id="'controller'" :label="'Controller'" :name="'controller'" :value="old('controller')" />
                          </div>
                          <div class="col-md-12 mb-3">
                            <x-form.text-input :id="'action'" :label="'Action'" :name="'action'" :value="old('action')" />
                          </div>
                          <div class="col-md-12 mb-3">
                            <x-form.text-input :id="'group_name'" :label="'Group Name'" :name="'group_name'" :value="old('group_name')" />
                          </div>

                        <div class="col-12 col-lg-12 button_submit pt-20">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
