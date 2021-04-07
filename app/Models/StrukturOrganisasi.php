<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class StrukturOrganisasi extends Model
{
    use HashId;

    protected $table = 'ds_struktur_organisasi';
    public $incrementing = false;
    protected $guarded = [];

    public function noImg()
    {
        return empty($this->img)?true:false;
    }
}
