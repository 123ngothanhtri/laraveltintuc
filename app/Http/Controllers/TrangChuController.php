<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\LoaiBaiViet;
use App\Models\LienHe;
use App\Models\BinhLuan;
use Illuminate\Database\Eloquent\Collection;
class TrangChuController extends Controller
{
    function trangchu(){
        $tt=BaiViet::orderBy('id_baiviet', 'desc')->get();
        $lt=LoaiBaiViet::all();
        
        return view('home.trang_chu',compact('tt','lt'));
    }
    function chitietbaiviet($id){
        $cttt=BaiViet::find($id);
        $cttt->luotxem_baiviet++;
        $cttt->save();
        $ttlq=BaiViet::all()->where('id_loaibaiviet',$cttt->id_loaibaiviet);
        $bl=BinhLuan::where('id_baiviet',$id)->get();
        return view('home.chi_tiet_bai_viet',compact('cttt','ttlq','bl'));
    }
    function xulylienhe(Request $r){
        $this->validate($r,[
            'tinnhan'=>'required|min:10|max:100',
            'email'=>'required|min:10|max:50',
        ],[
            'tinnhan.required'=>'Vui lòng nhập tin nhắn',
            'tinnhan.min'=>'Tin nhắn từ 10 đến 100 kí tự ',
            'tinnhan.max'=>'Tin nhắn từ 10 đến 100 kí tự',
            'email.required'=>'Vui lòng nhập Email',
            'email.min'=>'Email từ 10 đến 50 kí tự',
            'email.max'=>'Email từ 10 đến 50 kí tự',
        ]);
        $them=new LienHe;
        $them->email_lienhe=$r->email;
        $them->tinnhan_lienhe=$r->tinnhan;
        $them->ngay_lienhe=date('Y-m-d');
        $them->save();
        return back()->with('msg','Đã gửi');
        
    }
    function quanlylienhe(){
        $qllh=LienHe::orderBy('id_lienhe', 'desc')->get();
        return view('quan_ly_lien_he',compact('qllh'));
    }
    function xoalienhe($id){
        LienHe::destroy($id);
        return back()->with('msg','Đã xóa');
    }
    function loc($id){
        $tt=BaiViet::orderBy('id_baiviet', 'desc')->where('id_loaibaiviet',$id)->get();
        $lt=LoaiBaiViet::all();
        $xn=$id;
        return view('home.trang_chu',compact('tt','lt','xn'));
    }
    function timkiembaiviet(Request $r){
        $tukhoa=$r->tktt;
        $lt=LoaiBaiViet::all();
        $tt=BaiViet::join('loaibaiviet', 'baiviet.id_loaibaiviet', 'loaibaiviet.id_loaibaiviet')
                    ->where('tieude_baiviet','like',"%$tukhoa%")
                    ->orWhere('mota_baiviet','like',"%$tukhoa%")
                    ->orWhere('ten_loaibaiviet','like',"%$tukhoa%")
                    ->get();//->stake(30)->paginate(5);
        return view('home.tim_kiem_bai_viet',compact('tt','tukhoa','lt'));
    }
}
