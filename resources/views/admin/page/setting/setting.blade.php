@extends('admin.main.app')
@section('content')
@include('alert.message')

    <form action="{{ route('setting.update', $data['setting']['id'] ?? '') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-3">
                <h5 class="fs-16">General Settings</h5>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="site_name" class="form-label">Site Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="site_name" name="site_name"
                                    value="{{ old('site_name', $data['setting']['site_name'] ?? '') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $data['setting']['email'] ?? '') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $data['setting']['phone'] ?? '') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address', $data['setting']['address'] ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo & Favicon -->
        <div class="row">
            <div class="col-lg-3">
                <h5 class="fs-16">Site Logo & Favicon</h5>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Site Logo -->
                            <div class="col-lg-4">
                                <x-image-upload :name="'logo'" :label="'Site Logo'"/>
                                <div class="mt-2">
                                    @if (!empty($data['setting']['logo']))
                                        <img id="logoPreview"
                                            src="{{ asset('storage/uploads/settings/logo/' . $data['setting']['logo']) }}"
                                            alt="Site Logo" height="50">
                                    @else
                                        <img id="logoPreview" style="display: none;" height="50">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <x-image-upload :name="'favicon'" :label="'Favicon Logo'"/>
                                <div class="mt-2">
                                    @if (!empty($data['setting']['favicon']))
                                        <img id="faviconPreview"
                                            src="{{ asset('storage/uploads/settings/favicon/' . $data['setting']['favicon']) }}"
                                            alt="Favicon" height="50">
                                    @else
                                        <img id="faviconPreview" style="display: none;" height="50">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                               <x-image-upload :name="'default_image'" :label="'Default Image'"/>
                                <div class="mt-2">
                                    @if (!empty($data['setting']['default_image']))
                                        <img id="faviconPreview"
                                            src="{{ asset('storage/uploads/settings/default//' . $data['setting']['default_image']) }}"
                                            alt="Default Image" height="50">
                                    @else
                                        <img id="DefaultImage" style="display: none;" height="50">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">Update Settings</button>
        </div>
    </form>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function previewImage(input, previewID) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(previewID).src = e.target.result;
                        document.getElementById(previewID).style.display = "block";
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.getElementById("logoInput").addEventListener("change", function() {
                previewImage(this, "logoPreview");
            });
            document.getElementById("DefaultImage").addEventListener("change", function() {
                previewImage(this, "DefaultImage");
            });

            document.getElementById("faviconInput").addEventListener("change", function() {
                previewImage(this, "faviconPreview");
            });

            document.getElementById("removeLogo")?.addEventListener("click", function() {
                document.getElementById("logoPreview").style.display = "none";
                document.getElementById("logoInput").value = "";
            });

            document.getElementById("removeFavicon")?.addEventListener("click", function() {
                document.getElementById("faviconPreview").style.display = "none";
                document.getElementById("faviconInput").value = "";
            });
            document.getElementById("removeDefaultImage")?.addEventListener("click", function() {
                document.getElementById("DefaultImage").style.display = "none";
                document.getElementById("DefaultImage").value = "";
            });
        });
    </script>
@endsection
