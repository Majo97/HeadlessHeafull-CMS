<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobPositionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Realiza una solicitud GET al endpoint 'api/job-positions'
        $response = $this->get('api/job-positions');

        // Verifica el código de estado de la respuesta
        $response->assertStatus(200);

        // Verifica la estructura de la respuesta JSON
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                '*' => [
                    'title',
                    'image',
                    'address',
                    'Job_type',
                    'company_name',
                ],
            ],
        ]);
    }

    public function testShow()
    {
        // Crea un objeto JobPosition existente o utiliza un factory para generarlo

        // Realiza una solicitud GET al endpoint 'api/job-positions/{id}'
        $response = $this->get('api/job-positions/{id}');

        // Verifica el código de estado de la respuesta
        $response->assertStatus(200);

        // Verifica la estructura de la respuesta JSON
        $response->assertJsonStructure([
            'title',
            'image',
            'address',
            'Job_type',
            'company_name',
        ]);
    }
}
