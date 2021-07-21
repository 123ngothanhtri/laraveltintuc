<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\LoaiBaiViet;
use App\Models\LienHe;
use App\Models\BinhLuan;
class ThongKeController extends Controller
{
    function thongke(){
        $tt=BaiViet::all();
        $lh=LienHe::all();
        $lt=LoaiBaiViet::all();
        $bl=BinhLuan::all();
        return view('quan_ly_thong_ke',compact('tt','lh','lt','bl'));
    }
}
