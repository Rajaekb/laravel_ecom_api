<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
      return [
       
        'name'=> $this->name,
        'slug'=> $this->slug,
        'img'=> $this->img,
        'details'=> $this->details,
        'description'=> $this->description,
        'price'=> $this->price,
        'stock'=> $this->stock,
        'user'=> $this->user->name,
        'store'=> $this->store->name,
        'categorie'=> $this->categorie->name
      ];
    }
}
/**/
