@extends('home.layout')
@section('title')
    Liên hệ
@endsection
@section('content')
<div>
    @if (session('msg'))
        <div class="bg-green-100 text-green-600 w-full rounded-lg py-2 px-5">
            <i class="fas fa-check"></i> {{ session('msg') }}
        </div>
    @endif
    <p class="text-green-800 text-3xl font-bold my-5">Liên hệ</p>
    <form id="formvalidate" action="{{ url('xu-ly-lien-he') }}" method="post" class="text-green-800">@csrf
        <p>Email</p>
        <label id="email-error" class="error text-sm text-red-500" for="email"></label>
    
        @error('email')
        <code class="text-red-500 text-xs">{{ $message }}</code>
        @enderror
        <input type="email" name="email" placeholder="Nhập email" required class="block w-96 border-2 focus:outline-none  focus:border-indigo-500 rounded-lg px-4 py-2 mb-5">
        
        <p>Tin nhắn</p>
        <label id="tinnhan-error" class="error text-red-500 text-sm " for="tinnhan"></label>
    
        @error('tinnhan')
        <code class="text-red-500 text-xs">{{ $message }}</code>
        @enderror
        <textarea name="tinnhan" rows="10" placeholder="Nhập tin nhắn" required class="block w-96 border-2 focus:outline-none rounded-lg focus:border-indigo-500 px-4 py-2 "></textarea>
       
        <input type="submit" value="Gửi" class=" mt-5 bg-gray-800 text-white rounded-lg px-4 py-2">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#formvalidate").validate({
                rules: {
                    email: {
                        required: true,
                        email:true,
                        minlength: 10,
                        maxlength: 50
                    },
                    tinnhan: {
                        required: true,
                        minlength: 10,
                        maxlength: 100
                    },
                },
                messages: {
                    email: "Email phải đúng định dạng, từ 3 đến 20 ký tự",
                    tinnhan:"Nhập tin nhắn từ 10 đến 100 ký tự"
                }
            });
        });
    </script>
@endsection