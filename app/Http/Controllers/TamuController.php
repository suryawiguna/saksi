<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\KabupatenKota;
use App\Kecamatan;
use App\KelurahanDesa;
use App\Saksi;
use App\Koor;
use App\Partai;
use App\User;
use PDF;


class TamuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:tamu');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function lihatSemuaSaksi()
    {
      $all = Saksi::orderBy('created_at','DESC');
      $count = $all->count();
      $saksis = $all->simplePaginate(20);

      $kabs = KabupatenKota::all();

      return view('tamu.saksi.index', compact('saksis', 'kabs', 'count'));
    }

    public function lihatKabKotaSaksi($id) {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $allKab = Saksi::where('id_kabupatenkota', $id)->orderBy('created_at','DESC');
        $count = $allKab->count();
        $saksiKabs = $allKab->simplePaginate(20);

        return view('tamu.saksi.indexKabKota', compact('saksiKabs', 'kabs', 'kabNow', 'kecs', 'count'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKecSaksi($id) {
      if($id <= 57) {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);
        
        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($id)->kelurahanDesa;

        $allKec = Saksi::where('id_kecamatan',$id)->orderBy('created_at','DESC');
        $count = $allKec->count();
        $saksiKecs = $allKec->simplePaginate(20);

        return view('tamu.saksi.indexKec', compact('saksiKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKelDesaSaksi($id) {
      if($id <= 715) {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($idKec)->kelurahanDesa;

        $allKel = Saksi::where('id_kelurahandesa', $id)->orderBy('created_at','DESC');
        $count = $allKel->count();
        $saksiKels = $allKel->simplePaginate(20);

        return view('tamu.saksi.indexKel', compact('saksiKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function searchSaksi(Request $request)
    {
      $kabs = KabupatenKota::all();

      $req = $request->all();
      $this->validate($request, [
        'q'=> 'required',
      ]);

      $q = $req['q'];
      if($q != ""){
        $idKoor = Koor::where('nama_koor','LIKE', '%' . $q . '%')->value('id');
        $idPartai = Partai::where('nama_partai','LIKE', '%' . $q . '%')->value('id');

        $all = Saksi::where ( 'no_tps', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'id_partai', $idPartai )
        ->orWhere ( 'id_koor', $idKoor )
        ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );

        $count = $all->count();
        $saksis = $all->simplePaginate (20);
        $saksis->appends($request->only('q'));
      }
      return view ( 'tamu.saksi.index' , compact('saksis','kabs','count'));
    }


    public function searchKabSaksi(Request $request, $id)
    {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $req = $request->all();
        $this->validate($request, [
          'q'=> 'required',
        ]);

        $q = $req['q'];
        if($q != ""){
          $idKoor = Koor::where('nama_koor','LIKE', '%' . $q . '%')->value('id');
          $idPartai = Partai::where('nama_partai','LIKE', '%' . $q . '%')->value('id');

          $allKab = Saksi::where(function ($query) use ($id){
            $query->where('id_kabupatenkota', $id);
          })
          ->where(function ($query) use ($q, $idKoor, $idPartai){
            $query->where ( 'no_tps', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'id_partai', $idPartai )
            ->orWhere ( 'id_koor', $idKoor )
            ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
          });
          $count = $allKab->count();
          $saksiKabs = $allKab->simplePaginate (20);
          $saksiKabs->appends($request->only('q'));
        }
        return view ( 'tamu.saksi.indexKabKota' , compact('saksiKabs', 'kabs', 'kabNow', 'kecs','count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKecSaksi(Request $request, $id)
    {
      if($id <= 57) {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($id)->kelurahanDesa;

        $req = $request->all();
        $this->validate($request, [
          'q'=> 'required',
        ]);

        $q = $req['q'];
        if($q != ""){
          $idKoor = Koor::where('nama_koor','LIKE', '%' . $q . '%')->value('id');
          $idPartai = Partai::where('nama_partai','LIKE', '%' . $q . '%')->value('id');

          $allKec = Saksi::where(function ($query) use ($id){
            $query->where('id_kecamatan', $id);
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
        }
        return view ( 'tamu.saksi.indexKec' , compact('saksiKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKelSaksi(Request $request, $id)
    {
      if($id <= 715) {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($idKec)->kelurahanDesa;

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
            ->orWhere ( 'id_partai', $idPartai)
            ->orWhere ( 'id_koor', $idKoor )
            ->orWhere ( 'nama_saksi', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
          });
          $count = $allKel->count();
          $saksiKels = $allKel->simplePaginate (20);
          $saksiKels->appends($request->only('q'));
        }
        return view ( 'tamu.saksi.indexKel' , compact('saksiKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow','count'));
      }
      else {
        abort(404);
      }
    }






    public function lihatSemuaKoor()
    {
      $all = Koor::orderBy('created_at','DESC');
      $count = $all->count();
      $koors = $all->simplePaginate(20);

      $kabs = KabupatenKota::all();

      return view('tamu.koor.index', compact('koors', 'kabs','count'));
    }


    public function lihatKabKotaKoor($id) {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $allKab = Koor::where('id_kabupatenkota', $id)->orderBy('created_at','DESC');
        $count = $allKab->count();
        $koorKabs = $allKab->simplePaginate(20);

        return view('tamu.koor.indexKabKota', compact('koorKabs', 'kabNow', 'kabs', 'kecs','count'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKecKoor($id) {
      if($id <= 57) {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($id)->kelurahanDesa;

        $allKec = Koor::where('id_kecamatan',$id)->orderBy('created_at','DESC');
        $count = $allKec->count();
        $koorKecs = $allKec->simplePaginate(20);

        return view('tamu.koor.indexKec', compact('koorKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKelDesaKoor($id) {
      if($id <= 715) {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($idKec)->kelurahanDesa;

        $allKel = Koor::where('id_kelurahandesa', $id)->orderBy('created_at','DESC');
        $count = $allKel->count();
        $koorKels = $allKel->simplePaginate(20);

        return view('tamu.koor.indexKel', compact('koorKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow','kelNow','count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKoor(Request $request)
    {
      $kabs = KabupatenKota::all();

      $req = $request->all();
      $this->validate($request, [
        'q'=> 'required',
      ]);

      $q = $req['q'];
      if($q != ""){
        $all = Koor::where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
        $count = $all->count();
        $koors = $all->simplePaginate (20);
        $koors->appends($request->only('q'));
      }
      return view ( 'tamu.koor.index' , compact('koors','kabs','count'));
    }


    public function searchKabKoor(Request $request, $id)
    {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $req = $request->all();
        $this->validate($request, [
          'q'=> 'required',
        ]);

        $q = $req['q'];
        if($q != ""){
          $allKab = Koor::where(function ($query) use ($id){
            $query->where('id_kabupatenkota', $id);
          })
          ->where(function ($query) use ($q){
            $query->where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
          });
          $count = $allKab->count();
          $koorKabs = $allKab->simplePaginate (20);
          $koorKabs->appends($request->only('q'));
        }
        return view ( 'tamu.koor.indexKabKota' , compact('koorKabs', 'kabs', 'kecs', 'kabNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKecKoor(Request $request, $id)
    {
      if($id <= 57) {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($id)->kelurahanDesa;

        $req = $request->all();
        $this->validate($request, [
          'q'=> 'required',
        ]);

        $q = $req['q'];
        if($q != ""){
          $allKec = Koor::where(function ($query) use ($id){
            $query->where('id_kecamatan', $id);
          })
          ->where(function ($query) use ($q){
            $query->where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
            ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
          });
          $count = $allKec->count();
          $koorKecs = $allKec->simplePaginate (20);
          $koorKecs->appends($request->only('q'));
        }
        return view ( 'tamu.koor.indexKec' , compact('koorKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKelKoor(Request $request, $id)
    {
      if($id <= 715) {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($idKab)->kecamatan;
        $kels = Kecamatan::find($idKec)->kelurahanDesa;

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
        }
        return view ( 'tamu.koor.indexKel' , compact('koorKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow', 'count'));
      }
      else {
        abort(404);
      }
    }

    

    public function profilKoor($id) {
      $koors = Koor::where('id', $id)->get();
      $saksis = Saksi::where('id_koor', $id)->get();
      return view('tamu.showKoor', compact('koors', 'saksis'));
    }




  public function cetakAll(Request $request)
  {
    if ($request->is('tamu/lihatkoor/*'))
    {
      $koors = Koor::all();

      $pdf = PDF::loadview('pdf.koor.provinsi', compact('koors'))->setPaper('a4','portait');

      return $pdf->download('koorSaksiProvinsiBali.pdf');
    }

    else {
      $saksis = Saksi::all();

      $pdf = PDF::loadview('pdf.saksi.provinsi', compact('saksis'))->setPaper('a4','portait');

      return $pdf->download('saksiProvinsiBali.pdf');
    }
  }

  public function cetakKab(Request $request, $id)
  {
    if($id <= 9) {
      if ($request->is('tamu/lihatkoor/*'))
      {
        $kabNow = KabupatenKota::find($id);

        $koorKabs = Koor::where('id_kabupatenkota', $id)->get();

        $pdf = PDF::loadview('pdf.koor.kabupaten', compact('koorKabs','kabNow'))->setPaper('a4','portait');

        return $pdf->download('koorSaksiKabupatenKota-'.$kabNow->nama_kabupatenkota.'.pdf');
      }

      else {
        $kabNow = KabupatenKota::find($id);

        $saksiKabs = Saksi::where('id_kabupatenkota', $id)->get();

        $pdf = PDF::loadview('pdf.saksi.kabupaten', compact('saksiKabs','kabNow'))->setPaper('a4','portait');

        return $pdf->download('saksiKabupatenKota-'.$kabNow->nama_kabupatenkota.'.pdf');
      }
    }
    else {
      abort(404);
    }
  }

  public function cetakKec(Request $request, $id)
  {
    if($id <= 57) {
      if ($request->is('tamu/lihatkoor/*'))
      {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);

        $koorKecs = Koor::where('id_kecamatan', $id)->get();

        $pdf = PDF::loadview('pdf.koor.kecamatan', compact('koorKecs','kabNow','kecNow'))->setPaper('a4','portait');

        return $pdf->download('koorSaksiKecamatan-'.$kecNow->nama_kecamatan.'-'.$kabNow->nama_kabupatenkota.'.pdf');
      }

      else {
        $kabNow = Kecamatan::find($id)->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = Kecamatan::find($id);

        $saksiKecs = Saksi::where('id_kecamatan', $id)->get();

        $pdf = PDF::loadview('pdf.saksi.kecamatan', compact('saksiKecs','kabNow','kecNow'))->setPaper('a4','portait');

        return $pdf->download('saksiKecamatan-'.$kecNow->nama_kecamatan.'-'.$kabNow->nama_kabupatenkota.'.pdf');
      }
    }
    else {
      abort(404);
    }
  }

  public function cetakKel(Request $request, $id)
  {
    if($id <= 715) {
      if ($request->is('tamu/lihatkoor/*'))
      {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $koorKels = Koor::where('id_kelurahandesa', $id)->get();

        $pdf = PDF::loadview('pdf.koor.kelurahan', compact('koorKels','kabNow','kecNow','kelNow'))->setPaper('a4','portait');

        return $pdf->download('koorSaksiKelurahanDesa-'.$kelNow->nama_kelurahandesa.'-'.$kecNow->nama_kecamatan.'-'.$kabNow->nama_kabupatenkota.'.pdf');
      }

      else {
        $kabNow = KelurahanDesa::find($id)->kecamatan->kabupatenKota;
        $idKab = $kabNow->id;
        $kecNow = KelurahanDesa::find($id)->kecamatan;
        $idKec = $kecNow->id;
        $kelNow = KelurahanDesa::find($id);

        $saksiKels = Saksi::where('id_kelurahandesa', $id)->get();

        $pdf = PDF::loadview('pdf.saksi.kelurahan', compact('saksiKels','kabNow','kecNow','kelNow'))->setPaper('a4','portait');

        return $pdf->download('saksiKelurahanDesa-'.$kelNow->nama_kelurahandesa.'-'.$kecNow->nama_kecamatan.'-'.$kabNow->nama_kabupatenkota.'.pdf');
      }
    }
    else {
      abort(404);
    }
  }


  public function persentase() {
    $semuaSaksi = Saksi::count();
    $targetSemuaSaksi = 8333;
    $persenSemuaSaksi = number_format(($semuaSaksi/$targetSemuaSaksi)*100, 1, ',','');

    $semuaKoor = Koor::count();
    $targetSemuaKoor = 1260;   
    $persenSemuaKoor = number_format(($semuaKoor/$targetSemuaKoor)*100, 1,',','');

    $kab = [
      1 => array('nama' => 'Badung','saksi' => 584, 'koor' => 116, 
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0
      ), 
      2 => array('nama' => 'Bangli','saksi' => 467, 'koor' => 93,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      3 => array('nama' => 'Buleleng','saksi' => 2174, 'koor' => 217,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      4 => array('nama' => 'Denpasar','saksi' => 817, 'koor' => 163,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      5 => array('nama' => 'Gianyar','saksi' => 772, 'koor' => 154,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ), 
      6 => array('nama' => 'Jembrana','saksi' => 499, 'koor' => 99,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      7 => array('nama' => 'Karangasem','saksi' => 1890, 'koor' => 189,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      8 => array('nama' => 'Klungkung','saksi' => 350, 'koor' => 70,
                'jumSaksi' => 0, 'persenSaksi' => 0,
                'jumKoor' => 0, 'persenKoor' => 0  
      ),
      9 => array('nama' => 'Tabanan','saksi' => 780, 'koor' => 156,
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
