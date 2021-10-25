<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = "permissions";
    protected $fillable=['type','duration','cost'];

    public function condition_permission()
    {
        return $this->hasMany(ConditionPermission::class);
    }

    public function step_permission()
    {
        return $this->hasMany(StepPermission::class);
    }

    public function form_permission()
    {
        return $this->hasMany(FormPermission::class);
    }
}
