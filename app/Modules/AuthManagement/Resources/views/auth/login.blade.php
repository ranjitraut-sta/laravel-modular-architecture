@extends('layouts.app')
@section('content')
<style>
    @media (max-width: 767px) {
        .illustration {
            display: none;
        }
    }
</style>
    <!-- Login Form -->
    <div class="container">
        <div class="illustration text-center">
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_jcikwtux.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </lottie-player>
        </div>

        <div class="login-form">
            <div class="logo">
                <img src="https://amdsoft.com.np/wp-content/uploads/2024/10/amd-jpg-01.jpg" alt="" heigh='100'
                    width='100'>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputUserName">{{ __('User Name Or Email') }}</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Enter your email or username" value="{{ old('name') }}" autocomplete="name"
                            autofocus />
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            name="password" />
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="options">
                    <div class="remember">
                        <input type="checkbox" id="remember" />
                        <label for="remember">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">{{ __('Forgot Password ?') }}</a>
                    @endif
                </div>

                <button type="submit" class="btn-login w-100">Sign In</button>

            </form>

        </div>
    </div>
@endsection
