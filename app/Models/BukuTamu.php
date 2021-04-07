<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HashId;

class BukuTamu extends Model
{
  use HashId;

  protected $table = 'ds_buku_tamu';  
  protected $guarded = [];

}
