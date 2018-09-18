<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $table = 'video_gallery';

    protected $fillable = [
        'video_title','video_path','video_url','publish'
    ];
}
