<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->text('TenSP')->nullable();
            $table->unsignedInteger('Gia');
            $table->unsignedInteger('GiaMoi');
            $table->string('Image1')->nullable();
            $table->string('Image2')->nullable();
            $table->integer('SoLuong')->nullable();
            $table->text('MoTa');
            $table->integer('DanhMuc');
            $table->integer('TrangThai');
            $table->timestamps();
            $table->unsignedInteger('MaLoai')->index('sanpham_maloai_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
