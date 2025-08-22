<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ایجاد محتوا در جدول
        DB::table('users')->insert([
            "realname" => "sepehr",
            "username" => "sepy",
            "password" => Hash::make(3814),
            "status" => '1',
        ]);

        $faker = Factory::create('fa_IR');
        // تولید آرایه با مقادیر غیر همسان
        $rand_username = [];
        for($i = 0 ; $i <= 150 ; $i++){
            array_push($rand_username , $faker->username());
        };
        $uniqueArray = array_unique($rand_username);
        $reset_key = array_values($uniqueArray);
        // وارد کردن 150 کاربر فیک و رندوم در جدول
        for ($i = 0 ; $i < 150 ; $i++){
            DB::table('users')->insert([
                "realname" => $faker->firstname(),
                "username" => $reset_key[$i],
                "password" => Hash::make(3265),
            ]);
        }
    }
}
