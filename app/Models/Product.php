<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private $productCollection;

    public function SetData() {
        $source = storage_path('data/products.json');
        $data = json_decode(file_get_contents($source));
        $this->productCollection = collect($data);
    }

    public function Filter($parametersArray, $parameterToFilter) {
        if(count($parametersArray) > 0) {
            $this->productCollection = $this->productCollection->filter(
                function ($product) use (&$parametersArray, &$parameterToFilter) {
                    $exists = true;
                    foreach ($parametersArray as $parameter) {
                        if(!$exists) {
                            return false;
                        }
                        $exists = in_array($parameter, $product->$parameterToFilter);
                    }
                    return $exists;
                });
        }
    }

    public function Sort($order, $parameter) {
        $this->productCollection = $this->productCollection->sort(
            function($first, $second) use (&$order, &$parameter){
                if($order == 'ASC') {
                    return $first->$parameter > $second->$parameter;
                }
                return $first->$parameter < $second->$parameter;
        });
    }

    public function GetData() {
        return $this->productCollection;
    }

}
