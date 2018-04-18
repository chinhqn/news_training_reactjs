<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [

        'name', 'preview_text', 'detail_text', 'image', 'id_cat', 'id_user',
    ];

    public function cat(){
        return $this->belongsTo('App\Cat','id_cat','id');
    }

}
