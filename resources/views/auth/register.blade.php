@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-8 mx-auto">
        <div class="card radius-15 overflow-hidden">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="card-body p-md-5">
                        <div class="text-center">
                            <img src="{{ asset('admin/assets/images/logo-icon.png') }}" width="80" alt="">
                            <h3 class="mt-4 font-weight-bold">{{ _('Register New Account') }}</h3>
                        </div>
                        <div class="mt-3">
                            <div class="form-body">
                                <form class="row g-3" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-sm-12">
                                        <label for="inputFirstName" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name"
                                            class="form-control  @error('name') is-invalid @enderror" id="inputFirstName"
                                            placeholder="Name..." value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="inputEmailAddress" class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress"
                                            placeholder="example@gmail.com" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
                                        <div class="input-group" id="show_hide_password_1">
                                            <input type="password" name="password"
                                                class="form-control border-end-0 @error('password') is-invalid @enderror"
                                                id="inputPassword" placeholder="Enter Password">
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class="bx bx-hide"></i></a>
                                            @error('password')
                                                <span class="invalid-feedback"
                                                    role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="role_id" value="4">

                                    <div class="col-sm-12">
                                        <label for="inputPasswordConfirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>
                                        <div class="input-group" id="show_hide_password_2">
                                            <input type="password" name="password_confirmation"
                                                class="form-control border-end-0" id="inputPasswordConfirm"
                                                placeholder="Enter Confirm Password">
                                            <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class="bx bx-hide"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p>Already have an account yet? <a href="{{ route('login') }}">Login here</a></p>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i class="bx bx-user me-1"></i>
                                                {{ __('Register') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                    <img src="{{ asset('admin/assets/register.png') }}" class="img-fluid"
                        alt="...">
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePasswordVisibility = (groupId) => {
                const container = document.getElementById(groupId);
                const toggleBtn = container.querySelector("a");
                const input = container.querySelector("input");
                const icon = toggleBtn.querySelector("i");

                toggleBtn.addEventListener("click", function(e) {
                    e.preventDefault();
                    if (input.type === "password") {
                        input.type = "text";
                        icon.classList.remove("bx-hide");
                        icon.classList.add("bx-show");
                    } else {
                        input.type = "password";
                        icon.classList.remove("bx-show");
                        icon.classList.add("bx-hide");
                    }
                });
            };

            togglePasswordVisibility("show_hide_password_1");
            togglePasswordVisibility("show_hide_password_2");
        });
    </script>
@endsection
