<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "newss";
    protected $fillable=['category','title','description','photo'];
}
