<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class JobPositionType extends Model
{
    protected $primaryKey = 'type_id';
    protected $fillable = ['name'];
    public function jobPositions()
{
    return $this->hasMany(JobPosition::class, 'type_id');
}

}
