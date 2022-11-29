<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongbaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongbao', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('iduser');
            $table->string('tieude', 200);
            $table->text('noidung');
            $table->string('ngaylap', 200)->nullable();
            $table->boolean('trangthai');
            // $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            // $table->timestamp('created_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thongbao');
    }
}
