<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrimeRegisterRecordInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['people_id' => '1', 'description' => 'متهم به حمل و نگهداری غیرقانونی اسلحه.'],
            ['people_id' => '2', 'description' => 'متهم به سرقت از یک فروشگاه بزرگ.'],
            ['people_id' => '3', 'description' => 'متهم به فریبکاری مالی و کلاهبرداری.'],
            ['people_id' => '4', 'description' => 'متهم به قتل عمدی در درگیری خانوادگی.'],
            ['people_id' => '5', 'description' => 'متهم به تعرض به حریم خصوصی و هک اطلاعات.'],
            ['people_id' => '6', 'description' => 'متهم به قاچاق مواد مخدر در مقیاس بزرگ.'],
            ['people_id' => '7', 'description' => 'متهم به جعل اسناد و مدارک رسمی.'],
            ['people_id' => '8', 'description' => 'متهم به قتل عمدی با شواهد قوی.'],
            ['people_id' => '9', 'description' => 'متهم به کلاهبرداری مالی با استفاده از مدارک جعلی.'],
            ['people_id' => '10', 'description' => 'متهم به ضرب و شتم شدید در درگیری خیابانی.'],
            ['people_id' => '11', 'description' => 'متهم به خرید و مصرف مواد مخدر به صورت غیرقانونی.'],
            ['people_id' => '12', 'description' => 'متهم به سرقت مسلحانه از یک بانک محلی.'],
            ['people_id' => '13', 'description' => 'متهم به تجاوز جنسی به یک فرد ناشناس.'],
            ['people_id' => '14', 'description' => 'متهم به آتش‌سوزی عمدی در یک ساختمان تجاری.'],
            ['people_id' => '15', 'description' => 'متهم به تجاوز جنسی در یک مهمانی خصوصی.'],
            ['people_id' => '16', 'description' => 'متهم به ایجاد اختلال در نظم عمومی در یک تجمع بزرگ.'],
            ['people_id' => '17', 'description' => 'متهم به دزدی از یک فروشگاه زنجیره‌ای.'],
            ['people_id' => '18', 'description' => 'متهم به قاچاق کالاهای ممنوعه از مرزها.'],
            ['people_id' => '19', 'description' => 'متهم به دزدی از یک منزل مسکونی در شب.'],
            // ['people_id' => '20', 'description' => 'متهم به سرقت از یک مغازه جواهرات.'],
        ];

        DB::table('crime_register_record_information')->insert($data);

    }
}
