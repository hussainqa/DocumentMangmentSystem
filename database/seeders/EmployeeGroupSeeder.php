<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_group')->insert([
            ['employee_id' => 1, 'group_id' => 1,'Role'=>1],
            ['employee_id' => 3, 'group_id' => 4],
            ['employee_id' => 2, 'group_id' => 6,'Role'=>1],
            ['employee_id' => 7, 'group_id' => 8,'Role'=>1],
        
        ]);


           // DB::table('employee_group')->insert($data);

    }
}
