<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Availability
{
    public static function apply(Builder $query, $value)
    {
        return $query->where('books.availability_id', $value);
    }
}

?>