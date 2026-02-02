<?php

namespace App\Models;

use App\Models\CompanyAbout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyKeypoint extends Model
{
    //
    use SoftDeletes;
    //
    protected $fillable = [
        
        'keypoint',	'company_about_id'
    ];
 
}
