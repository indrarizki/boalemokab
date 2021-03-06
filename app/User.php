<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getRules()
    {
        $roles = array(
            "admin" => "admin",
            "user" => "user"
        );
        return $roles;
    }

    public static function create($data)
    {
        $created_at = Carbon::now()->format('Y-m-d H:i:s');

        $additional = array(
            'created_at' => $created_at,
            'updated_at' => $created_at,
        );
        $data = array_merge($data, $additional);

        DB::table('users')->insert($data);
    }
}
