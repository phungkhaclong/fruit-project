<?php

namespace Database\Seeders;

use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Quản trị hệ thống'],
            ['name' => 'developer', 'display_name' => 'Phát triển hệ thống'],
            ['name' => 'content', 'display_name' => 'Chỉnh sửa nội dung'],
            ['name' => 'guest', 'display_name' => 'khách hàng'],
        ]);
    }
}
