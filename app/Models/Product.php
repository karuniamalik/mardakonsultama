<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
     use SoftDeletes;
    //
    protected $fillable = [
        
        'about',
        'thumbnail',
        'tagline',
        'name'
    ];
    public function appointment(){

        return $this->hasMany(Appointment::class);

    }
}
