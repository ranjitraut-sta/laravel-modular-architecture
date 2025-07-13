@extends('layouts.app')
@section('content')
    <style>
        .reset-password-toggle {
            cursor: pointer;
            margin-left: 10px;
            display: flex;
            align-items: center;
        }

        .reset-form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }

        .reset-input-with-icon {
            position: relative;
        }

        .reset-input-with-icon i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 1.1rem;
        }

        .reset-form-control {
            width: 100%;
            padding: 16px 16px 16px 50px;
            border: 1px solid #e0e6ed;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .reset-form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
            background: white;
        }

        .reset-password-toggle {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            font-size: 1.1rem;
        }

        .reset-btn {
            width: 100%;
            padding: 8px;
            margin: 8px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(106, 17, 203, 0.25);
            margin-bottom: 25px;
        }

        .reset-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(106, 17, 203, 0.35);
        }

        .reset-footer {
            text-align: center;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .reset-footer a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .reset-footer a:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 8px;
            height: 6px;
            border-radius: 3px;
            background: #e9ecef;
            overflow: hidden;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            background: var(--success);
            transition: width 0.3s ease;
        }

        .password-requirements {
            margin-top: 10px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .requirement i {
            margin-right: 8px;
            font-size: 0.8rem;
            width: 16px;
            height: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e9ecef;
            color: transparent;
        }

        .requirement.valid i {
            background: var(--success);
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .illustration-content h1 {
                font-size: 2.2rem;
            }
        }
    </style>
    <!-- Login Form -->
    <div class="container">
        <div class="illustration text-center">
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_jcikwtux.json" background="transparent"
                speed="1" style="width: 400px; height: 400px;" loop autoplay>
            </lottie-player>
        </div>

        <div class="login-form">
            <div class="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" alt="Logo">
                <h2>Reset Password</h2>
                <p>Create a new secure password</p>
            </div>
            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="reset-form-group">
                    <label for="email">Email Address</label>
                    <div class="reset-input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" class="reset-form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter your email">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="reset-form-group">
                    <label for="password">New Password</label>
                    <div class="reset-input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password"
                            class="reset-form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Enter new password">
                        <span class="reset-password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="reset-form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <div class="reset-input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password-confirm" class="reset-form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm your new password">
                        <span class="reset-password-toggle" id="toggleConfirmPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div id="passwordMatch" class="mt-2 small text-success" style="display: none;">
                        <i class="fas fa-check-circle"></i> Passwords match
                    </div>
                    <div id="passwordMismatch" class="mt-2 small text-danger" style="display: none;">
                        <i class="fas fa-exclamation-circle"></i> Passwords do not match
                    </div>
                </div>

                <button type="submit" class="reset-btn">
                    Reset Password
                </button>

                <div class="reset-footer">
                    Remember your password? <a href="{{ route('login') }}">Sign In</a>
                </div>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password-confirm');
            const passwordStrength = document.getElementById('passwordStrength');
            const passwordMatch = document.getElementById('passwordMatch');
            const passwordMismatch = document.getElementById('passwordMismatch');

            // Password toggle
            document.addEventListener('DOMContentLoaded', function() {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password-confirm');

                const togglePassword = document.getElementById('togglePassword');
                const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

                togglePassword.addEventListener('click', function() {
                    // Password input type toggle
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // Icon class toggle
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                });

                toggleConfirmPassword.addEventListener('click', function() {
                    // Confirm password input type toggle
                    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' :
                        'password';
                    confirmPassword.setAttribute('type', type);

                    // Icon class toggle
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');
                });
            });
            // Password match checker
            function checkPasswordMatch() {
                if (password.value && confirmPassword.value) {
                    if (password.value === confirmPassword.value) {
                        passwordMatch.style.display = 'block';
                        passwordMismatch.style.display = 'none';
                    } else {
                        passwordMatch.style.display = 'none';
                        passwordMismatch.style.display = 'block';
                    }
                } else {
                    passwordMatch.style.display = 'none';
                    passwordMismatch.style.display = 'none';
                }
            }

            password.addEventListener('input', checkPasswordMatch);
            confirmPassword.addEventListener('input', checkPasswordMatch);
        });
    </script>
@endsection
