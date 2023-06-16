<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class JobPosition extends Model
{
    use HasFactory;
    protected $primaryKey = 'position_id';
    protected $fillable = ['company_id', 'type_id', 'title', 'image', 'address', 'description', 'requirements', 'responsibilities', 'expiration_date', 'status','created_by'];

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
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_by = Auth::id();
        });
    }
}


