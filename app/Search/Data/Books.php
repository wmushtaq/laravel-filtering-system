<?php

namespace App\Search\Data;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Search\Filters;
use App\Search\Sorting\Books as BooksSorting;

class Books {

    public static function getData(Builder $query, Request $request){
        $query->with(['category', 'author', 'availability']);
        $query = Filters::apply($query, $request);
        $query = BooksSorting::apply($query);
        return $query->paginate(10);
    }
}
?>