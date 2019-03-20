<?php

namespace App\Search\Data;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Search\Filters;
use App\Search\Sorting\Categories as CategoriesSorting;

class Categories {

    public static function getData(Builder $query, Request $request){
        $query->select('categories.*', DB::raw('count(books.id) as total_books'));
        $query->join('books', 'books.category_id', '=', 'categories.id');
        $query = Filters::apply($query, $request);
        $query = CategoriesSorting::apply($query);
        $query->groupBy('categories.id');
        return $query->get();
    }
}
?>