<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // نگهداری نام کارخانه ها در آرایه
        $factories = [
            1 => "سپهر الکتریک",
            2 => "پرنیک",
            3 => "تسکو",
            4 => "ایرانیان",
        ];
        // ایجاد محتوا در جدول
        for($i = 1 ; $i <= 4 ; $i++){
            DB::table('factories')->insert([
                "factory_title" => $factories[$i]
            ]);
        }
    }
}
