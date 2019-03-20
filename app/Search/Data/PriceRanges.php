<?php

namespace App\Search\Data;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Search\Filters;

class PriceRanges {

    public static function getData(Builder $query, Request $request){
        $query->select('price_ranges.*', DB::raw('count(books.id) as total_books'));
        $query->join('books', function($join){
            $join->on('books.price','>=', 'price_ranges.min');
            $join->on('books.price','<=', 'price_ranges.max');
        });
        $query = Filters::apply($query, $request);
        $query->groupBy('price_ranges.id');
        return $query->get();
    }
}
?>