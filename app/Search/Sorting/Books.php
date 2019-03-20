<?php

namespace App\Search\Sorting;

use Illuminate\Database\Eloquent\Builder;

class Books
{
    private static $allowed_fields = ['price', 'title'];

    private static $allowed_orders = ['asc', 'desc'];

    private static $default_field = 'price';

    private static $default_order = 'ASC';

    private static $sort_by_param = 'sort_by';

    private static $sort_order_param = 'sort_order';

    public static function apply(Builder $query)
    {
        $request = app('request');
        $sort_field = static::getSortField($request);
        $sort_order = static::getSortOrder($request);
        $method_name = 'get'.ucwords($sort_field).'Field';
        if ( method_exists(__CLASS__, $method_name) ){
            $field_name = call_user_func('static::' . $method_name);
            return $query->orderBy($field_name, $sort_order);
        }else{
            return $query->orderBy($field_name, $sort_order);
        }
    }

    private static function getSortField($request){
        if ( $request->has(static::$sort_by_param) && in_array($request->input(static::$sort_by_param), static::$allowed_fields)){
            return $request->input(static::$sort_by_param);
        }
        return static::$default_field;
    }

    private static function getSortOrder($request){
        if ( $request->has(static::$sort_order_param) && in_array($request->input(static::$sort_order_param), static::$allowed_orders) ){
            return $request->input(static::$sort_order_param);
        }
        return static::$default_order;
    }

    private static function getPriceField(){
        return 'books.price';
    }

    private static function getTitleField(){
        return 'books.title';
    }
}

?>