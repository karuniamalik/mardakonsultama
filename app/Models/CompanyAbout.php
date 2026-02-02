<?php

namespace App\Models;

use App\Models\CompanyKeypoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyAbout extends Model
{
    //
    use SoftDeletes;
    //
    protected $fillable = [
        
        'name','thumbnail',	'type'	
    ];


    public function keypoints(){

        return $this->hasMany(CompanyKeypoint::class);

    }
}
