<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{

    use SoftDeletes;
    //
    protected $fillable = [
        'thumbnail',
        'message',
        'project_client_id'
    ];
    public function client(){
        return $this->belongsTo(ProjectClient::class, 'project_client_id');
    }
}
