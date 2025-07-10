@extends('layouts.app')
@section('content')
    <div class="col-12 col-lg-8 mx-auto d-flex align-items-center justify-content-center">
        <div class="card radius-15">
            <div class="row g-0">
                <div class="col-xl-6">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <img src="{{ asset('admin/assets/new_logo.png') }}" class="logo-icon-2" alt=""
                                width="100%" />
                        </div>
                        <div class="mt-4">
                            <div class="form-body">
                                <form class="row g-3" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputUserName" class="form-label">{{ __('User Name') }}</label>
                                        <input type="text" class="form-control"
                                            id="inputUserName" name="name" placeholder="Enter User Name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword"
                                            class="form-label">{{ __('Enter Password') }}</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password"
                                                class="form-control border-end-0"
                                                id="inputChoosePassword" value="" placeholder="Enter Password"
                                                name="password" required autocomplete="current-password"> <a
                                                href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class="bx bx-hide"></i></a>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }} id="flexSwitchCheckChecked">
                                            <label class="form-check-label"
                                                for="flexSwitchCheckChecked">{{ _('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">{{ __('Forgot Password ?') }}</a>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bx bxs-lock-open"></i>Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center card-shadow">
                    <img src="{{ asset('admin/assets/login.png') }}" class="img-fluid" alt="..." style="height: 400px;width:100%;">
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector("#show_hide_password a");
            const passwordInput = document.querySelector("#show_hide_password input");
            const icon = togglePassword.querySelector("i");

            togglePassword.addEventListener("click", function(e) {
                e.preventDefault();
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bx-hide");
                    icon.classList.add("bx-show");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bx-show");
                    icon.classList.add("bx-hide");
                }
            });
        });
    </script>
@endsection
