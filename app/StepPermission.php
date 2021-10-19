<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepPermission extends Model
{
    protected $fillable=['permission_id','step'];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
