<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'guest', 'display_name' => 'Độc giả'],
            ['name' => 'developer', 'display_name' => 'Phát triển hệ thống'],
            ['name' => 'biên tập viên', 'display_name' => 'Chỉnh sửa nội dung'],
        ]);
    }
}
