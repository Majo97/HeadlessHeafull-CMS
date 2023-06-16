<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
         Company::flushEventListeners();

         DB::transaction(function () {
             Company::factory()->count(10)->create();
         });
 
         Company::boot();
    }
}
