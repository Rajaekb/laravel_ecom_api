<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //get Products list
        $products=Product::all();
        //Return Collection of products as a resource
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /*public function upload(Request $request)
    {
        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        return response()->json(compact('path'));
    }*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if(!$request->hasFile('img')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('img');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = base_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        $img=response()->json(compact('path'));
        return $img;*/

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
        //$product->save();
        if($product->save()){
            return new ProductResource($product);
        }
        //
    
   
    } 
    public function store_img(Request $request)
    {      
        $product=$request->isMethod('put') ? Product::findOrFail
        ($request->product_id): new Product;
        //$product->id=$request->product_id;
        $product->name=$request->name;
        $product->slug=$request->slug;
        // Check if a profile image has been uploaded
        if ($request->has('img')) {
            // Get image file
            $image = $request->file('img');
            // Make a image name based on user name and current timestamp
           // $name = Str::slug($request->input('name')).'_'.time();
           $name =$request->input('name');
           // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);

            
            // Set user profile image path in database to filePath
            $product->img = $filePath;
        }
        $product->details=$request->details;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->user_id=$request->user_id;
        $product->store_id=$request->store_id;
        $product->categorie_id=$request->categorie_id;
        //$product->save();
        if($product->save()){
            return new ProductResource($product);
        }
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
  
        /*$fileName = "";
        $path = $request->file('photo')->move(public_path("/"),$fileName);
        $photoURL=url('/'.$fileName);
        return response()->json(['url'=> $photoURL],200);*/

    
    

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
