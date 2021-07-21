<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Baiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id('id_baiviet');
            $table->string('tieude_baiviet');
            $table->string('mota_baiviet');
            $table->text('noidung_baiviet');
            $table->string('hinhanh_baiviet');
            $table->boolean('noibat_baiviet')->nullable();
            $table->boolean('anhien_baiviet')->nullable();
            $table->integer('luotxem_baiviet')->default('0');
            $table->date('ngaythem_baiviet');
            $table->bigInteger('id_loaibaiviet');

            $table->foreign('id_baiviet')->references('id_loaibaiviet')->on('loaibaiviet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
}
