<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    public function testAplicarPlaza()
    {
        $validData = [
            'position_id' => 1,
            'name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'cv' => UploadedFile::fake()->create('cv.pdf'),
            'privacy_consent' => true,
        ];
    
        $invalidData = [
            'position_id' => null,
            'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod ante nec mi vehicula.',
            'last_name' => '',
            'email' => 'john.doe@example',
            'cv' => null,
            'privacy_consent' => false,
        ];
    
        // Prueba con datos válidos
        $response = $this->post('http://localhost/api/aplication', $validData);
        $response->assertStatus(200);
    
        // Prueba con datos inválidos
        foreach ($invalidData as $field => $value) {
            $requestData = $validData;
            $requestData[$field] = $value;
    
            $response = $this->post('http://localhost/api/aplication', $requestData);
        }
    
        // Prueba con position_id inválido
        $invalidPositionId = 1000;
        $requestData = $validData;
        $requestData['position_id'] = $invalidPositionId;
        $response = $this->post('http://localhost/api/aplication', $requestData);
       
    
        // Prueba sin consentimiento de privacidad
        $requestData['privacy_consent'] = false;
        $response = $this->post('http://localhost/api/aplication', $requestData);
    
    }
    
}
