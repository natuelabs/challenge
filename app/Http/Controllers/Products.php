<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aRequest = \Request::all();

        $oProducts = new Product();
        $oProducts = $oProducts->with('specifications');

        if(isset($aRequest['specifications']) && !empty($aRequest['specifications'])){
            $oProducts = $oProducts->whereHas('specifications', function ($query) use ($aRequest){
                $query->whereIn('products_specifications.id_specification', $aRequest['specifications']);
            });
        }
        
        $sOrderBy = 'asc';
        if(isset($aRequest['sOrderBy']) && !empty($aRequest['sOrderBy'])){
            $sOrderBy = $aRequest['sOrderBy'];
        }

        $oProducts = $oProducts->distinct();
        $oProducts = $oProducts->orderBy('price', $sOrderBy);
        
        return $oProducts->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
