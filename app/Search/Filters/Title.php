<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Title
{
    public static function apply(Builder $query, $value)
    {
        return $query->where('books.title', 'LIKE', "%$value%");
    }
}

?>