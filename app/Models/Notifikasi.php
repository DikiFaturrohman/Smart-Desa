<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Notifikasi extends Model
{
    use HashId;

    protected $table = 'ds_notifikasi';
    protected $guarded = [];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'pengguna','id');
    }
}
