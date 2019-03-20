<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Category
{
    public static function apply(Builder $query, $value)
    {
        return $query->where('books.category_id', $value);
    }
}

?>