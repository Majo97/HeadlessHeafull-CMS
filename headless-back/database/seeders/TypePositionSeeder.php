<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['name' => 'Full-time'],
            ['name' => 'Part-time'],
            ['name' => 'Temporary'],
            ['name' => 'Contract'],
            ['name' => 'Freelance'],
            ['name' => 'Shift work'],
        ];
        

        DB::table('job_position_types')->insert($types);
    }
}
