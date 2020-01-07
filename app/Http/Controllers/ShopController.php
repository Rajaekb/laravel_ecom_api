<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ShopController extends Controller
{
    //
    public function index()
    {  
         //$product = Product::inRandomOrder()->take(8)->get();

        $product=Product::all();
        return $product;
    }
    public function show($slug)
    {
        //@param string $slug
        //$product=Product::where('slug',$slug)->firstOrFail();
        $product=Product::find($name);
        //mightAlsoLike = Product::where('slug','!=', $slug)->inRandomOrder()->take(4)->get();
        return $product;
    }
}
