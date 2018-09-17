<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    
    protected $table = 'news';

    protected $fillable = [
        'news_title','news_content','news_image', 'news_publish', 'news_slug', 'created_by', 'updated_by'
    ];
    protected $dates = ['deleted_at'];
}
