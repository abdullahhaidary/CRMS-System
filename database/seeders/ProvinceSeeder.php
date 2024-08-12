<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => 'کابل'],
            ['name' => 'قندهار'],
            ['name' => 'هرات'],
            ['name' => 'مزار شریف'],
            ['name' => 'کندز'],
            ['name' => 'ننگرهار'],
            ['name' => 'غزنی'],
            ['name' => 'بغلان'],
            ['name' => 'بدخشان'],
            ['name' => 'خوست'],
            ['name' => 'فاریاب'],
            ['name' => 'پروان'],
            ['name' => 'لغمان'],
            ['name' => 'بامیان'],
            ['name' => 'تخار'],
            ['name' => 'پکتیکا'],
            ['name' => 'سمنگان'],
            ['name' => 'وردک'],
            ['name' => 'نیمروز'],
            ['name' => 'بادغیس'],
            ['name' => 'ارزگان'],
            ['name' => 'کاپیسا'],
            ['name' => 'جوزجان'],
            ['name' => 'غور'],
            ['name' => 'سرپل'],
            ['name' => 'زابل'],
            ['name' => 'نورستان'],
            ['name' => 'پنجشیر'],
            ['name' => 'کنر'],
            ['name' => 'بلخ'],
            ['name' => 'دایکندی'],
            ['name' => 'هلمند'],
            ['name' => 'لوگر'],
            ['name' => 'فراه'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
