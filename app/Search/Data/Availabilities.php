<?php

namespace App\Search\Data;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Search\Filters;

class Availabilities {

    public static function getData(Builder $query, Request $request){
        $query->select('availabilities.*', DB::raw('count(books.id) as total_books'));
        $query->join('books', 'books.availability_id', '=', 'availabilities.id');
        $query = Filters::apply($query, $request);
        $query->groupBy('availabilities.id');
        return $query->get();
    }
}
?>