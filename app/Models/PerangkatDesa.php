<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class PerangkatDesa extends Model
{
  use HashId;

  protected $table = 'ds_perangkat_desa';
  protected $guarded = [];

  public function noImg()
  {
      return empty($this->img)?true:false;
  }

}
