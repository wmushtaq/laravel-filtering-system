<?php

namespace App\Search\Filters;

use Illuminate\Database\Eloquent\Builder;

class Author
{
    public static function apply(Builder $query, $value)
    {
        return $query->where('books.author_id', $value);
    }
}

?>