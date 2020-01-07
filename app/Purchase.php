<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = [
        'bill_id'
    ];
    public function user()
    {
        return $this->belongTo('App\User');
    }
    public function product()
    {
        return $this->belongTo('App\Product');
    }
}
