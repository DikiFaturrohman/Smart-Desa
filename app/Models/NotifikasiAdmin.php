<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class NotifikasiAdmin extends Model
{
    use HashId;

    protected $table = 'ds_notifikasi_admin';
    protected $guarded = [];
    public $timestamps = false;

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
