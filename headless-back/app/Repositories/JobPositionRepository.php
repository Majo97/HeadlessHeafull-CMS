<?php

namespace App\Repositories;

use App\Models\JobPosition;

class JobPositionRepository implements JobPositionRepositoryInterface
{
    public function getAllPositionsPaginated($perPage)
    {
        return JobPosition::select('title', 'image', 'type')
            ->paginate($perPage);
    }

    public function getPositionById($id)
    {
        return JobPosition::findOrFail($id);
    }
}
