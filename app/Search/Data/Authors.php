<?php

namespace App\Search\Data;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Search\Filters;
use App\Search\Sorting\Authors as AuthorsSorting;

class Authors {

    public static function getData(Builder $query, Request $request){
        $query->select('authors.*', DB::raw('count(books.id) as total_books'));
        $query->join('books', 'books.author_id', '=', 'authors.id');
        $query = Filters::apply($query, $request);
        $query = AuthorsSorting::apply($query);
        $query->groupBy('authors.id');
        return $query->get();
    }
}
?>