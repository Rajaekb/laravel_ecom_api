<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Resources\Store as StoreResource;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_product($id)
    {
        //show all products in the store randomly
        //$products = Product::inRandomOrder()->take(10)->get();
 
        $products = Store::find($id)->products;
        return $products;
    }

    public function index()
    {
        //get Store list
        $stores=Store::paginate(8);
        //Return Collection of stores as a resource
        return StoreResource::collection($stores);
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
        $store=new Store;
        $store->name=$request->name;
        $store->city=$request->city;
        $store->theme=$request->theme;
        $store->user_id=$request->user_id;
        $store->save();
        return ('saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
        //Show single store details using Resources
        $store=Store::findOrFail($id);
        return new StoreResource($store);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update store details

        $store=Store::find($id);
        $store->name=$request->name;
        $store->city=$request->city;
        $store->theme=$request->theme;
        $store->user_id=$request->user_id;
        $store->save();
     
    
        return("updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(store $store)
    {  //delete store is not recommanded but in case we need it 
        $store=Store::find($id);
        $store->delete();
    }
}
