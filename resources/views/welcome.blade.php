<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Personal Finance Tracker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif

        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #000000;
                color: #ffffff;
                margin: 0;
                padding: 0;
            }

            #background {
                opacity: 0.2;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                text-align: center;
                position: relative;
                z-index: 10;
            }

            h1 {
                font-size: 3rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
            }

            .button {
                display: inline-block;
                margin: 0 0.5rem;
                padding: 0.75rem 1.5rem;
                border: 5px solid #FF2D20;
                color: #FF2D20;
                background-color: transparent;
                text-transform: uppercase;
                font-size: 1rem;
                font-weight: 600;
                border-radius: 0.5rem;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
            }

            .button:hover {
                background-color:rgb(173, 19, 11);
                color: #ffffff;
                border: #ffffff 5px solid;
            }

            footer {
                position: absolute;
                bottom: 1rem;
                width: 100%;
                text-align: center;
                font-size: 0.875rem;
                color: #ffffff;
            }

            footer a {
                color: #FF2D20;
                text-decoration: none;
            }

            footer a:hover {
                text-decoration: underline;
            }
            .image-fluid{
                width: 350px;
                height: 350px;
                border-radius: 50%;
                
                box-shadow:rgb(116, 115, 115) 1px 2px;
            }
        </style>
    </head>
    <body class="container-fluid">
        <div class="container container-fluid">
            <img src="https://www.studying-in-uk.org/wp-content/uploads/2018/09/accounting-and-finances.jpg" alt="" class="image-fluid">
            <h1>Welcome to Personal Finance Tracker</h1>
            <p>Track your expenses, manage your income, and stay financially organized effortlessly.</p>

            <!-- Navigation Buttons -->
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="container-fluid">
            <p>&copy; {{ date('Y') }} Personal Finance Tracker. Built with ❤️ and Laravel.</p>
        </footer>

        <!-- Background Image -->
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
    </body>
</html>
