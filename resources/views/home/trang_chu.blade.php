@extends('home.layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <form action="{{ url('tim-kiem-bai-viet') }}" method="post" class="mb-2">@csrf
        <input type="text" placeholder="Nhập từ khóa tìm kiếm" name="tktt" required class="border w-96 outline-none rounded-lg py-2 px-4">
        <input type="submit" value="Tìm kiếm" class="border cursor-pointer outline-none hover:bg-green-50 rounded-lg py-2 px-4">
    </form>
    <hr>
    <div class="w-10/12 flex flex-col lg:flex-row mt-2">
        
        <div>
            @foreach ($lt as $t)
                <a href="{{ url('loc/' . $t->id_loaibaiviet) }}">
                <div 
                @if (isset($xn))  
                    @if ($xn==$t->id_loaibaiviet)
                        class="w-40  bg-green-200 ml-5 border-gray-200 font-bold  px-5 py-2" 
                    @else
                        class="w-40 hover:bg-green-50 ml-5 border-gray-200 font-bold  px-5 py-2"  
                    @endif
                @else
                        class="w-40 hover:bg-green-50 ml-5 border-gray-200 font-bold  px-5 py-2" 
                @endif

                >
                        {{ $t->ten_loaibaiviet }}
                    </div>
                </a>
            @endforeach
        </div>

        <div class="pl-5">
            @foreach ($tt as $t)
                @if ($t->anhien_baiviet == 1)
                    <a href="{{ url('chi-tiet-bai-viet/' . $t->id_baiviet) }}">
                        <span class="font-bold text-2xl pt-3">{{ $t->tieude_baiviet }} </span>
                        @if ($t->noibat_baiviet == 1)
                            <span class="bg-red-500 text-xs px-1 rounded-full text-white">Nổi bật</span>
                        @endif
                        <div class="flex pb-3">
                            <div>
                                <div class="w-40 h-28 rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $t->hinhanh_baiviet) }}" alt="" class="h-full w-full object-cover ">
                                </div>
                            </div>
                            <div class="px-3 class=">
                                <p>{{ $t->mota_baiviet }}</p>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endif
            @endforeach
        </div>


    </div>
    <html>

    <head>

    @endsection
