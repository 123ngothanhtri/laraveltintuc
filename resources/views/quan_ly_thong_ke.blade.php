@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Thống kê
        </p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 p-5 gap-5 ">
        <div class="bg-white shadow-md px-10 py-10 rounded-xl">
            <p class="text-3xl">{{ count($lt) }}</p> Loại tin
        </div>
        <div class="bg-white shadow-md  px-10 py-10 rounded-xl">
            <p class="text-3xl">{{ count($tt) }}</p> Bài viết
        </div>
        <div class="bg-white shadow-md  px-10 py-10 rounded-xl">
            <p class="text-3xl">{{ count($bl) }}</p> Bình luận
        </div>
        <div class="bg-white shadow-md  px-10 py-10 rounded-xl">
            <p class="text-3xl">{{ count($lh) }}</p> Liên hệ
        </div>
    </div>
@endsection
