<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class Video extends Model
{
  use HashId;

  protected $table = 'ds_video';
  protected $guarded = [];

  public function noImg()
  {
      return empty($this->img)?true:false;
  }
}
