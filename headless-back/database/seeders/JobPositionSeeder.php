<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          
            JobPosition::flushEventListeners();

            DB::transaction(function () {
                JobPosition::factory()->count(10)->create();
            });
    
          
            JobPosition::boot();
          
       }
    }

