<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'Tin thường',
            'quantity' => 100000,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'Tin Đặc Biệt',
            'quantity' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('types')->insert([
            'name' => 'Tin Nổi Bật',
            'quantity' => 4,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => bcrypt('123456'),
            'level' => 1,
            'remember_token' => '',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
