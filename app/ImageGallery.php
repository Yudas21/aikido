<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $table = 'image_gallery';

    protected $fillable = [
        'image_title','image_path','publish'
    ];
}
