<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organisasi';

    protected $fillable = [
        'name','position','photo'
    ];
}
