<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Personal Finance Tracker</title>
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
        .register-container {
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
        input[type="text"],
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
        a {
            font-size: 0.875rem;
            color: #6366f1;
            text-decoration: none;
            margin-top: 1rem;
        }
        a:hover {
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
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .error {
            font-size: 0.75rem;
            color: #ef4444;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create Your Account</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <p class="error">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
                @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <p class="error">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>

            <div class="flex">
                <a href="{{ route('login') }}">Already registered?</a>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
