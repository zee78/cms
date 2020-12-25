<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}
