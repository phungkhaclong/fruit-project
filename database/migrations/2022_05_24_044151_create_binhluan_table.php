<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user')->index('binhluan_id_user_foreign');
            $table->string('name');
            $table->unsignedInteger('id_sanpham')->index('binhluan_id_sanpham_foreign');
            $table->string('noidung');
            $table->string('trangthai');
            $table->string('ngaydang');
            $table->timestamps();
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
