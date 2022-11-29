<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->foreign(['id_user'])->references(['id'])->on('user');
            $table->foreign(['id_sanpham'])->references(['id'])->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('binhluan', function (Blueprint $table) {
            $table->dropForeign('binhluan_id_user_foreign');
            $table->dropForeign('binhluan_id_sanpham_foreign');
        });
    }
}
