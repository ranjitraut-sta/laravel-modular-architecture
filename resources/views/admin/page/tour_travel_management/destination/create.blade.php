@extends('admin.main.app')
@section('content')
    @include('alert.message')


    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Add Destination
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('destination.index') }}">
                                <span class="back d-flex" style="flex-direction: row-reverse"><span
                                        class="btn btn-light m-1 px-5" style="font-size:13px;"><i
                                            class="fa-solid fa-angles-left"></span></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form autocomplete="off" class="needs-validation" method="POST" action="{{ route('destination.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-9 col-lg-8">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div class="avatar-title rounded-circle bg-light text-primary fs-20">
                                        <i class="fa-solid fa-building-flag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-1">Destination Information</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body row">

                        <div class="col-md-6 mb-3">
                            <x-form.text-input id="name" name="name" label="Title" required="true" placeholder="Title"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <x-form.text-input :name="'slug'" :label="'Slug'" :value="old('slug')" :placeholder="'Slug'" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <x-form.text-input type="text" name="location" :label="'Location'" :value="old('location')" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <x-form.text-input type="number" name="latitude" :label="'Latitude'" :value="old('latitude')" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <x-form.text-input type="number" name="longitude" :label="'Longitude'" :value="old('longitude')" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <x-form.textarea type="textarea" name="description" label="Description" :value="old('description')"
                                id="summernote" />
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Feature Image</h5>
                    </div>
                    <div class="card-body">
                        <x-form.file-upload name="featured_image" label="Feature Image" />
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm">Submit</button>
            </div>

        </div>
    </form>
@endsection
