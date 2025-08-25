<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Personal Finance Tracker</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e293b, #3b82f6);
            font-family: 'Figtree', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1e293b;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        label {
            font-size: 0.875rem;
            color: #374151;
            display: block;
            margin-bottom: 0.5rem;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            color: #374151;
        }
        input[type="checkbox"] {
            margin-right: 0.5rem;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: #4b5563;
        }
        .forgot-password {
            font-size: 0.875rem;
            color: #6366f1;
            text-decoration: none;
            margin-bottom: 1rem;
            display: inline-block;
        }
        .forgot-password:hover {
            color: #3b82f6;
        }
        button {
            width: 100%;
            padding: 0.75rem;
            background-color: #6366f1;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: bold;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #4f46e5;
        }
        .error {
            font-size: 0.75rem;
            color: #ef4444;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Log in to Your Account</h2>
        
        <!-- Session Status -->
        @if (session('status'))
            <p class="error">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
                @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
            @endif

            <!-- Submit Button -->
            <button type="submit">Log in</button>
        </form>
    </div>
</body>
</html>
