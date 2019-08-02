<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Koor extends Model
{
  protected $table = 'koors';

  protected $fillable =[
      'id_user','id_kabupatenkota','id_kecamatan','id_kelurahandesa','nama_koor','alamat','no_hp','foto_ktp','foto_diri'
  ];

  public function saksi() {
    return $this->hasMany('App\Saksi', 'id_koor');
  }

  public function user()
  {
    return $this->belongsTo('App\User', 'id_user');
  }

  public function kabupatenKota()
  {
      return $this->belongsTo('App\KabupatenKota', 'id_kabupatenkota');
  }

  public function kecamatan()
  {
      return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
  }

  public function kelurahanDesa()
  {
      return $this->belongsTo('App\KelurahanDesa', 'id_kelurahandesa');
  }
}
