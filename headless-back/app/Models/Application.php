<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'application_id';
    protected $fillable = ['position_id', 'name', 'last_name', 'email', 'cv', 'privacy_consent'];

    public function position()
    {
        return $this->belongsTo(JobPosition::class, 'position_id');
    }
 
}
