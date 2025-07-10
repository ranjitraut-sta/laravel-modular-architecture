<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-H0fTr9dDYhEfT9NLr79x7LkOE4kBTyD8JOj3rslVqEj9vDEOCgijR0Xql8eFoJhV" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7fa, #e4edf5);
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 450px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            animation: fadeIn 0.8s ease;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .logo h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
        }

        .logo p {
            font-size: 0.95rem;
            color: #7f8c8d;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 8px;
            display: block;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #6a11cb;
        }

        .form-control {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border-radius: 10px;
            border: 1px solid #e0e6ed;
            background: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            background: #fff;
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(106, 17, 203, 0.2);
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .footer a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: 600;
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
    </style>
</head>

<body>

    <div class="form-container">
        <div class="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/6681/6681204.png" alt="Reset Icon">
            <h2>Reset Password</h2>
            <p>Enter your email to receive a reset link</p>
        </div>

        @if (session('success'))
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <div style="color:green;">{{ session('success') }}</div>
            </div>
        @endif



        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="you@example.com">
                </div>
                @error('email')
                    <div class="invalid-feedback"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Send Reset Link
            </button>
        </form>

        <div class="footer">
            Remember your password? <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>

</body>

</html>
