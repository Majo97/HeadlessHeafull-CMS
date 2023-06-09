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
         // Deshabilitar la función boot() temporalmente
         Company::flushEventListeners();

         // Crear instancias de Company utilizando el Factory dentro de una transacción
         DB::transaction(function () {
             Company::factory()->count(10)->create();
         });
 
         // Volver a habilitar la función boot()
         Company::boot();
    }
}
