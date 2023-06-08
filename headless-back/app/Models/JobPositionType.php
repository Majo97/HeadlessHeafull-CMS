<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPositionType extends Model
{
    protected $primaryKey = 'type_id';
    protected $fillable = ['name'];
}
