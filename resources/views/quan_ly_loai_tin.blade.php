@extends('layout')
@section('content')
    <div class="bg-white py-5 border">
        <p class="w-10/12 mx-auto text-xl">
            Quản lý bài viết
        </p>
    </div>


    <div class="w-full p-5">
        @if (session('msg'))
            <div class="bg-red-100 text-red-600 w-full rounded-lg py-2 px-5 mb-2">
                ✘ {{ session('msg') }}
            </div>
        @endif
    <div x-data="{ showModal : false }">
        <!-- Button -->
        <button @click="showModal = !showModal" class="bg-green-500 px-4 py-2 mb-2 text-white rounded-lg">THÊM</button>

        <!-- Modal Background -->
        <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <!-- Modal -->
            <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-5/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
               
                <p class="text-xl my-2">Thêm loại tin</p>
                <form action="{{ url('/them-loai-tin') }}" method="post">@csrf
                    <input type="text" required name="input_tenloaibaiviet" placeholder="Tên loại"  class="w-full mb-2 px-4 py-2 rounded-lg outline-none border">
                
                    <div class="flex justify-end">
                    <a @click="showModal = !showModal" class="bg-gray-100 px-4 py-2 mb-2 text-gray-400 rounded-lg cursor-pointer">Hủy</a>
                    <button type="submit" class="bg-green-500 px-4 py-2 mb-2 text-white rounded-lg ml-2">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





        <table class="border-collapse w-full">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ID</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">TÊN LOẠI BÀI VIẾT</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lt as $i)
                    
                
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Mã loại</span>
                        {{ $i->id_loaibaiviet }}
                    </td>
                      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Tên loại</span>
                        {{ $i->ten_loaibaiviet }}
                      </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Thao tác</span>
                        
                        <div x-data="{ showModal : false }">
                            <!-- Button -->
                            <button @click="showModal = !showModal" class="bg-blue-400 text-white px-2 py-1 rounded-lg hover:bg-blue-500">Sửa</button>
                            <a  href="{{ url('/xoa-loai-tin/'.$i->id_loaibaiviet) }}" class="bg-red-400 text-white px-2 py-1 rounded-lg hover:bg-red-500">Xóa</a>
                            <!-- Modal Background -->
                            <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <!-- Modal -->
                                <div x-show="showModal" class="bg-white rounded-xl shadow-2xl p-6 sm:w-5/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                                   
                                    <p class="text-xl my-2">Sửa loại tin</p>
                                    <form action="{{ url('/sua-loai-tin') }}" method="post">@csrf
                                        <input type="hidden" value="{{  $i->id_loaibaiviet }}" name="idlt">
                                        <input type="text" required name="input_tenloaibaiviet" placeholder="Tên loại" value="{{ $i->ten_loaibaiviet }}" class="w-full mb-2 px-4 py-2 rounded-lg outline-none border">
                                    
                                        <div class="flex justify-end">
                                        <a @click="showModal = !showModal" class="bg-gray-100 px-4 py-2 mb-2 text-gray-400 rounded-lg cursor-pointer">Hủy</a>
                                        <button type="submit" class="bg-green-500 px-4 py-2 mb-2 text-white rounded-lg ml-2">Sửa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
