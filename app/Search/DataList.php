<?php

namespace App\Search;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataList {

    public static function getData($models, Request $request){
        $data = [];
        if ( is_array($models) ){
            foreach ($models as $model){
                $data[] = static::getModelData($model, $request);
            }
        }else{
            $data[] = static::getModelData($models, $request);
        }
        return $data;
    }

    private static function getModelData(Model $model, Request $request){
        $query = $model->newQuery();
        $model_name = static::getModelName($query);
        $decorator = static::createDataDecorator($model_name);
        if( class_exists($decorator) ){
            return $decorator::getData($query, $request);
        }
    }

    private static function getModelName(Builder $query) {
        $class = get_class($query->getModel());
        $path = explode('\\', $class);
        return array_pop($path);
    }

    private static function createDataDecorator($name){
        return __NAMESPACE__ . '\\Data\\' . str_replace(' ', '', ucwords(str_replace('_', ' ', Str::plural($name))));
    }
}
?>