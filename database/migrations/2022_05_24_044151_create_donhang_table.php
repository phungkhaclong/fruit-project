<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('iduser');
            $table->string('SDT', 10);
            $table->string('DiaChi', 200);
            $table->integer('ThanhTien');
            $table->string('TrangThaiDH', 100);
            $table->integer('TrangThai');
            $table->string('NgayLap', 100);
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
        Schema::dropIfExists('donhang');
    }
}
