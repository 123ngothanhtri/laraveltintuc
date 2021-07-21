@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Cập nhật bài viết
        </p>
    </div>
    <div class="w-full p-5">
        <form action="{{ url('xu-ly-sua-bai-viet') }}" method="post">@csrf
           <div class="flex justify-between my-5">
            {{-- <div>
            Thể loại 
            <select name="input_loaibaiviet" class="px-2 py-1 rounded-lg border w-96">
                @foreach ($lt as $i)
                    <option value="{{ $i->id_loaibaiviet }}">{{ $i->ten_loaibaiviet }}</option>
                @endforeach
                
            </select>
            </div> --}}
            <input type="hidden" value="{{ $tt->id_baiviet }} " name="input_id_baiviet">
            <input type="text" name="input_tieude" value="{{ $tt->tieude_baiviet }}" placeholder="Tiêu đề" required class="w-96 px-2 py-1 rounded-lg outline-none focus:ring-1 border"><br>
            
           </div>
           <textarea name="input_mota" placeholder="Mô tả ngắn" class="bg-white my-3 w-96 h-20 block outline-none focus:ring-1 px-2 py-1 rounded-lg border">{{ $tt->mota_baiviet }}</textarea>
            
            Ẩn/hiện <input type="checkbox" name="input_anhien" value="1" class="mr-10 my-3" @if($tt->anhien_baiviet==1) checked @endif>
            Nổi bật <input type="checkbox" name="input_noibat" value="1" class="my-3" @if($tt->noibat_baiviet==1) checked @endif>

            <textarea name="editor" id="editor">{!! $tt->noidung_baiviet !!}</textarea>
            <input type="submit" value="Lưu" class="bg-pink-500 m-2 text-white px-2 py-1 rounded-lg border">
        </form>
    </div>
    
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection