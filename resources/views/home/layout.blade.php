<!DOCTYPE html>
<html lang="vi">

<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body>
    <header x-data="{ mobileMenuOpen : false }" class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-white shadow-md py-6 px-6 relative">
        <a href="{{ url('/') }}" class="block text-xl font-bold">Tin tức</a>
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block md:hidden w-8 h-8 bg-gray-200 text-gray-600 p-1">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <nav class="absolute md:relative top-16 left-0 md:top-0 z-20 md:flex flex-col md:flex-row md:space-x-6 font-semibold w-full md:w-auto bg-white shadow-md rounded-lg md:rounded-none md:shadow-none md:bg-transparent p-6 pt-0 md:p-0"
            :class="{ 'flex' : mobileMenuOpen , 'hidden' : !mobileMenuOpen}" @click.away="mobileMenuOpen = false">
            <a href="{{ url('/') }}" class="block py-1 text-gray-600 hover:text-green-500">Trang chủ</a>
            <a href="{{ url('/lien-he') }}" class="block py-1 text-gray-600 hover:text-green-500">Liên hệ</a>
        </nav>
    </header>
    <section class="w-8/12 mx-auto my-5">
        @yield('content')
    </section>
    <footer class="  text-lg-start">
        <div class="grid grid-cols-1 md:grid-cols-3 bg-gray-200">
            <div class="p-3">
                <p> Giấy phép hoạt động số 789/GP - TTĐT | Do SỞ THÔNG TIN VÀ TRUYỀN THÔNG THÀNH PHỐ HÀ NỘI cấp ngày 20/6/2018</p>
            </div>
            <div class="p-3">
                <a class="block hover:underline" href="{{ url('/') }}">Trang chủ</a>
                <a class="block hover:underline" href="{{ url('/lien-he') }}">Liên hệ</a>
                <a class="block hover:underline" href="{{ url('/login') }}">Đăng nhập</a>
            </div>
            <div class="p-3">
                <p class="">Liên hệ quảng cáo</p>
                <p>Địa chỉ: Quốc lộ 1A xã Phú Quới huyện Long Hồ tỉnh Vĩnh Long. </p>
                <p>Email: 123pachirisu@gmail.com</p>
                <p>Hotline: 0123456789 </p>
            </div>
        </div>
        <div class="bg-gray-300 text-center p-3">
            <p>Copyright © 2021 - Tin tức</p>
        </div>
    </footer>


    {{-- <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    @yield('script') --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    

</body>

</html>
