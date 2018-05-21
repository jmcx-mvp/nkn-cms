<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = [
        'title',
        'focus_img_url',
        'summary',
        'content',
        'status'
    ];
}
