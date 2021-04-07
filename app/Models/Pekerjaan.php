<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Pekerjaan extends Model
{
    use HashId;

    protected $table = 'ds_pekerjaan';
    protected $guarded = [];
    public $incrementing = false;
}
