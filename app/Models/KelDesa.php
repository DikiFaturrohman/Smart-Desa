<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class KelDesa extends Model
{
    use HashId;

    protected $table = 'keldesa';
    protected $guarded = [];
    public $incrementing = false;
}
