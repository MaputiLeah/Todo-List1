<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoListApp</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background: linear-gradient(90deg, #7F9CF5 0%, #B794F4 100%);
            color: #1E293B;
        }

        .bg-pattern {
            background: url('path-to-your-background-image.jpg') center/cover fixed;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .login-link {
            font-weight: 600;
            color: #2c5282;
        }

        .login-link:hover {
            color: #1a365d;
        }
    </style>
</head>

<body class="antialiased">
    <div class="bg-pattern bg-center bg-no-repeat bg-pattern">
        <div class="container">
            <div class="login-container">
                <div class="login-box">
                    <h1 class="login-title">Welcome to TodoList App</h1>
                    <p class="mb-4">Your go-to platform for managing tasks efficiently.</p>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
