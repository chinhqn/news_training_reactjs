<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        'name',
     ];
    public function news(){
        return $this->hasMany('App\News','id_cat','id');
    }
}
