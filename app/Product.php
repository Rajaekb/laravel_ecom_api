<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        'name','slug','img','details','description','price','stock'
    ];
    public function purchases(){
        return $this->hasMany('App\Purchases');
    }
//convert to money format 
    public function presentPrice()
    {
        return money_format('$%i',$this->price /100);
    }
    public function store()
    {
        return $this->belongTo('App\Store');
    }
}

