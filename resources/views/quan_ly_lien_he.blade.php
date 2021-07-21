@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Quản lý liên hệ
        </p>
    </div>
    
    <div class="w-full p-5"> 
        @if (session('msg'))
            <div class="w-full bg-green-100 text-green-600 my-2 rounded-lg py-2 px-5">
                ✔ {{ session('msg') }}
            </div>
        @endif
        @foreach ($qllh as $x)
        <div class="w-full bg-white border rounded-lg my-2 py-2 px-5">
            <p class="font-bold">{{ $x->email_lienhe }}</p>
            <hr>
            <p>{{ $x->tinnhan_lienhe }}</p>
            <p class="text-xs">{{ $x->ngay_lienhe }}</p>
            <p class="text-right "><a href="{{ url('xoa-lien-he/'.$x->id_lienhe) }}" class="bg-gray-200 hover:text-red-500 rounded-lg px-4">Xóa</a></p>
        </div>
        @endforeach
    </div>
@endsection