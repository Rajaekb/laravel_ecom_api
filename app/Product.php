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
        return $this->belongsTo('App\Store');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}

