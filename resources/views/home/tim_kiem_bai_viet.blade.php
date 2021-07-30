@extends('home.layout')
@section('title')
    Tìm kiếm bài viết
@endsection
@section('content')
    @php
    function doimau($str, $tukhoa)
    {
        return str_replace($tukhoa, "<span class='text-pink-500'>" . $tukhoa . '</span>', $str);
    }
    @endphp
    <form action="{{ url('tim-kiem-bai-viet') }}" method="post" class="mb-1">@csrf
        <input type="text" placeholder="Nhập từ khóa tìm kiếm" name="tktt" value="{{ $tukhoa }}" required class="border w-96 outline-none rounded-lg py-2 px-4">
        <input type="submit" value="Tìm kiếm" class="border cursor-pointer outline-none hover:bg-green-50 rounded-lg py-2 px-4">
    </form>
    <div class="w-10/12 flex flex-col lg:flex-row">
        <div>
            @foreach ($tt as $t)
                @if ($t->anhien_baiviet == 1)
                    <a href="{{ url('chi-tiet-bai-viet/' . $t->id_baiviet) }}">
                        <span class="font-bold text-2xl pt-3">{!! doimau($t->tieude_baiviet, $tukhoa) !!}</span>
                        @if ($t->noibat_baiviet == 1)
                            <span class="bg-red-500 text-xs px-1 rounded-full text-white">Nổi bật</span>
                        @endif
                        <div class="flex pb-3">
                            <div>
                                <div class="w-40 h-28 rounded-lg overflow-hidden">
                                    <img src="{{ asset('storage/' . $t->hinhanh_baiviet) }}" alt="" class="h-full w-full object-cover ">
                                </div>
                            </div>
                            <div class="px-3 class=" flex-grow"">
                                <p>{!! doimau($t->mota_baiviet, $tukhoa) !!}</p>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endif
            @endforeach
        </div>

        <div>
            @foreach ($lt as $t)

                <a href="{{ url('loc/' . $t->id_loaibaiviet) }}">
                    <div class="w-40 hover:bg-green-50 ml-5 border-l border-gray-200 font-bold  px-5 py-2">
                        {{ $t->ten_loaibaiviet }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
