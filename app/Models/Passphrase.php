<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Passphrase extends Model
{
    use HashId;
    
    protected $table = 'ds_passphrase';
    public $guarded = [];

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
