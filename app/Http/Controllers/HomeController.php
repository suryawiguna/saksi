<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\KabupatenKota;
use App\Kecamatan;
use App\KelurahanDesa;
use App\Saksi;
use App\User;
use App\Partai;
use App\Koor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function saksiSaya() {
      $users = Auth::user();
      $namaKec = $users->name;
      $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->value('id');

      $kels = Kecamatan::find($idKec)->kelurahanDesa;

      $allKec = Saksi::where('id_kecamatan',$idKec)->orderBy('created_at','DESC');
      $count = $allKec->count();
      $saksiKecs = $allKec->simplePaginate(20);

      return view('profil.saksiSaya', compact('saksiKecs','kels','count'));
    }

    public function saksiSayaKel($id) {
      $kelNow = KelurahanDesa::find($id);

      $users = Auth::user();
      $namaKec = $users->name;

      $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
      $kels = Kecamatan::find($idKec)->kelurahanDesa;
      $idKels = $kels->pluck('id')->toArray();

      if(in_array($id, $idKels)) {
        $allKel = Saksi::where('id_kelurahandesa', $id)->orderBy('created_at','DESC');

        $count = $allKel->count();
        $saksiKels = $allKel->simplePaginate(20);

        return view('profil.saksiSayaKel', compact('saksiKels','kels','kelNow','count'));
      }
      else {
        abort(404);
      }
    }


  public function cariSaksiSaya(Request $request) {
    $users = Auth::user();
    $namaKec = $users->name;

    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
    $kels = Kecamatan::find($idKec)->kelurahanDesa;

    $req = $request->all();
    $this->validate($request, [
      'q'=> 'required',
    ]);

    $q = $req['q'];
    if($q != ""){
      $idKoor = Koor::where('nama_koor','LIKE', '%' . $q . '%')->value('id');
      $idPartai = Partai::where('nama_partai','LIKE', '%' . $q . '%')->value('id');

      $allKec = Saksi::where(function ($query) use ($idKec){
        $query->where('id_kecamatan', $idKec);
      })
      ->where(function ($query) use ($q, $idKoor, $idPartai){
        $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'id_partai', $idPartai )
        ->orWhere ( 'id_koor', $idKoor )
        ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
      });
      $count = $allKec->count();
      $saksiKecs = $allKec->simplePaginate (20);
      $saksiKecs->appends($request->only('q'));

      return view('profil.saksiSaya', compact('saksiKecs','kels','count'));
    }
  }


  public function cariSaksiSayaKel(Request $request, $id) {
    $kelNow = KelurahanDesa::find($id);

    $users = Auth::user();
    $namaKec = $users->name;

    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
    $kels = Kecamatan::find($idKec)->kelurahanDesa;
    $idKels = $kels->pluck('id')->toArray();

    if(in_array($id, $idKels)) {
      $req = $request->all();
      $this->validate($request, [
        'q'=> 'required',
      ]);

      $q = $req['q'];
      if($q != ""){
        $idKoor = Koor::where('nama_koor','LIKE', '%' . $q . '%')->value('id');
        $idPartai = Partai::where('nama_partai','LIKE', '%' . $q . '%')->value('id');

        $allKel = Saksi::where(function ($query) use ($id){
          $query->where('id_kelurahandesa', $id);
        })
        ->where(function ($query) use ($q, $idKoor, $idPartai){
          $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
          ->orWhere ( 'id_partai', $idPartai )
          ->orWhere ( 'id_koor', $idKoor )
          ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
          ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
          ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
        });
        $count = $allKel->count();
        $saksiKels = $allKel->simplePaginate (20);
        $saksiKels->appends($request->only('q'));

        return view('profil.saksiSayaKel', compact('saksiKels','kels','kelNow','namaKec','count'));
      }
    }
    else {
      abort(404);
    }
  }


  public function koorSaya() {

    $users = Auth::user();
    $namaKec = $users->name;
    $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->value('id');

    $kels = Kecamatan::find($idKec)->kelurahanDesa;

    $allKec = Koor::where('id_kecamatan',$idKec)->orderBy('created_at','DESC');
    $count = $allKec->count();
    $koorKecs = $allKec->simplePaginate(20);

    return view('profil.koorSaya', compact('koorKecs','kels','count'));
  }

  public function koorSayaKel($id) {
    $kelNow = KelurahanDesa::find($id);

    $users = Auth::user();
    $namaKec = $users->name;

    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
    $kels = Kecamatan::find($idKec)->kelurahanDesa;
    $idKels = $kels->pluck('id')->toArray();

    if(in_array($id, $idKels)) {
      $allKel = Koor::where('id_kelurahandesa', $id)->orderBy('created_at','DESC');;
      $count = $allKel->count();
      $koorKels = $allKel->simplePaginate(20);

      return view('profil.koorSayaKel', compact('koorKels','kels','kelNow','count'));
    }
    else {
      abort(404);
    }
  }



  public function cariKoorSaya(Request $request) {

    $users = Auth::user();
    $namaKec = $users->name;
    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');

    $kels = Kecamatan::find($idKec)->kelurahanDesa;

    $req = $request->all();
    $this->validate($request, [
      'q'=> 'required',
    ]);

    $q = $req['q'];
    if($q != ""){
      $allKec = Koor::where(function ($query) use ($idKec){
        $query->where('id_kecamatan', $idKec);
      })
      ->where(function ($query) use ($q){
        $query->where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
      });
      $count = $allKec->count();
      $koorKecs = $allKec->simplePaginate (20);
      $koorKecs->appends($request->only('q'));

      return view('profil.koorSaya', compact('koorKecs','kels','count'));
    }
  }


  public function cariKoorSayaKel(Request $request, $id) {
    $kelNow = KelurahanDesa::find($id);

    $users = Auth::user();
    $namaKec = $users->name;

    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
    $kels = Kecamatan::find($idKec)->kelurahanDesa;
    $idKels = $kels->pluck('id')->toArray();

    if(in_array($id, $idKels)) {
      $req = $request->all();
      $this->validate($request, [
        'q'=> 'required',
      ]);

      $q = $req['q'];
      if($q != ""){
        $allKel = Koor::where(function ($query) use ($id){
          $query->where('id_kelurahandesa', $id);
        })
        ->where(function ($query) use ($q){
          $query->where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
          ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
          ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
        });
        $count = $allKel->count();
        $koorKels = $allKel->simplePaginate (20);
        $koorKels->appends($request->only('q'));

        return view('profil.koorSayaKel', compact('koorKels','kels','kelNow','count'));
      }
    }
    else {
      abort(404);
    }
  }

  public function profilKoor($id) {
    $koors = Koor::where('id', $id)->get();
    $saksis = Saksi::where('id_koor', $id)->get();
    return view('panel.showKoor', compact('koors', 'saksis'));
  }

  public function persentase() {
    $semuaSaksi = Saksi::count();
    $targetSemuaSaksi = 12602;
    $persenSemuaSaksi = number_format(($semuaSaksi/$targetSemuaSaksi)*100, 1, ',','');

    $semuaKoor = Koor::count();
    $targetSemuaKoor = 1260;   
    $persenSemuaKoor = number_format(($semuaKoor/$targetSemuaKoor)*100, 1,',','');

    $kab = [
      1 => array('nama' => 'Badung','saksi' => 1168, 'koor' => 116, 
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0
      ), 
      2 => array('nama' => 'Bangli','saksi' => 934, 'koor' => 93,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      3 => array('nama' => 'Buleleng','saksi' => 2174, 'koor' => 217,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      4 => array('nama' => 'Denpasar','saksi' => 1634, 'koor' => 163,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      5 => array('nama' => 'Gianyar','saksi' => 1544, 'koor' => 154,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ), 
      6 => array('nama' => 'Jembrana','saksi' => 998, 'koor' => 99,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      7 => array('nama' => 'Karangasem','saksi' => 1890, 'koor' => 189,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      8 => array('nama' => 'Klungkung','saksi' => 700, 'koor' => 70,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      9 => array('nama' => 'Tabanan','saksi' => 1560, 'koor' => 156,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
    ];
    
    foreach ($kab as $key => $target){
      $kab[$key]['jumSaksi'] = Saksi::where('id_kabupatenkota', $key)->count();
      $kab[$key]['persenSaksi'] = round(($kab[$key]['jumSaksi']/$kab[$key]['saksi'])*100, 1);

      $kab[$key]['jumKoor'] = Koor::where('id_kabupatenkota', $key)->count();
      $kab[$key]['persenKoor'] = round(($kab[$key]['jumKoor']/$kab[$key]['koor'])*100, 1);
    }
    foreach ($kab as $key => $data){
      $nama[] = $data['nama'];
      $persenSaksi[] = $data['persenSaksi'];
      $persenKoor[] = $data['persenKoor'];
    }
    return view('home', compact(
      'semuaSaksi',
      'targetSemuaSaksi',
      'persenSemuaSaksi',
      'semuaKoor',
      'targetSemuaKoor',
      'persenSemuaKoor',
      'kab',
      'nama',
      'persenSaksi',
      'persenKoor'
    ));
  }
}
