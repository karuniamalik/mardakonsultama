<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //
    use SoftDeletes;
    
    protected $fillable = [
        'phone_number',	'name',	'email',	'meeting_at',	'budget',	'brief'	,'product_id'	
    ];

    // ngsi tahu model bahwa meeting at type date
    protected $casts = ['meeting_at' => 'date'];

    public function product()  {
        return $this->belongsTo(product::class, 'product_id');
    }
}
