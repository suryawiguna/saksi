<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
  protected $table = 'tb_kabupatenkota';

  protected $fillable = [
      'nama_kabupatenkota'
  ];

  public function kecamatan() {
    return $this->hasMany('App\Kecamatan', 'id_kabupatenkota');
  }

  public function koor()
  {
    return $this->hasMany('App\Koor', 'id_kabupatenkota');
  }

  public function saksi()
  {
    return $this->hasMany('App\Saksi', 'id_kabupatenkota');
  }
}
