<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{
    function guibinhluan(Request $r){
        $gbl=new BinhLuan;
        $gbl->ten_binhluan=$r->input_tbl;
        $gbl->noidung_binhluan=$r->input_ndbl;
        $gbl->id_baiviet=$r->input_idbaiviet;
        $gbl->ngay_binhluan=date('Y-m-d');
        $gbl->save();
        return back();
        
    }
    function quanlybinhluan(){
        $bl=BinhLuan::orderBy('id_binhluan', 'desc')->join('baiviet','binhluan.id_baiviet','baiviet.id_baiviet')->get();
        return view('quan_ly_binh_luan',compact('bl'));
    }
    function xoabinhluan($id){
        Binhluan::destroy($id);
        return back();
    }
}
