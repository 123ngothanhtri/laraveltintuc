@extends('home.layout')
@section('title')
    {{ $cttt->tieude_baiviet }}
@endsection
@section('content')
    <p class="text-3xl font-bold">{{ $cttt->tieude_baiviet }}</p>
    <p>{{ $cttt->mota_baiviet }}</p>
    <p>Ngày {{ $cttt->ngay_baiviet }}</p>
    <p>Lượt xem: {{ $cttt->luotxem_baiviet }}</p>
    <img src="{{ asset('storage/' . $cttt->hinhanh_baiviet) }}" alt="" class="w-full">
    {!! $cttt->noidung_baiviet !!}
    <div class="bg-blue-400 font-bold text-white w-full px-5 py-2 my-2 rounded-lg">
        Bình luận
    </div>
    <form id="formvalidate" action="{{ url('gui-binh-luan') }}" method="post">@csrf
        <input type="hidden" name="input_idbaiviet" value="{{ $cttt->id_baiviet }}">
<div class="block mb-1">
        <input type="text" name="input_tbl" placeholder="Nhập tên" required class=" w-96 border-2 focus:outline-none focus:border-indigo-500 rounded-lg px-4 py-2">
        <label id="input_tbl-error" class="error text-red-500" for="input_tbl"></label>
</div>
<div class="block ">
        <textarea name="input_ndbl" rows="2" placeholder="Nhập nội dung" required class=" w-96 border-2 focus:outline-none rounded-lg focus:border-indigo-500 px-4 py-2"></textarea>
        <label id="input_ndbl-error" class="error text-red-500" for="input_ndbl"></label>
    </div>
        <input type="submit" value="Gửi" class="bg-gray-700 cursor-pointer text-white rounded-lg px-4 py-1 mb-1">
    </form>
    <hr>
    @foreach ($bl as $b)
    <div class="bg-gray-100 px-3 py-1 rounded-lg my-1">
        <span class="font-bold"><i class="fas fa-user-circle"></i> {{ $b->ten_binhluan }}</span>
        <p>{{ $b->noidung_binhluan }}</p>
        <p class="text-xs">{{ $b->ngay_binhluan }}</p>
        
    </div>
    @endforeach
            <div class="fb-comments" data-href="http://localhost/laraveltintuc/public/chi-tiet-bai-viet/{{ $cttt->id_baiviet }}" data-width data-numposts="5"></div>
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=177919137611377&autoLogAppEvents=1" nonce="Cj7Lx7Nc"></script> 
             
    <div class="bg-yellow-500 font-bold text-white w-full px-5 py-2 my-2 rounded-lg">
        Bài viết liên quan
    </div>
    @foreach ($ttlq as $t)
        @if ($t->anhien_baiviet == 1)
            <div class="flex m-5 my-2 border-b">
                <div class="flex-grow">
                    <a href="{{ url('chi-tiet-bai-viet/' . $t->id_baiviet) }}">
                        <p class="font-bold text-2xl">{{ $t->tieude_baiviet }}</p>
                        <p>{{ $t->mota_baiviet }}</p>
                    </a>
                </div>
                <div>
                    <div class="h-20 w-32 m-1 rounded-md overflow-hidden">
                        <img src="{{ asset('storage/' . $t->hinhanh_baiviet) }}" alt="" class="h-full w-full object-cover ">
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#formvalidate").validate({
                rules: {
                    input_tbl: "required",
                    input_ndbl: "required",
                    input_tbl: {
                        required: true,
                        minlength: 3,
                        maxlength: 20
                    },
                    input_ndbl: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                },
                messages: {
                    input_tbl: "Nhập tên từ 3 đến 20 ký tự",
                    input_ndbl:"Nhập nội dung từ 3 đến 100 ký tự"
                }
            });
        });
    </script>
@endsection
