@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Thêm bài viết
        </p>
    </div>
    <div class="w-full p-5">
        <form action="{{ url('xu-ly-them-bai-viet') }}" enctype="multipart/form-data" method="post">@csrf
           <div class="grid grid-cols-1 md:grid-cols-3 md:col-span-2 md:gap-3">
                <label for="">Tiêu đề</label>
                <input type="text" name="input_tieude" placeholder="Tiêu đề" required class="w-full px-2 py-1 rounded-lg border outline-none focus:ring-1 md:col-span-2">
                
                <label for="" >Thể loại </label>
                <select name="input_loaibaiviet" class="w-full px-2 py-1 rounded-lg border outline-none focus:ring-1 md:col-span-2">
                    @foreach ($lt as $i)
                        <option value="{{ $i->id_loaibaiviet }}">{{ $i->ten_loaibaiviet }}</option>
                    @endforeach
                </select>
                
                <label for="" >Mô tả</label>
                <textarea name="input_mota" placeholder="Mô tả" class="bg-white w-full h-20 block focus:outline-none focus:ring-1 md:col-span-2 px-2 py-1 rounded-lg border"></textarea>
                
                <label for="">Chọn hình ảnh</label>
                <span>
                    <input type="file" id="upload" onchange="preview_image(event)" required accept="image/*" class="bg-white mb-3 focus:outline-none focus:ring-1 w-96 px-2 py-1 mr-10 rounded-lg border md:col-span-2" name="input_hinhanh">
                    <img id="output_image" class="h-auto w-40 rounded-lg "/>
                </span>
            </div>
      
            Ẩn/hiện bài viết <input type="checkbox" name="input_anhien" value="1" class="mr-10" checked>
            Bài viết nổi bật <input type="checkbox" name="input_noibat" value="1" >
            <textarea name="editor" id="editor" rows="30" cols="80"></textarea>
            <input type="submit" value="Thêm" class="bg-pink-500 m-2 text-white px-2 py-1 rounded-lg border">
            
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type='text/javascript'>
        CKEDITOR.replace('editor');
        
        function preview_image(event){
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection