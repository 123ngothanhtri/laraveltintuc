@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Quản lý bình luận
        </p>
    </div>
    <div class="w-full p-5">
        <table class="table bg-white">
            <tr class="bg-gray-300 font-bold">
                <td class="p-2 border">id</td>
                <td class="p-2 border">Tên người bình luận</td>
                <td class="p-2 border">Nội dung</td>
                <td class="p-2 border">Bài viết</td>
                <td class="p-2 border">Ngày</td>
                <td class="p-2 border">Thao tác</td>
            </tr>
            @foreach ($bl as $t)
            <tr>
                <td class="p-2 border">
                    {{ $t->id_binhluan }}
                </td>
                <td class="p-2 border">
                    {{ $t->ten_binhluan }}
                </td>
                <td class="p-2 border">
                    {{ $t->noidung_binhluan }}
                </td>
                <td class="p-2 border">
                    {{ $t->tieude_baiviet }}<a href="{{ url('chi-tiet-bai-viet/'.$t->id_baiviet) }}" > <button class="bg-gray-100 p-1 rounded-lg outline-none border-none hover:bg-blue-200 hover:underline ring-none text-blue-500">Xem bài viết...</button> </a>
                </td>
                <td class="p-2 border">
                    {{ $t->ngay_binhluan }}
                </td>
                <td class="p-2 border">
                    <a href="{{ url('xoa-binh-luan/'.$t->id_binhluan) }}" ><button class="bg-gray-100 p-1 rounded-lg outline-none border-none hover:bg-red-200 ring-none text-red-500">Xóa</button> </a>
                </td>
            </tr>
            @endforeach
        </table>
        
    </div>
@endsection