<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class CatalogController extends Controller
{
    public function getCatalog(){
        return view('catalog');
    }
}