<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_sp');
            $table->integer('id_user');
            $table->text('noidung');
            $table->string('ngaylap', 200);
            // $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            // $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->float('danhgia', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgia');
    }
}
