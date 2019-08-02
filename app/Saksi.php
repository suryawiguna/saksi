<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    protected $table = 'saksis';

    protected $fillable =[
        'id_koor',
        'id_user',
        'id_kabupatenkota',
        'id_kecamatan',
        'id_kelurahandesa',
        'no_tps',
        'id_partai',
        'nama_saksi',
        'alamat',
        'no_hp',
        'foto_ktp',
        'foto_diri',
    ];

    public function koor()
    {
        return $this->belongsTo('App\Koor', 'id_koor');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    public function partai()
    {
        return $this->belongsTo('App\Partai', 'id_partai');
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
