<?php

namespace App\Search\Sorting;

use Illuminate\Database\Eloquent\Builder;

class Authors
{
    public static function apply(Builder $query, $order = 'asc')
    {
        return $query->orderBy('authors.name', $order);
    }
}

?>