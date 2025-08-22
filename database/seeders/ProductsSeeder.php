<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ایجاد محتوا در جدول
        $title = [
            1 => 'استابلایزر',
            2 => 'پاور سوئیچینگ',
            3 => 'بلند گو',
            4 => 'پنکه دستی',
            5 => 'پنکه دستی عروسکی',
            6 => 'سه راهی',
            7 => 'ماژول بلوتوث',
            8 => 'ماژول بخار سرد چراغ دار',
            9 => 'مبدل صدای دیجیتال به آنالوگ',
        ];
        $image = [
            1 => 'product1.jpg',
            2 => 'product2.webp',
            3 => 'product3.jpg',
            4 => 'product4.webp',
            5 => 'product5.webp',
            6 => 'product6.webp',
            7 => 'product7.jpg',
            8 => 'product8.jpg',
            9 => 'product9.webp',
        ];
        $category_id = [
            1 => '4',
            2 => '4',
            3 => '2',
            4 => '3',
            5 => '3',
            6 => '4',
            7 => '1',
            8 => '1',
            9 => '2',
        ];
        $factory_id = [
            1 => '2',
            2 => '1',
            3 => '3',
            4 => '3',
            5 => '4',
            6 => '4',
            7 => '4',
            8 => '3',
            9 => '2',
        ];
        $status = [
            'draft',
            'published',
            'rejected',
        ];
        $faker = Factory::create('fa_IR');
        for($i = 1 ; $i <= 9 ; $i++){
            DB::table('products')->insert([
                "title" => $title[$i],
                "description" => $faker->realText(rand(300,600)),
                "image" => $image[$i],
                "category_id" => $category_id[$i],
                "factory_id" => $factory_id[$i],
                "status" => $status[rand(0,2)],
            ]);
        }
    }
}
