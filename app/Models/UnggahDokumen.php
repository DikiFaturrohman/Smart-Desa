<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnggahDokumen extends Model
{
    use HasFactory;

    protected $table = 'ds_unggah_dokumens';
    protected $guarded = [];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function emptyKtp()
    {
        return empty($this->file_ktp)?true:false;
    }

    public function emptyKk()
    {
        return empty($this->file_kk)?true:false;
    }
}
