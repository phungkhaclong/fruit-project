<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->foreign(['user_id'])->references(['id'])->on('user');
        });
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadon', function (Blueprint $table) {
            $table->dropForeign('hoadon_user_id_foreign');
        });
    }
}
