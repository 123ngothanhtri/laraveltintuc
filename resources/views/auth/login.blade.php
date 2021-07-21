<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

    </style>
    <form method="POST" action="{{ route('login') }} " class="w-5/12 mx-auto bg-purple-100 p-3 rounded-lg">@csrf
        <label class="block">Email</label>


        <input type="email" class="border  w-full outline-none px-4 py-2 rounded-lg" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
                <code class="text-red-500">{{ $message }}</code>
        @enderror




        <label class="block">Password</label>


        <input id="password" type="password" class="border w-full outline-none px-4 py-2 rounded-lg" name="password" required autocomplete="current-password">

        @error('password')
            <code class="text-red-500">{{ $message }}</code>
        @enderror


        {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label>Remember Me</label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Quên mật khẩu?') }}
            </a>
        @endif --}}
        <button type="submit" class="block bg-green-500 text-white rounded-lg my-2 px-4 py-2">Login</button>

    </form>













