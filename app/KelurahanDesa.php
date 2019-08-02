<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
  protected $table = 'tb_kelurahandesa';
  protected $fillable =[
      'nama_kelurahandesa',
      'id_kecamatan'
  ];

  public function kecamatan()
  {
    return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
  }

  public function koor()
  {
    return $this->hasMany('App\Koor', 'id_kelurahandesa');
  }

  public function saksi()
  {
    return $this->hasMany('App\Saksi', 'id_kelurahandesa');
  }
}
