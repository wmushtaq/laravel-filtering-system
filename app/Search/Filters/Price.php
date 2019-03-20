<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Price
{
    public static function apply(Builder $query, $value)
    {
        $price_range = $value;
        $price_range = trim(str_replace(' ', '', $price_range));
        $price_range = trim(str_replace('$', '', $price_range));
        $price_range = explode('-', $price_range);
        return $query->whereBetween('books.price', $price_range);
    }
}

?>