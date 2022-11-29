<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietgiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietgiohang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('MaGH')->index('FK_GIOHANG');
            $table->integer('MaSP');
            $table->integer('SoLuong');
            $table->integer('Gia');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietgiohang');
    }
}
