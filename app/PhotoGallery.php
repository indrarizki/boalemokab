<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $table = "photo_gallerys";
    protected $fillable=['photo', 'caption'];
}
