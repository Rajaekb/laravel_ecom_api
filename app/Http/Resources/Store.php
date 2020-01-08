<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Store extends JsonResource
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
            'name'=>$this->name,
            'city' => $this->city,
            'theme'=>$this->theme,
            'user' =>$this->user->name
            
        ];

    }
    /*public function with($request){
        return [
            'version' => '1.0.0',
            'author_email' => 'kobirajae@gmail.com'
        ];
}*/
}