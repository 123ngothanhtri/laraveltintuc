<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiBaiViet;
use App\Models\BaiViet;
class LoaiBaiVietController extends Controller
{
    function show(){
        $lt=LoaiBaiViet::orderBy('id_loaibaiviet', 'desc')->get();
        return view('quan_ly_loai_tin',['lt'=>$lt]);
    }
    function store(Request $r){
        $them = new LoaiBaiViet;
        $them->ten_loaibaiviet = $r->input_tenloaibaiviet;
        $them->save();
        return back();
    }
    function update(Request $r){
        $sua = LoaiBaiViet::all()->where('id_loaibaiviet',$r->idlt)->first();
        $sua->ten_loaibaiviet = $r->input_tenloaibaiviet;
        $sua->save();
        return back();
    }
    function destroy($id){

        $tt=BaiViet::all()->where('id_loaibaiviet',$id);
        if(count($tt)==0){
            LoaiBaiViet::destroy($id);
            return back();
        }
        else{
            return back()->with('msg','Còn bài viết thuộc loại này nên không xóa được');
        }
    }
}
