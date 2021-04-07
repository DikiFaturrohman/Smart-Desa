<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HashId;

class Admin extends Authenticatable
{
    use Notifiable,Hashid;

    protected $table = 'ds_admins';

    protected $guarded = [];
    public $incrementing = false;
    protected $hidden = [
        'password', 'api_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'ds_admin_roles');
    }

    public function noImg()
    {
        return empty($this->img)?true:false;
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','id');
    }

}
