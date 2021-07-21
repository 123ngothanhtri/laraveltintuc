<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\LoaiBaiViet;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Storage;
class BaiVietController extends Controller
{
    function show(){
        $tt = BaiViet::orderBy('id_baiviet', 'desc')
                        ->join('loaibaiviet', 'baiviet.id_loaibaiviet', 'loaibaiviet.id_loaibaiviet')
                        ->get();
        return view('quan_ly_bai_viet',['tt'=>$tt]);
    }
    function thembaiviet(){
        $lt=Loaibaiviet::all();
        return view('them_bai_viet',['lt'=>$lt]);
    }
    function xulythembaiviet(Request $r){
        $them = new BaiViet;
        $them->tieude_baiviet=$r->input_tieude;
        $them->mota_baiviet=$r->input_mota;
        if(!empty($r->input_anhien)){
            $them->anhien_baiviet=1;
        }
        else{
            $them->anhien_baiviet=0;
        }
        if(!empty($r->input_noibat)){
            $them->noibat_baiviet=1;
        }
        else{
            $them->noibat_baiviet=0;
        }
        $them->ngaythem_baiviet=date('Y-m-d');
        $them->hinhanh_baiviet = $r->file('input_hinhanh')->store('hinhanh','public');
        //Storage::disk('public')->putFile('hinhanh', $r->file('input_hinhanh'));

        $them->noidung_baiviet=$r->editor;
        $them->id_loaibaiviet=$r->input_loaibaiviet;
        
        $them->save();
        
        return redirect()->route('baiviet');


    }
    function suabaiviet($id){
        $lt=LoaiBaiViet::all();
        $tt=BaiViet::all()->where('id_baiviet',$id)->first();
        return view('sua_bai_viet',compact('lt','tt'));
    }
    function xulysuabaiviet(Request $r){
        $them = BaiViet::all()->where('id_baiviet',$r->input_id_baiviet)->first();
        $them->tieude_baiviet=$r->input_tieude;
        $them->mota_baiviet=$r->input_mota;
        if(!empty($r->input_anhien)){
            $them->anhien_baiviet=1;
        }
        else{
            $them->anhien_baiviet=0;
        }
        if(!empty($r->input_noibat)){
            $them->noibat_baiviet=1;
        }
        else{
            $them->noibat_baiviet=0;
        }

        
        $them->noidung_baiviet=$r->editor;
        //$them->id_loaiti=$r->input_loaiti;
        
        $them->save();
        
        return redirect()->route('baiviet');

    }
    
    function xoabaiviet($id){
        $bl = BinhLuan::where('id_baiviet',$id);
        $bl->delete();

        $xoa = BaiViet::find($id);
        $xoa->delete();

        Storage::disk('public')->delete($xoa->hinhanh_baiviet);

        return back();
    }
}
