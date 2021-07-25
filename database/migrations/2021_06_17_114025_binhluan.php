<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Binhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id('id_binhluan');
            $table->string('ten_binhluan');
            $table->string('noidung_binhluan');
            $table->date('ngay_binhluan');
            $table->unsignedBigInteger('id_baiviet');

            $table->foreign('id_baiviet')->references('id_baiviet')->on('baiviet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
