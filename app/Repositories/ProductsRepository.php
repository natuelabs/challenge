<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models;

class ProductsRepository extends Model
{

    public function Search($filter = array(), $order = 'ASC') {
        $products = new Models\Product();
        $products->SetData();
        $products->Filter($filter, 'specifications');
        $products->Sort($order, 'price');
        return $products->GetData();
    }

}
