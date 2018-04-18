<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        'name',
     ];
    public function news(){
        return $this->hasMany('App\New','id_cat','id');
    }
}
