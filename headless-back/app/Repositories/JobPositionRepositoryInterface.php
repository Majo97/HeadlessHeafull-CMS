<?php

namespace App\Repositories;

interface JobPositionRepositoryInterface
{
    public function getAllPositionsPaginated($perPage);
    public function getPositionById($id);
}
