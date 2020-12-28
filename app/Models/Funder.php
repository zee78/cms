<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funder extends Model
{
    public function croProject()
    {
        return $this->hasMany('App\Models\CroProject');
    	
    }
}
