<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;

use App\Traits\HashId;



class OneSignal extends Model

{

    use HashId;



    protected $table = 'ds_onesignal';

    protected $guarded = [];

    public $timestamps = false;



    public function user(){

        return $this->belongsTo(User::class,'iduser','id');

    }

}

