<?php

namespace App\Search\Sorting;

use Illuminate\Database\Eloquent\Builder;

class Categories
{
    public static function apply(Builder $query, $order = 'asc')
    {
        return $query->orderBy('categories.name', $order);
    }
}

?>