<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('hoadon_user_id_foreign');
            $table->string('hoten')->nullable();
            $table->string('diachi')->nullable();
            $table->integer('sdt')->nullable();
            $table->string('email')->nullable();
            $table->text('ghichu')->nullable();
            $table->integer('thanhtien')->nullable();
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
        Schema::dropIfExists('hoadon');
    }
}
