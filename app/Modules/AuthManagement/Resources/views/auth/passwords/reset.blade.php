<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6a11cb;
            --primary-light: #8a4fff;
            --secondary: #2575fc;
            --dark: #2c3e50;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #2ecc71;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
            padding: 20px;
        }

        .reset-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border-radius: 25px;
            overflow: hidden;
            background: white;
        }

        .reset-illustration {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            position: relative;
            overflow: hidden;
            color: white;
        }

        .reset-illustration::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
        }

        .illustration-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 450px;
        }

        .illustration-content h1 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .illustration-content p {
            font-size: 1.1rem;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.7;
        }

        .reset-features {
            text-align: left;
            margin-top: 40px;
            width: 100%;
        }

        .reset-feature {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(5px);
            transition: transform 0.3s ease;
        }

        .reset-feature:hover {
            transform: translateX(10px);
        }

        .reset-feature i {
            margin-right: 15px;
            font-size: 1.5rem;
            padding: 12px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            min-width: 50px;
            text-align: center;
        }

        .reset-feature-text h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .reset-feature-text p {
            font-size: 0.95rem;
            margin-bottom: 0;
            opacity: 0.85;
        }

        .reset-form-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 40px;
            background: white;
        }

        .reset-form-container {
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease;
        }

        .reset-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .reset-logo img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .reset-logo h2 {
            font-size: 2rem;
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 5px;
        }

        .reset-logo p {
            color: var(--gray);
            font-size: 1rem;
        }

        .reset-form-group {
            margin-bottom: 30px;
            position: relative;
        }

        .reset-form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: var(--dark);
            font-size: 0.95rem;
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
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            font-size: 1.1rem;
        }

        .reset-btn {
            width: 100%;
            padding: 16px;
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
            margin-top: 20px;
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
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .reset-container {
                flex-direction: column;
                max-width: 500px;
            }

            .reset-illustration {
                padding: 40px 30px;
            }

            .reset-form-section {
                padding: 40px 30px;
            }

            .illustration-content h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">

        <div class="reset-form-section">
            <div class="reset-form-container">
                <div class="reset-logo">
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
                            <input
                                type="email"
                                id="email"
                                class="reset-form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ $email ?? old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="Enter your email"
                            >
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="reset-form-group">
                        <label for="password">New Password</label>
                        <div class="reset-input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input
                                type="password"
                                id="password"
                                class="reset-form-control @error('password') is-invalid @enderror"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Enter new password"
                            >
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
                            <input
                                type="password"
                                id="password-confirm"
                                class="reset-form-control"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your new password"
                            >
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
                        Remember your password? <a href="#">Sign In</a>
                    </div>
                </form>
            </div>
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
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                if (type === 'password') {
                    this.innerHTML = '<i class="fas fa-eye"></i>';
                } else {
                    this.innerHTML = '<i class="fas fa-eye-slash"></i>';
                }
            });

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);

                if (type === 'password') {
                    this.innerHTML = '<i class="fas fa-eye"></i>';
                } else {
                    this.innerHTML = '<i class="fas fa-eye-slash"></i>';
                }
            });

            // Password strength checker
            password.addEventListener('input', function() {
                const value = password.value;
                let strength = 0;

                // Reset requirements
                document.querySelectorAll('.requirement').forEach(el => {
                    el.classList.remove('valid');
                });

                // Length requirement
                if (value.length >= 8) {
                    strength += 25;
                    document.getElementById('reqLength').classList.add('valid');
                }

                // Uppercase requirement
                if (/[A-Z]/.test(value)) {
                    strength += 25;
                    document.getElementById('reqUppercase').classList.add('valid');
                }

                // Number requirement
                if (/\d/.test(value)) {
                    strength += 25;
                    document.getElementById('reqNumber').classList.add('valid');
                }

                // Special character requirement
                if (/[!@#$%^&*(),.?":{}|<>]/.test(value)) {
                    strength += 25;
                    document.getElementById('reqSpecial').classList.add('valid');
                }

                // Update strength meter
                passwordStrength.style.width = `${strength}%`;

                // Update strength color
                if (strength < 50) {
                    passwordStrength.style.background = '#e74c3c';
                } else if (strength < 75) {
                    passwordStrength.style.background = '#f39c12';
                } else {
                    passwordStrength.style.background = '#2ecc71';
                }
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
</body>
</html>
