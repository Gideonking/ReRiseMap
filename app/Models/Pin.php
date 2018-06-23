<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    protected $fillable = ['address', 'details', 'lat', 'lng', 'status', 'pin_type_id', 
    						'badge_type_id'];
}
