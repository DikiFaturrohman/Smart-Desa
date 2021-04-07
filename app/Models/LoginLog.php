<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class LoginLog extends Model
{
    use HashId;

    protected $table = 'ds_login_logs';
    protected $guarded = [];
}
