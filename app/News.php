<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name', 'preview_text', 'detail_text', 'image', 'id_cat', 'id_user',
    ];
}
