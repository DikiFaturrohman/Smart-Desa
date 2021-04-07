<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class LogSuket extends Model
{
    use HashId;

    protected $table = 'ds_suket_log';
    protected $guarded = [];
}
