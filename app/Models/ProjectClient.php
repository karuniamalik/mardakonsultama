<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectClient extends Model
{
    //
    use SoftDeletes;
    //
    protected $fillable = [
        'name',	
        'occupation',	
        'avatar',	
        'logo'
    ];
}
