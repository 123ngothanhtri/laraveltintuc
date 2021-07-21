<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        // \App\Models\User::factory(2)->create();


        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Thể thao',
        ]);
        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Kinh tế',
        ]);
        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Chính trị',
        ]);
        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Văn hóa',
        ]);
        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Nghệ thuật',
        ]);
        DB::table('loaibaiviet')->insert([
            'ten_loaibaiviet' => 'Công nghệ',
        ]);
    }
}
