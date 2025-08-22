<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // وارد کردن دسته بندی ها و رنگ های مربوطه در آرایه ها
        $Categories = [
            1 => "ماژول",
            2 => "صوتی",
            3 => "سرمایشی",
            4 => "برقی",
            5 => "نمایشی"
        ];
        $color = [
            "ماژول" => "brown",
            "صوتی" => "pink",
            "سرمایشی" => "blue",
            "برقی" => "red",
            "نمایشی" => "green",
        ];
        // ایجاد محتوا در جدول
        for($i = 1 ; $i <= 5 ; $i++){
            DB::table('Categories')->insert([
                "category_title" => $Categories[$i],
                "category_color" => $color[$Categories[$i]]
            ]);
        }

    }
}
