<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function specifications(){
        return $this->hasMany('App\ProductSpecification', 'id_product', 'id');    
    }
}
