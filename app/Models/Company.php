<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory , SoftDeletes;
    public function company_branches(){
        return $this->hasMany(CompanyBranch::class , 'company_id' , 'id');
    }

}
