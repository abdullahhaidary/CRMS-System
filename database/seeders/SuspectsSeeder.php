<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuspectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('suspect')->insert([
            [
                'crime_record_id' => 1,
                'name' => 'احمد',
                'last_name' => 'رضایی',
                'phone' => '09121234567',
                'tazcira_number' => '1234567890',
                'current_address' => 'تهران، میدان انقلاب',
                'actual_address' => 'تهران، خیابان ولیعصر',
                'father_name' => 'حسین',
                'isCriminal' => 1,
                'Created_by'=>'admin',


            ],
            [
                'crime_record_id' => 2,
                'name' => 'علی',
                'last_name' => 'محمدی',
                'phone' => '09131234567',
                'tazcira_number' => '0987654321',
                'current_address' => 'مشهد، میدان شهدا',
                'actual_address' => 'مشهد، خیابان امام رضا',
                'father_name' => 'محمد',
                'isCriminal' => 1,
                'Created_by'=>'admin',

            ],
            [
                'crime_record_id' => 3,
                'name' => 'فاطمه',
                'last_name' => 'احمدی',
                'phone' => '09132345678',
                'tazcira_number' => '1122334455',
                'current_address' => 'شیراز، میدان سعدی',
                'actual_address' => 'شیراز، خیابان زند',
                'father_name' => 'سید',
                'isCriminal' => 1,
                'Created_by'=>'admin',
            ],
            [
                'crime_record_id' => 4,
                'name' => 'حسین',
                'last_name' => 'کریمی',
                'phone' => '09133456789',
                'tazcira_number' => '5566778899',
                'current_address' => 'اصفهان، میدان انقلاب',
                'actual_address' => 'اصفهان، خیابان حافظ',
                'father_name' => 'حسن',
                'isCriminal' => 1,
                'Created_by'=>'admin',

            ],
            [
                'crime_record_id' => 5,
                'name' => 'مریم',
                'last_name' => 'سلیمی',
                'phone' => '09134567890',
                'tazcira_number' => '6677889900',
                'current_address' => 'کرج، میدان مادر',
                'actual_address' => 'کرج، خیابان آزادی',
                'father_name' => 'سلیمان',
                'isCriminal' => 1,
                'Created_by'=>'admin',

            ],
            [
                'crime_record_id' => 6,
                'name' => 'رضا',
                'last_name' => 'علیزاده',
                'phone' => '09135678901',
                'tazcira_number' => '9988776655',
                'current_address' => 'تبریز، میدان بسیج',
                'actual_address' => 'تبریز، خیابان استاد شهریار',
                'father_name' => 'علی',
                'isCriminal' => 1,
                'Created_by'=>'admin',


            ],
            [
                'crime_record_id' => 7,
                'name' => 'سارا',
                'last_name' => 'محمدی',
                'phone' => '09136789012',
                'tazcira_number' => '3344556677',
                'current_address' => 'تهران، میدان ونک',
                'actual_address' => 'تهران، خیابان فرشته',
                'father_name' => 'محمد',
                'isCriminal' => 1,
                'Created_by'=>'admin',
            ],
            [
                'crime_record_id' => 8,
                'name' => 'بهرام',
                'last_name' => 'کریمی',
                'phone' => '09181234567',
                'tazcira_number' => '1122336677',
                'current_address' => 'کرج، میدان ولیعصر',
                'actual_address' => 'کرج، خیابان شهیدان',
                'father_name' => 'رضا',
                'isCriminal' => 1,
                'Created_by'=>'admin',

            ],
            [
                'crime_record_id' => 9,
                'name' => 'مهناز',
                'last_name' => 'رحیمی',
                'phone' => '09191234567',
                'tazcira_number' => '2233445566',
                'current_address' => 'اصفهان، میدان امام',
                'actual_address' => 'اصفهان، خیابان آزادی',
                'father_name' => 'سعید',
                'isCriminal' => 1,
                'Created_by'=>'admin',


            ],
            [
                'crime_record_id' => 10,
                'name' => 'مهدی',
                'last_name' => 'علیزاده',
                'phone' => '09201234567',
                'tazcira_number' => '6677889900',
                'current_address' => 'تبریز، میدان جمهوری',
                'actual_address' => 'تبریز، خیابان آزادی',
                'father_name' => 'حسین',
                'isCriminal' => 1,
                'Created_by'=>'admin',


            ],
            // [
            //     'crime_record_id' => 11,
            //     'name' => 'آرمان',
            //     'last_name' => 'اکبری',
            //     'phone' => '09112345678',
            //     'tazcira_number' => '3344557788',
            //     'current_address' => 'تهران، میدان آزادی',
            //     'actual_address' => 'تهران، خیابان گاندی',
            //     'father_name' => 'اکبر',
            //     'isCriminal' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
            // [
            //     'crime_record_id' => 12,
            //     'name' => 'نرگس',
            //     'last_name' => 'حسینی',
            //     'phone' => '09123456789',
            //     'tazcira_number' => '5566778899',
            //     'current_address' => 'شیراز، میدان انقلاب',
            //     'actual_address' => 'شیراز، خیابان خلیج فارس',
            //     'father_name' => 'ابراهیم',
            //     'isCriminal' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
            // [
            //     'crime_record_id' => 13,
            //     'name' => 'حمید',
            //     'last_name' => 'موسوی',
            //     'phone' => '09134567890',
            //     'tazcira_number' => '2233445566',
            //     'current_address' => 'تهران، میدان ولیعصر',
            //     'actual_address' => 'تهران، خیابان ولیعصر',
            //     'father_name' => 'موسی',
            //     'isCriminal' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
            // [
            //     'crime_record_id' => 14,
            //     'name' => 'پریسا',
            //     'last_name' => 'صادقی',
            //     'phone' => '09145678901',
            //     'tazcira_number' => '9988776655',
            //     'current_address' => 'تبریز، میدان آذربایجان',
            //     'actual_address' => 'تبریز، خیابان آزادی',
            //     'father_name' => 'سعید',
            //     'isCriminal' => 1,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
        ]);
    }
}
