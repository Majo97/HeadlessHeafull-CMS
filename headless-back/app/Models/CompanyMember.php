<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMember extends Model
{
    use HasFactory;
    protected $primaryKey = 'member_id';
    protected $fillable = ['company_id', 'name', 'email','status'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
