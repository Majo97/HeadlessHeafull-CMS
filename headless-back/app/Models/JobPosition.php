<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    protected $primaryKey = 'position_id';
    protected $fillable = ['company_id', 'type_id', 'title', 'image', 'address', 'description', 'requirements', 'responsibilities', 'expiration_date', 'status'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function type()
    {
        return $this->belongsTo(JobPositionType::class, 'type_id');
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'position_id');
    }
}


