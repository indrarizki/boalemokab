<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormPermission extends Model
{
    protected $fillable=['permission_id','file'];

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
