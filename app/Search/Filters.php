<?php

namespace App\Search;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class Filters {

    public static function apply(Builder $query, Request $request){
        return static::applyFilters($query, $request);
    }

    private static function applyFilters(Builder $query, Request $request){
        
        foreach ($request->all() as $filter => $value) {

            $decorator = static::createFilterDecorator($filter);

            if (class_exists($decorator) && ! empty($value)) {
                $query = $decorator::apply($query, $value);
            }

        }
        return $query;
    }

    private static function createFilterDecorator($filter){
        return __NAMESPACE__ . '\\Filters\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', $filter)));
    }

}

?>