<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateSaksiRequest;
use App\KabupatenKota;
use App\Kecamatan;
use App\KelurahanDesa;
use App\Saksi;
use App\Koor;
use App\Partai;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $saksis = Saksi::all()->sortByDesc("updated_at");

      return view('panel.index', compact('saksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = Auth::user();
      $namaKab = $users->kab_kota;
      $namaKec = $users->name;

      $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->value('id');

      $desas = Kecamatan::find($idKec)->kelurahanDesa;
      $kelNow = KelurahanDesa::find(1);
      $namaDesa = null;

      $partais = Partai::where('id',0)->get();
      $koors = Koor::where('id',0)->get();

      return view('panel.createSaksi', compact('users', 'desas', 'partais','kelNow','namaDesa','namaKab','namaKec','koors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSaksiRequest $request)
    {
        $req = $request->all();

        $kab = Auth::user()->kab_kota;
        $kec = Auth::user()->name;

        $idKab = KabupatenKota::where('nama_kabupatenkota', $kab)->value('id');
        $idKec = Kecamatan::where('nama_kecamatan', $kec)->value('id');
        $idKel = $req['desaSaksi'];
        $idUser = Auth::user()->id;
        $idKoor = $req['namaKoorSaksi'];
        $idPartai = $req['namaPartai'];

        $noTPS = $req['noTPS'];
        $namaSaksi = $req['namaSaksi'];
        $alamatSaksi = $req['alamatSaksi'];
        $noHpSaksi = $req['noHpSaksi'];

        $saksiExist = Saksi::where(function ($query) use ($idKab, $idKec, $idKel){
          $query->where('id_kabupatenkota', $idKab)
          ->where('id_kecamatan', $idKec)
          ->where('id_kelurahandesa', $idKel);
        })
        ->where(function ($query) use ($idKoor, $idPartai, $noTPS, $namaSaksi, $alamatSaksi, $noHpSaksi){
          $query->where ( 'id_koor', $idKoor )
          ->where ( 'id_partai', $idPartai )
          ->where ( 'no_tps', $noTPS )
          ->where ( 'nama_saksi', $namaSaksi )
          ->where ( 'alamat', $alamatSaksi )
          ->where ( 'no_hp', $noHpSaksi );
        })
        ->exists();

        if($saksiExist) {
          return redirect()->back()->withErrors(['Data Saksi sudah ada']);
        }
        
        $saksiTPS = Saksi::where('id_kabupatenkota', $idKab)
          ->where('id_kecamatan', $idKec)
          ->where('id_kelurahandesa', $idKel)
          ->where('no_tps', $noTPS)->count();
        if($saksiTPS == 2) {
          return redirect()->back()->withErrors(['Pada '.$noTPS.' sudah terdapat 2 Saksi.']);
        }

        $this->validate($request, [
          'fotoKtpSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
          'fotoDiriSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotoktp = $request->file('fotoKtpSaksi');
        $upload_fotodiri = $request->file('fotoDiriSaksi');
        
        $imgPathKtp = $upload_fotoktp->hashName('public/ktpsaksi');
        $imgPathDiri = $upload_fotodiri->hashName('public/dirisaksi');

        $thumbKtp = Image::make($upload_fotoktp);
        $thumbDiri = Image::make($upload_fotodiri);
        $thumbKtp->orientate()->widen(400);
        $thumbDiri->orientate()->widen(300);

        Storage::put($imgPathKtp, (string) $thumbKtp->encode());
        Storage::put($imgPathDiri, (string) $thumbDiri->encode());

        $file = Saksi::create([
            'id_koor' => $idKoor,
            'id_user' => $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $idKel,
            'no_tps'=> $req['noTPS'],
            'id_partai'=> $idPartai,
            'nama_saksi'=> $req['namaSaksi'],
            'alamat'=> $req['alamatSaksi'],
            'no_hp'=> $req['noHpSaksi'],
            'foto_ktp' => $imgPathKtp,
            'foto_diri' => $imgPathDiri,
        ]);

        return back()->with('success', 'Data Saksi berhasil disimpan');;
        return back()->withErrors($errorMessages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $saksi = Saksi::find($id);

      $users = Auth::user();
      $namaKab = $users->kab_kota;
      $namaKec = $users->name;
      $idUserSaksi = Saksi::where('id', $id)->value('id_user');
      
      if($idUserSaksi == $users->id) {
        $idKab = KabupatenKota::where('nama_kabupatenkota',$namaKab)->value('id');
        $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->where('id_kabupatenkota',$idKab)->value('id');
        $idKel = $saksi->id_kelurahandesa;

        $desas = Kecamatan::find($idKec)->kelurahanDesa;
        $kelNow = Saksi::find($id)->kelurahanDesa;
        $namaDesa = $saksi->kelurahanDesa->nama_kelurahandesa;

        $partais = Partai::all();
        $koors = Koor::where('id_kelurahandesa', $idKel)->get();

        return view('panel.editSaksi', compact('saksi', 'desas', 'partais','namaDesa','kelNow','namaKab','namaKec','koors'));
      }
      else {
        abort(404);
      } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSaksiRequest $request, $id)
    {
      $req = $request->all();

      $kab = Auth::user()->kab_kota;
      $kec = Auth::user()->name;

      $idUser = Auth::user()->id;
      $idKab = KabupatenKota::where('nama_kabupatenkota', $kab)->value('id');
      $idKec = Kecamatan::where('nama_kecamatan', $kec)->value('id');

      if($request->hasFile('fotoKtpSaksi') && $request->hasFile('fotoDiriSaksi')) {
        $this->validate($request, [
            'fotoKtpSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
            'fotoDiriSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotoktp = $request->file('fotoKtpSaksi');
        $upload_fotodiri = $request->file('fotoDiriSaksi');

        $imgPathKtp = $upload_fotoktp->hashName('public/ktpsaksi');
        $imgPathDiri = $upload_fotodiri->hashName('public/dirisaksi');

        $thumbKtp = Image::make($upload_fotoktp);
        $thumbDiri = Image::make($upload_fotodiri);
        $thumbKtp->orientate()->widen(400);
        $thumbDiri->orientate()->widen(300);

        Storage::put($imgPathKtp, (string) $thumbKtp->encode());
        Storage::put($imgPathDiri, (string) $thumbDiri->encode());

        $updateSaksi = [
            'id_koor' => $req['namaKoorSaksi'],
            'id_user' => $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaSaksi'],
            'no_tps'=> $req['noTPS'],
            'id_partai'=> $req['namaPartai'],
            'nama_saksi'=> $req['namaSaksi'],
            'alamat'=> $req['alamatSaksi'],
            'no_hp'=> $req['noHpSaksi'],
            'foto_ktp' => $imgPathKtp,
            'foto_diri' => $imgPathDiri,
        ];

        $saksi = Saksi::find($id);
        Storage::delete([$saksi->foto_ktp, $saksi->foto_diri]);
      }

      else if($request->hasFile('fotoKtpSaksi')) {

        $this->validate($request, [
            'fotoKtpSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotoktp = $request->file('fotoKtpSaksi');

        $imgPathKtp = $upload_fotoktp->hashName('public/ktpsaksi');

        $thumbKtp = Image::make($upload_fotoktp);
        $thumbKtp->orientate()->widen(400);

        Storage::put($imgPathKtp, (string) $thumbKtp->encode());

        $updateSaksi = [
            'id_koor' => $req['namaKoorSaksi'],
            'id_user' => $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaSaksi'],
            'no_tps'=> $req['noTPS'],
            'id_partai'=> $req['namaPartai'],
            'nama_saksi'=> $req['namaSaksi'],
            'alamat'=> $req['alamatSaksi'],
            'no_hp'=> $req['noHpSaksi'],
            'foto_ktp' => $imgPathKtp,
        ];

        $saksi = Saksi::find($id);
        Storage::delete($saksi->foto_ktp);
      }

      else if($request->hasFile('fotoDiriSaksi')) {
        $this->validate($request, [
            'fotoDiriSaksi'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotodiri = $request->file('fotoDiriSaksi');

        $imgPathDiri = $upload_fotodiri->hashName('public/dirisaksi');

        $thumbDiri = Image::make($upload_fotodiri);
        $thumbDiri->orientate()->widen(300);

        Storage::put($imgPathDiri, (string) $thumbDiri->encode());

        $updateSaksi = [
            'id_koor' => $req['namaKoorSaksi'],
            'id_user' => $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaSaksi'],
            'no_tps'=> $req['noTPS'],
            'id_partai'=> $req['namaPartai'],
            'nama_saksi'=> $req['namaSaksi'],
            'alamat'=> $req['alamatSaksi'],
            'no_hp'=> $req['noHpSaksi'],
            'foto_diri' => $imgPathDiri,
        ];

        $saksi = Saksi::find($id);
        Storage::delete($saksi->foto_diri);
      }
      else {

        $updateSaksi = [
            'id_koor' => $req['namaKoorSaksi'],
            'id_user' => $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaSaksi'],
            'no_tps'=> $req['noTPS'],
            'id_partai'=> $req['namaPartai'],
            'nama_saksi'=> $req['namaSaksi'],
            'alamat'=> $req['alamatSaksi'],
            'no_hp'=> $req['noHpSaksi'],
        ];
      }

      Saksi::find($id)->update($updateSaksi);

      return back()->with('success', 'Data Saksi berhasil diperbarui');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Auth::user()->id == Saksi::find($id)->id_user) {
        $saksi = Saksi::find($id);

        $imgPathKtp = $saksi->foto_ktp;
        $imgPathDiri = $saksi->foto_diri;
        
        if(Storage::exists($imgPathKtp)) {
            Storage::delete($imgPathKtp);
        }
        if(Storage::exists($imgPathDiri)) {
            Storage::delete($imgPathDiri);
        }
        
        $saksi->delete();

        $empty = Saksi::all();
        if($empty->isEmpty())
        {
        \DB::update("ALTER TABLE saksis AUTO_INCREMENT= 1");
        }

        return redirect()->back()->with('success', 'Data Saksi Berhasil dihapus!');
      }
      else {
        abort(404);
      }
    }


    public function formDesaKoorCreate($idDesaKoor) {

      $users = Auth::user();
      $namaKab = $users->kab_kota;
      $namaKec = $users->name;

      $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->value('id');

      $desas = Kecamatan::find($idKec)->kelurahanDesa;
      $kelNow = KelurahanDesa::find($idDesaKoor);
      if($kelNow->id_kecamatan == $idKec) {
        $namaDesa = $kelNow->nama_kelurahandesa;

        $partais = Partai::all();
        $koors = Koor::where('id_kelurahandesa', $idDesaKoor)->get();

        return view('panel.createSaksi', compact('desas', 'partais','kelNow','namaDesa','namaKab','namaKec','koors'));
      }
      else {
        abort(404);
      }
    }

    public function formDesaKoorUpdate($id, $idDesaKoor) {

      $saksi = Saksi::find($id);
      $users = Auth::user();
      $namaKab = $users->kab_kota;
      $namaKec = $users->name;

      $idKec = Kecamatan::where('nama_kecamatan',$namaKec)->value('id');

      $desas = Kecamatan::find($idKec)->kelurahanDesa;
      $kelNow = KelurahanDesa::find($idDesaKoor);
      if($kelNow->id_kecamatan == $idKec) {
        $namaDesa = $kelNow->nama_kelurahandesa;

        $partais = Partai::all();
        $koors = Koor::where('id_kelurahandesa', $idDesaKoor)->get();

        return view('panel.editSaksi', compact('saksi', 'desas', 'partais','kelNow','namaDesa','namaKab','namaKec','koors'));
      }
      else {
        abort(404);
      }
    }


    public function lihatSemua()
    {
      $saksis = Saksi::all();

      $kabs = KabupatenKota::all();

      return view('saksi.index', compact('saksis', 'kabs'));
    }

    public function lihatKabKota($id) {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $saksiKabs = Saksi::where('id_kabupatenkota', $id)->get();


        return view('saksi.indexKabKota', compact('saksiKabs', 'kabs', 'kabNow', 'kecs'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKec($id) {
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

        return view('saksi.indexKec', compact('saksiKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }

    public function lihatKelDesa($id) {
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

        return view('saksi.indexKel', compact('saksiKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function search(Request $request)
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
      return view ( 'saksi.index' , compact('saksis','kabs','count'));
    }


    public function searchKab(Request $request, $id)
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
        return view ( 'saksi.indexKabKota' , compact('saksiKabs', 'kabs', 'kabNow', 'kecs','count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKec(Request $request, $id)
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
        return view ( 'saksi.indexKec' , compact('saksiKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
      }
      else {
        abort(404);
      }
    }


    public function searchKel(Request $request, $id)
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
        return view ( 'saksi.indexKel' , compact('saksiKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow','count'));
      }
      else {
        abort(404);
      }
    }


}
