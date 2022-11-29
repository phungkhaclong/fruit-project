<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('iduser');
            $table->integer('TongSL');
            $table->integer('TongGia');
            $table->double('TongTien');
            $table->string('NgayLap', 100);
            $table->dateTime('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->boolean('TrangThai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giohang');
    }
}
