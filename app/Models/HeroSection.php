<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    //
    use SoftDeletes;
    //
    protected $fillable = [
        
        'achievement', 'subheader',	'heading',	'path_video', 'banner'	
    ];
}
