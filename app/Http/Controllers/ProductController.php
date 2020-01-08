<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //get Products list
        $products=Product::paginate(8);
        //Return Collection of products as a resource
        return ProductResource::collection($products);
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
        $product=$request->isMethod('put') ? Product::findOrFail
        ($request->product_id): new Product;

        $product->id=$request->product_id;
        $product->name=$request->name;
        $product->slug=$request->slug;
        $product->img=$request->img;
        $product->details=$request->details;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->user_id=$request->user_id;
        $product->store_id=$request->store_id;
        $product->categorie_id=$request->categorie_id;
        if($product->save()){
            return new ProductResource($product);
        }
        //
    
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
          //Show single Product details using Resources
          $product=Product::findOrFail($id);
          return new ProductResource($product);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::findOrFail($id);
        if($product->delete()){
            return new ProductResource($product);
        }
    }
}
