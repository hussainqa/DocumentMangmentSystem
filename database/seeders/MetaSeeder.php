<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
            'name' => 'امر اداري',
            'info_1'=> 'الموضوع',
            'info_2'=> 'ملاحظات',
            'info_3'=> null,
            'info_4'=> null,
            'info_5'=> null,
            'info_6'=> null,
            'info_7'=> null,
            'info_8'=> null,

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'شكر و تقدير',
                'info_1'=> 'العنوان',
                'info_2'=> null,
                'info_3'=> null,
                'info_4'=> null,
                'info_5'=> null,
                'info_6'=> null,
                'info_7'=> null,
                'info_8'=> null,

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],[
                    'name' => 'تعميم',
                    'info_1'=> 'الموضوع',
                    'info_2'=> 'الأهمية',
                    'info_3'=> 'ملاحظات',
                    'info_4'=> null,
                    'info_5'=> null,
                    'info_6'=> null,
                    'info_7'=> null,
                    'info_8'=> null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ],
        ];
        DB::table('meta')->insert($data);
    }
}
