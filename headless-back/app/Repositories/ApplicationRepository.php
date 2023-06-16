<?php

namespace App\Repositories;

use App\Models\Application;

class ApplicationRepository
{
    public function create($data): Application
    {
        return Application::create($data);
    }
}
