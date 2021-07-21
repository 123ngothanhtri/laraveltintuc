<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            *{font-family: 'Nunito', sans-serif;}
        </style>
    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <a href="{{ url('/home') }}" class="bg-gray-100 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-gray-100 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 bg-gray-100 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>
