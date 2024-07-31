<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['crime_record_id' => 1, 'case_number' => 'C001', 'description' => 'متهم به حمل و نگهداری غیرقانونی اسلحه.', 'start_date' => '1403-01-01', 'end_date' => '1403-06-01', 'status' => 'در حال بررسی', 'crime_type' => 'حمل و نگهداری غیرقانونی', 'crime_location' => 'تهران'],
            ['crime_record_id' => 2, 'case_number' => 'C002', 'description' => 'متهم به سرقت از یک فروشگاه بزرگ.', 'start_date' => '1403-01-15', 'end_date' => '1403-07-15', 'status' => 'محاکمه شده', 'crime_type' => 'سرقت', 'crime_location' => 'مشهد'],
            ['crime_record_id' => 3, 'case_number' => 'C003', 'description' => 'متهم به فریبکاری مالی و کلاهبرداری.', 'start_date' => '1403-02-01', 'end_date' => '1403-08-01', 'status' => 'در حال بررسی', 'crime_type' => 'کلاهبرداری مالی', 'crime_location' => 'تهران'],
            ['crime_record_id' => 4, 'case_number' => 'C004', 'description' => 'متهم به قتل عمدی در درگیری خانوادگی.', 'start_date' => '1403-03-01', 'end_date' => '1403-09-01', 'status' => 'محاکمه شده', 'crime_type' => 'قتل عمدی', 'crime_location' => 'کرج'],
            ['crime_record_id' => 5, 'case_number' => 'C005', 'description' => 'متهم به تعرض به حریم خصوصی و هک اطلاعات.', 'start_date' => '1403-04-01', 'end_date' => '1403-10-01', 'status' => 'در حال بررسی', 'crime_type' => 'هک اطلاعات', 'crime_location' => 'تهران'],
            ['crime_record_id' => 6, 'case_number' => 'C006', 'description' => 'متهم به قاچاق مواد مخدر در مقیاس بزرگ.', 'start_date' => '1403-05-01', 'end_date' => '1403-11-01', 'status' => 'محاکمه شده', 'crime_type' => 'قاچاق مواد مخدر', 'crime_location' => 'اصفهان'],
            ['crime_record_id' => 7, 'case_number' => 'C007', 'description' => 'متهم به جعل اسناد و مدارک رسمی.', 'start_date' => '1403-06-01', 'end_date' => '1403-12-01', 'status' => 'در حال بررسی', 'crime_type' => 'جعل اسناد', 'crime_location' => 'شیراز'],
            ['crime_record_id' => 8, 'case_number' => 'C008', 'description' => 'متهم به قتل عمدی با شواهد قوی.', 'start_date' => '1403-07-01', 'end_date' => '1404-01-01', 'status' => 'در حال بررسی', 'crime_type' => 'قتل عمدی', 'crime_location' => 'تبریز'],
            ['crime_record_id' => 9, 'case_number' => 'C009', 'description' => 'متهم به کلاهبرداری مالی با استفاده از مدارک جعلی.', 'start_date' => '1403-08-01', 'end_date' => '1404-02-01', 'status' => 'محاکمه شده', 'crime_type' => 'کلاهبرداری مالی', 'crime_location' => 'تهران'],
            ['crime_record_id' => 10, 'case_number' => 'C010', 'description' => 'متهم به ضرب و شتم شدید در درگیری خیابانی.', 'start_date' => '1403-09-01', 'end_date' => '1404-03-01', 'status' => 'در حال بررسی', 'crime_type' => 'ضرب و شتم', 'crime_location' => 'مشهد'],
        ];

        DB::table('cases')->insert($data);
    }
}
