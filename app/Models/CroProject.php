<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CroProject extends Model
{
    public function funder()
    {
        return $this->belongsTo('App\Models\Funder');
    	
    }
}
