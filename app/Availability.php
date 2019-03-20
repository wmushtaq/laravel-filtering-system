<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    public function books(){
        return $this->hasMany(Book::class);
    }
}
