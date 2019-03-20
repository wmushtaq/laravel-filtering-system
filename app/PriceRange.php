<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    public function getRangeAttribute()
    {
        return '$'.$this->min .' - $'. $this->max;
    }
}
