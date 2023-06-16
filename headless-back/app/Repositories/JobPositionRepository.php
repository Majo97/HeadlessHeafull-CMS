<?php

namespace App\Repositories;

use App\Models\JobPosition;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class JobPositionRepository implements JobPositionRepositoryInterface
{
    public function getAllPositionsPaginated($perPage)
    {
       try{
        return JobPosition::join('job_position_types', 'job_positions.type_id', '=', 'job_position_types.type_id')
        ->join('companies', 'job_positions.company_id', '=', 'companies.company_id')
        ->select('job_positions.position_id','job_positions.title', 'job_positions.image', 'job_positions.address', 'job_position_types.name as Job_type', 'companies.name as company_name')
        ->paginate($perPage);
       }catch (ModelNotFoundException $exception) {
        return null;
    }
    }
    public function getPositionById($id)
    {
        try {
            return JobPosition::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return null;
        }
    }
}
