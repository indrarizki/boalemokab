<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConditionPermission extends Model
{
    protected $fillable=['permission_id','condition'];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
