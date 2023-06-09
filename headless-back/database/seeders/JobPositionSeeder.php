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
            // Deshabilitar la función boot() temporalmente
            JobPosition::flushEventListeners();

            // Crear instancias de Company utilizando el Factory dentro de una transacción
            DB::transaction(function () {
                JobPosition::factory()->count(10)->create();
            });
    
            // Volver a habilitar la función boot()
            JobPosition::boot();
          
       }
    }

