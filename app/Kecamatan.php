<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
  protected $table = 'tb_kecamatan';

  protected $fillable = [
      'nama_kecamatan',
      'id_kabupatenkota'
  ];

  public function kabupatenKota()
  {
    return $this->belongsTo('App\KabupatenKota', 'id_kabupatenkota');
  }

  public function kelurahanDesa()
  {
    return $this->hasMany('App\KelurahanDesa', 'id_kecamatan');
  }

  public function koor()
  {
    return $this->hasMany('App\Koor', 'id_kecamatan');
  }

  public function saksi()
  {
    return $this->hasMany('App\Saksi', 'id_kecamatan');
  }
}
