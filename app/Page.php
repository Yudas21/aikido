<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;

    protected $table = 'page';

    protected $fillable = [
        'name','page_image','page_content'
    ];
    protected $dates = ['deleted_at'];
}
