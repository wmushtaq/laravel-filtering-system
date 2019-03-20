<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Search\DataList;
use App\Author;
use App\Category;
use App\Book;
use App\Availability;
use App\PriceRange;

class SearchController extends Controller
{
    public function index(Request $request){
        
        // Get data lists
        $data_lists = DataList::getData([(new Book), (new Category), (new Author), (new Availability), (new PriceRange)], $request);
        
        // Generate view
        return view('search', [
            'books' => $data_lists[0], 
            'categories' => $data_lists[1], 
            'authors' => $data_lists[2], 
            'availabilities' => $data_lists[3], 
            'price_ranges' => $data_lists[4],
            ]);
    }
}
