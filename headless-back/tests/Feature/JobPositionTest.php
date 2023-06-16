<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\JobPosition;

class JobPositionTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function testObtenerListadoPlazasPaginado()
    {

        $perPage = 5;
        $response = $this->get('http://localhost/api/index/5');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'current_page',
            'data' => [
                '*' => [
                    'position_id',
                    'title',
                    'image',
                    'address',
                    'Job_type',
                    'company_name',
                ],
            ],
            'first_page_url',
            'from',
            'last_page',
            'last_page_url',
            'links' => [
                '*' => [
                    'url',
                    'label',
                    'active',
                ],
            ],
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
            'total',
        ]);

        $responseData = $response->json();
        $this->assertEquals(1, $responseData['current_page']);
        $this->assertEquals($perPage, $responseData['per_page']);

        // Verificar los datos de cada plaza devuelta
        foreach ($responseData['data'] as $Job) {
            $this->assertArrayHasKey('title', $Job);
            $this->assertArrayHasKey('image', $Job);
            $this->assertArrayHasKey('address', $Job);
            $this->assertArrayHasKey('Job_type', $Job);
            $this->assertArrayHasKey('company_name', $Job);
        }
    }
    public function testObtenerDetallePlazaDisponible()
    {
        $jobPositionId = 1;
        $jobPosition = JobPosition::find($jobPositionId);

        $response = $this->get('http://localhost/api/job-positions/' . $jobPositionId);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'image',
            'company' => [
                'name',
                'website'
            ],
            'title',
            'type',
            'address',
            'description',
            'requirements',
            'responsibilities'
        ]);
        $responseData = $response->json();
        $this->assertEquals($jobPosition->image, $responseData['image']);
        $this->assertEquals($jobPosition->company->name, $responseData['company']['name']);
        $this->assertEquals($jobPosition->company->website, $responseData['company']['website']);
        $this->assertEquals($jobPosition->title, $responseData['title']);
        $this->assertEquals($jobPosition->type->name, $responseData['type']);
        $this->assertEquals($jobPosition->address, $responseData['address']);
        $this->assertEquals($jobPosition->description, $responseData['description']);
        $this->assertEquals($jobPosition->requirements, $responseData['requirements']);
        $this->assertEquals($jobPosition->responsibilities, $responseData['responsibilities']);

        $invalidId = 1000;
        $response = $this->get('http://localhost/api/job-positions/' . $invalidId);


        $response->assertStatus(404);
    }
}
