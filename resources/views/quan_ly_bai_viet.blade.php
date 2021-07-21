@extends('layout')

@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Quản lý bài viết
        </p>
    </div>
    <div class="w-full p-5">
        <a href="{{ url('/them-bai-viet') }}" class="bg-gray-700 text-white px-4 py-2 rounded-lg">THÊM BÀI VIẾT</a>
        <table class="table bg-white w-full my-5">
            <tr class="bg-gray-300 font-bold">
                <td class="p-2 border">id</td>
                <td class="p-2 border">Thể loại</td>
                <td class="p-2 border">Tiêu đề</td>
                <td class="p-2 border">Mô tả</td>
                <td class="p-2 border">Hình ảnh</td>
                <td class="p-2 border">Ẩn/hiện</td>
                <td class="p-2 border">Nổi bật</td>
                <td class="p-2 border">Ngày thêm</td>
                <td class="p-2 border">Thao tác</td>
            </tr>
            @foreach ($tt as $t)
                
            
            <tr>
                <td class="p-2 border">
                    {{ $t->id_baiviet }}
                </td>
                <td class="p-2 border">
                    {{ $t->ten_loaibaiviet }}
                </td>
                <td class="p-2 border">
                    {{ $t->tieude_baiviet }}
                </td>
                <td class="p-2 border">
                    {{ $t->mota_baiviet }}
                </td>
                <td class="p-2 border">
                    <img width="100px" height="100px" src="{{ asset('storage/'.$t->hinhanh_baiviet) }}" alt="ảnh">
                </td>
                <td class="p-2 border">
                    @if ($t->anhien_baiviet==1)
                    <span>Hiện</span>
                    @else
                        Ẩn
                    @endif
                </td>
                <td class="p-2 border">
                    @if ($t->noibat_baiviet==1)
                        Nổi bật
                    @endif
                    
                </td>
                
                <td class="p-2 border">
                    {{ $t->created_at }}
                </td>
                <td class="p-2 border">
                    <a href="{{ url('sua-bai-viet/'.$t->id_baiviet) }}" > <button class="bg-gray-100 p-1 rounded-lg outline-none border-none hover:bg-blue-200 ring-none text-blue-500">Chi tiết</button> </a>
                    <a href="{{ url('xoa-bai-viet/'.$t->id_baiviet) }}" ><button class="bg-gray-100 p-1 rounded-lg outline-none border-none hover:bg-red-200 ring-none text-red-500">Xóa</button> </a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection