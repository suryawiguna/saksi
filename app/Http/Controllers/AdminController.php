<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Saksi;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saksis = DB::table('saksis')->orderBy('created_at', 'desc')->paginate(20);
        // List KabKota di Dropdown
        $kabs = DB::table('tb_kabupatenkota')->get();

        return view('admin.index', compact('saksis', 'kabs'));
    }

    public function lihatKabKota($id) {
      // List KabKota di Dropdown
      $kabs = DB::table('tb_kabupatenkota')->get();
      // list Kecamatan berdasarkan KabKota
      $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$id)->get();

      // id KabKota
      $idKab = DB::table('tb_kabupatenkota')->where('id','=',$id)->value('id');
      // Nama KabKota
      $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$id)->value('nama_kabupatenkota');
      // foreach tabel saksi
      $saksiKabs = DB::table('saksis')->where('kab_kota','=',$namaKab)->paginate(20);

      return view('admin.indexKabKota', compact('saksiKabs', 'kabs', 'namaKab', 'idKab', 'kecs'));
    }

    public function lihatKec($idKab, $id) {
      // List KabKota di Dropdown
      $kabs = DB::table('tb_kabupatenkota')->get();
      // list Kecamatan berdasarkan KabKota
      $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$idKab)->get();
      // List KelurahanDesa berdasarkan Kecamatan
      $kels = DB::table('tb_kelurahandesa')->where('id_kecamatan','=',$id)->get();

      // id KabKota
      $idKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('id');
      // id Kecamatan
      $idKec = DB::table('tb_kecamatan')->where('id','=',$id)->value('id');
      // Nama KabKota
      $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('nama_kabupatenkota');
      // Nama Kec
      $namaKec = DB::table('tb_kecamatan')->where('id','=',$id)->value('nama_kecamatan');
      // foreach tabel saksi
      $saksiKecs = DB::table('saksis')->where('kecamatan','=',$namaKec)->where('kab_kota','=',$namaKab)->paginate(20);

      return view('admin.indexKec', compact('saksiKecs', 'kabs', 'namaKab', 'namaKec', 'idKab', 'idKec', 'kecs', 'kels'));
    }

    public function lihatKelDesa($idKab, $idKec, $id) {
      // List KabKota di Dropdown
      $kabs = DB::table('tb_kabupatenkota')->get();
      // list Kecamatan berdasarkan KabKota
      $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$idKab)->get();
      // List KelurahanDesa berdasarkan Kecamatan
      $kels = DB::table('tb_kelurahandesa')->where('id_kecamatan','=',$idKec)->get();

      // id KabKota
      $idKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('id');
      // id Kecamatan
      $idKec = DB::table('tb_kecamatan')->where('id','=',$idKec)->value('id');
      // id KelurahanDesa
      $idKel = DB::table('tb_kelurahandesa')->where('id','=',$id)->value('id');
      // Nama KabKota
      $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('nama_kabupatenkota');
      // Nama Kec
      $namaKec = DB::table('tb_kecamatan')->where('id','=',$idKec)->value('nama_kecamatan');
      // Nama KelurahanDesa
      $namaKel = DB::table('tb_kelurahandesa')->where('id','=',$id)->value('nama_kelurahandesa');
      // foreach tabel saksi
      $saksiKels = DB::table('saksis')->where('desa','=',$namaKel)->where('kecamatan','=',$namaKec)->where('kab_kota','=',$namaKab)->paginate(20);

      return view('admin.indexKel', compact('saksiKels', 'kabs', 'kecs', 'kels', 'namaKab', 'namaKec', 'namaKel', 'idKab', 'idKec','idKel'));
    }



        public function search(Request $request)
        {
          $kabs = DB::table('tb_kabupatenkota')->get();
          $req = $request->all();
          $this->validate($request, [
            'q'=> 'required',
          ]);

          $q = $req['q'];
          if($q != ""){
            $saksis = Saksi::where ( 'no_tps', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'partai', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'nama_koor', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' )->paginate (20);
          }
          return view ( 'admin.index' , compact('saksis','kabs'));
        }


        public function searchKab(Request $request, $id)
        {
          // List KabKota di Dropdown
          $kabs = DB::table('tb_kabupatenkota')->get();
          // list Kecamatan berdasarkan KabKota
          $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$id)->get();

          // id KabKota
          $idKab = DB::table('tb_kabupatenkota')->where('id','=',$id)->value('id');
          // Nama KabKota
          $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$id)->value('nama_kabupatenkota');

          $req = $request->all();
          $this->validate($request, [
            'q'=> 'required',
          ]);

          $q = $req['q'];
          if($q != ""){
            $saksiKabs = DB::table('saksis')
            ->where(function ($query) use ($namaKab){
              $query->where('kab_kota','=',$namaKab);
            })
            ->where(function ($query) use ($q){
              $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'partai', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_koor', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
            })
            ->paginate (20);
          }
          return view ( 'admin.indexKabKota' , compact('saksiKabs', 'kabs', 'namaKab', 'idKab', 'kecs'));
        }


        public function searchKec(Request $request, $idKab, $id)
        {
          // List KabKota di Dropdown
          $kabs = DB::table('tb_kabupatenkota')->get();
          // list Kecamatan berdasarkan KabKota
          $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$idKab)->get();
          // List KelurahanDesa berdasarkan Kecamatan
          $kels = DB::table('tb_kelurahandesa')->where('id_kecamatan','=',$id)->get();

          // id KabKota
          $idKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('id');
          // id Kecamatan
          $idKec = DB::table('tb_kecamatan')->where('id','=',$id)->value('id');
          // Nama KabKota
          $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('nama_kabupatenkota');
          // Nama Kec
          $namaKec = DB::table('tb_kecamatan')->where('id','=',$id)->value('nama_kecamatan');

          $req = $request->all();
          $this->validate($request, [
            'q'=> 'required',
          ]);

          $q = $req['q'];
          if($q != ""){
            $saksiKecs = DB::table('saksis')
            ->where(function ($query) use ($namaKab, $namaKec){
              $query->where('kab_kota','=',$namaKab)
              ->where('kecamatan','=',$namaKec);;
            })
            ->where(function ($query) use ($q){
              $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'partai', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_koor', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
            })
            ->paginate (20);
          }
          return view ( 'admin.indexKec' , compact('saksiKecs', 'kabs', 'namaKab', 'namaKec', 'idKab', 'idKec', 'kecs', 'kels'));
        }


        public function searchKel(Request $request, $idKab, $idKec, $id)
        {
          // List KabKota di Dropdown
          $kabs = DB::table('tb_kabupatenkota')->get();
          // list Kecamatan berdasarkan KabKota
          $kecs = DB::table('tb_kecamatan')->where('id_kabupatenkota','=',$idKab)->get();
          // List KelurahanDesa berdasarkan Kecamatan
          $kels = DB::table('tb_kelurahandesa')->where('id_kecamatan','=',$idKec)->get();

          // id KabKota
          $idKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('id');
          // id Kecamatan
          $idKec = DB::table('tb_kecamatan')->where('id','=',$idKec)->value('id');
          // id KelurahanDesa
          $idKel = DB::table('tb_kelurahandesa')->where('id','=',$id)->value('id');
          // Nama KabKota
          $namaKab = DB::table('tb_kabupatenkota')->where('id','=',$idKab)->value('nama_kabupatenkota');
          // Nama Kec
          $namaKec = DB::table('tb_kecamatan')->where('id','=',$idKec)->value('nama_kecamatan');
          // Nama KelurahanDesa
          $namaKel = DB::table('tb_kelurahandesa')->where('id','=',$id)->value('nama_kelurahandesa');

          $req = $request->all();
          $this->validate($request, [
            'q'=> 'required',
          ]);

          $q = $req['q'];
          if($q != ""){
            $saksiKels = DB::table('saksis')
            ->where(function ($query) use ($namaKab, $namaKec, $namaKel){
              $query->where('kab_kota','=',$namaKab)
              ->where('kecamatan','=',$namaKec)
              ->where('desa','=',$namaKel);
            })
            ->where(function ($query) use ($q){
              $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'partai', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_koor', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
              ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
            })
            ->paginate (20);
          }
          return view ( 'admin.indexKel' , compact('saksiKels', 'kabs', 'kecs', 'kels', 'namaKab', 'namaKec', 'namaKel', 'idKab', 'idKec','idKel'));
        }

}
