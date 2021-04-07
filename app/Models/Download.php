<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Download extends Model
{
    use HashId;

    protected $table = 'ds_download';
    public $incrementing = false;
    protected $guarded = [];

    public function noFile()
    {
        return empty($this->file)?true:false;
    }
}
