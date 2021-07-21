<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoaiBaiVietController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\TrangChuController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\BinhLuanController;


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']],function (){

    Route::get('thong-ke', [ThongkeController::class,'thongke'])->name('dashboard');
    
    Route::get('loai-tin', [LoaiBaiVietController::class,'show'])->name('loaibaiviet');
    Route::get('xoa-loai-tin/{id}', [LoaiBaiVietController::class,'destroy']);
    Route::post('sua-loai-tin', [LoaiBaiVietController::class,'update']);
    Route::post('them-loai-tin', [LoaiBaiVietController::class,'store']);
    
    Route::get('bai-viet', [BaiVietController::class,'show'])->name('baiviet');
    Route::get('xoa-bai-viet/{id}', [BaiVietController::class,'xoabaiviet']);
    Route::get('sua-bai-viet/{id}', [BaiVietController::class,'suabaiviet']);
    Route::post('xu-ly-sua-bai-viet', [BaiVietController::class,'xulysuabaiviet']);
    Route::get('them-bai-viet', [BaiVietController::class,'thembaiviet']);
    Route::post('xu-ly-them-bai-viet', [BaiVietController::class,'xulythembaiviet']);

    Route::get('quan-ly-lien-he', [TrangChuController::class,'quanlylienhe']);
    Route::get('xoa-lien-he/{id}', [TrangChuController::class,'xoalienhe']);
    Route::get('/quan-ly-binh-luan', [BinhLuanController::class,'quanlybinhluan']);
    Route::get('/xoa-binh-luan/{id}', [BinhLuanController::class,'xoabinhluan']);
    
});

Route::get('/', [TrangChuController::class,'trangchu']);
Route::get('/loc/{id}', [TrangChuController::class,'loc']);
Route::get('/chi-tiet-bai-viet/{id}', [TrangChuController::class,'chitietbaiviet']);
Route::view('/lien-he', 'home.lien_he');
Route::post('/xu-ly-lien-he', [TrangChuController::class,'xulylienhe']);
Route::post('/tim-kiem-bai-viet', [TrangChuController::class,'timkiembaiviet']);
Route::post('/gui-binh-luan', [BinhLuanController::class,'guibinhluan']);
