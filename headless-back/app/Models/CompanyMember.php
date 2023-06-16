<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CompanyMember extends Model
{
    use HasFactory;
    protected $primaryKey = 'member_id';
    protected $fillable = ['company_id', 'name', 'email','status','created_by'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_by = Auth::id();
        });
    }
}
