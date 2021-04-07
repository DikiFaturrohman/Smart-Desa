<?php

namespace App\Models;
use App\Traits\HashId;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
  use HashId;

  protected $table = 'ds_foto';
  protected $guarded = [];

  public function noImg()
  {
      return empty($this->img)?true:false;
  }
}
