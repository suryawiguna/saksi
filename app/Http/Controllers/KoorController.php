<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateKoorRequest;
use App\Saksi;
use App\Koor;
use App\KabupatenKota;
use App\Kecamatan;
use App\KelurahanDesa;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $users = User::all()->where('id', Auth::id());
      $namaKec = Auth::user()->name;
      $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');
      $desas = Kecamatan::find($idKec)->kelurahanDesa;

      return view('panel.createKoor', compact('users', 'desas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateKoorRequest $request)
    {
      $req = $request->all();

      $kab = Auth::user()->kab_kota;
      $kec = Auth::user()->name;

      $idUser = Auth::user()->id;
      $idKab = KabupatenKota::where('nama_kabupatenkota', $kab)->value('id');
      $idKec = Kecamatan::where('nama_kecamatan', $kec)->value('id');
      $idKel = $req['desaKoor'];

      $namaKoor = $req['namaKoor'];
      $alamatKoor = $req['alamatKoor'];
      $noHpKoor = $req['noHpKoor'];
      
      $koorExist = Koor::where(function ($query) use ($idKab, $idKec, $idKel){
        $query->where('id_kabupatenkota', $idKab)
        ->where('id_kecamatan', $idKec)
        ->where('id_kelurahandesa', $idKel);
      })
      ->where(function ($query) use ($namaKoor, $alamatKoor, $noHpKoor){
        $query->where ( 'nama_koor', $namaKoor )
        ->where ( 'alamat', $alamatKoor )
        ->where ( 'no_hp', $noHpKoor );
      })
      ->exists();

      if($koorExist) {
        return redirect()->back()->withErrors(['Data Koordinator sudah ada']);
      }

      $this->validate($request, [
          'fotoKtpKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
          'fotoDiriKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
      ]);

      $upload_fotoktp = $request->file('fotoKtpKoor');
      $upload_fotodiri = $request->file('fotoDiriKoor');

      $imgPathKtp = $upload_fotoktp->hashName('public/ktpkoor');
      $imgPathDiri = $upload_fotodiri->hashName('public/dirikoor');

      $thumbKtp = Image::make($upload_fotoktp);
      $thumbDiri = Image::make($upload_fotodiri);
      $thumbKtp->orientate()->widen(400);
      $thumbDiri->orientate()->widen(300);

      Storage::put($imgPathKtp, (string) $thumbKtp->encode());
      Storage::put($imgPathDiri, (string) $thumbDiri->encode());

      $file = Koor::create([
          'id_user'=>$idUser,
          'id_kabupatenkota'=> $idKab,
          'id_kecamatan'=> $idKec,
          'id_kelurahandesa'=> $idKel,
          'nama_koor'=> $req['namaKoor'],
          'alamat'=> $req['alamatKoor'],
          'no_hp'=> $req['noHpKoor'],
          'foto_ktp' => $imgPathKtp,
          'foto_diri' => $imgPathDiri,
      ]);

      return back()->with('success', 'Data Koordinator Saksi berhasil disimpan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users = Auth::user();
      $namaKab = $users->kab_kota;
      $namaKec = $users->name;
      $idUserKoor = Koor::find($id)->user->id;

      if($idUserKoor == $users->id){
        $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');

        $koor = Koor::find($id);

        $desas = Kecamatan::find($idKec)->kelurahanDesa;
        return view('panel.editKoor', compact('namaKab','namaKec','koor','desas'));
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
    public function update(ValidateKoorRequest $request, $id)
    {
      $req = $request->all();

      $kab = Auth::user()->kab_kota;
      $kec = Auth::user()->name;
      
      $idUser = Auth::user()->id;
      $idKab = KabupatenKota::where('nama_kabupatenkota', $kab)->value('id');
      $idKec = Kecamatan::where('nama_kecamatan', $kec)->value('id');

      $namaKoor = $req['namaKoor'];
      $alamatKoor = $req['alamatKoor'];
      $noHpKoor = $req['noHpKoor'];

      if($request->hasFile('fotoKtpKoor') && $request->hasFile('fotoDiriKoor')) {

        $this->validate($request, [
            'fotoKtpKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
            'fotoDiriKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotoktp = $request->file('fotoKtpKoor');
        $upload_fotodiri = $request->file('fotoDiriKoor');

        $imgPathKtp = $upload_fotoktp->hashName('public/ktpkoor');
        $imgPathDiri = $upload_fotodiri->hashName('public/dirikoor');

        $thumbKtp = Image::make($upload_fotoktp);
        $thumbDiri = Image::make($upload_fotodiri);
        $thumbKtp->orientate()->widen(400);
        $thumbDiri->orientate()->widen(300);

        Storage::put($imgPathKtp, (string) $thumbKtp->encode());
        Storage::put($imgPathDiri, (string) $thumbDiri->encode());

        $updateKoor = [
            'id_user'=> $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaKoor'],
            'nama_koor'=> $req['namaKoor'],
            'alamat'=> $req['alamatKoor'],
            'no_hp'=> $req['noHpKoor'],
            'foto_ktp' => $imgPathKtp,
            'foto_diri' => $imgPathDiri,
        ];

        $koor = Koor::find($id);
        Storage::delete([$koor->foto_ktp, $koor->foto_diri]);
      }

      else if($request->hasFile('fotoKtpKoor')) {

        $this->validate($request, [
            'fotoKtpKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $upload_fotoktp = $request->file('fotoKtpKoor');

        $imgPathKtp = $upload_fotoktp->hashName('public/ktpkoor');

        $thumbKtp = Image::make($upload_fotoktp);
        $thumbKtp->orientate()->widen(400);

        Storage::put($imgPathKtp, (string) $thumbKtp->encode());

        $updateKoor = [
            'id_user'=> $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaKoor'],
            'nama_koor'=> $req['namaKoor'],
            'alamat'=> $req['alamatKoor'],
            'no_hp'=> $req['noHpKoor'],
            'foto_ktp' => $imgPathKtp,
        ];

        $koor = Koor::find($id);
        Storage::delete($koor->foto_ktp);
      }

      else if($request->hasFile('fotoDiriKoor')) {

        $this->validate($request, [
            'fotoDiriKoor'=> 'required|file|mimes:jpeg,jpg,bmp,png|max:5000'
        ]);

        $upload_fotodiri = $request->file('fotoDiriKoor');

        $imgPathDiri = $upload_fotodiri->hashName('public/dirikoor');

        $thumbDiri = Image::make($upload_fotodiri);
        $thumbDiri->orientate()->widen(300);

        Storage::put($imgPathDiri, (string) $thumbDiri->encode());

        $updateKoor = [
            'id_user'=> $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaKoor'],
            'nama_koor'=> $req['namaKoor'],
            'alamat'=> $req['alamatKoor'],
            'no_hp'=> $req['noHpKoor'],
            'foto_diri' => $imgPathDiri,
        ];

        $koor = Koor::find($id);
        Storage::delete($koor->foto_diri);
      }

      else {
        $updateKoor = [
            'id_user'=> $idUser,
            'id_kabupatenkota'=> $idKab,
            'id_kecamatan'=> $idKec,
            'id_kelurahandesa'=> $req['desaKoor'],
            'nama_koor'=> $req['namaKoor'],
            'alamat'=> $req['alamatKoor'],
            'no_hp'=> $req['noHpKoor'],
        ];
      }

      Koor::find($id)->update($updateKoor);

      return redirect()->back()->with('success', 'Data Koordinator Saksi berhasil diperbarui');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Auth::user()->id == Koor::find($id)->id_user) {
        $saksiKoor = Koor::find($id)->saksi()->exists();

        if($saksiKoor) {
          return redirect()->back()->withErrors(['Koordinator tidak bisa dihapus karena memiliki saksi!']);
        }

        else {
          $koor = Koor::find($id);
          $imgPathKtp = $koor->foto_ktp;
          $imgPathDiri = $koor->foto_diri;
          
          if(Storage::exists($imgPathKtp)) {
              Storage::delete($imgPathKtp);
          }
          if(Storage::exists($imgPathDiri)) {
              Storage::delete($imgPathDiri);
          }
          $koor->delete();

          $empty = Koor::all();
          if($empty->isEmpty())
          {
          \DB::update("ALTER TABLE koors AUTO_INCREMENT= 1");
          }

          return redirect()->back()->with('success', 'Data Koordinator Saksi Berhasil dihapus!');
        }
      }
      else {
        abort(404);
      }
    }

    public function lihatSemua()
    {
      $koors = Koor::all();
    

      $kabs = KabupatenKota::all();

      return view('koor.index', compact('koors', 'kabs'));
    }


    public function lihatKabKota($id) {
      if($id <= 9) {
        $kabNow = KabupatenKota::find($id);

        $kabs = KabupatenKota::all();
        $kecs = KabupatenKota::find($id)->kecamatan;

        $allKab = Koor::where('id_kabupatenkota', $id)->orderBy('created_at','DESC');
        $count = $allKab->count();
        $koorKabs = $allKab->simplePaginate(20);

        return view('koor.indexKabKota', compact('koorKabs', 'kabNow', 'kabs', 'kecs','count'));
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

        $allKec = Koor::where('id_kecamatan',$id)->orderBy('created_at','DESC');
        $count = $allKec->count();
        $koorKecs = $allKec->simplePaginate(20);

        return view('koor.indexKec', compact('koorKecs', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'count'));
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

        $allKel = Koor::where('id_kelurahandesa', $id)->orderBy('created_at','DESC');
        $count = $allKel->count();
        $koorKels = $allKel->simplePaginate(20);

        return view('koor.indexKel', compact('koorKels','kabs','kecs','kels','kabNow','kecNow','kelNow','count'));
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
        $all = Koor::where ( 'nama_koor', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'alamat', 'LIKE', '%' . $q . '%' )
        ->orWhere ( 'no_hp', 'LIKE', '%' . $q . '%' );
        $count = $all->count();
        $koors = $all->simplePaginate (20);
        $koors->appends($request->only('q'));
      }
      return view ( 'koor.index' , compact('koors','kabs','count'));
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
        return view ( 'koor.indexKabKota' , compact('koorKabs', 'kabs', 'kecs', 'kabNow', 'count'));
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
        return view ( 'koor.indexKec' , compact('koorKecs','kabs','kecs','kels','kabNow','kecNow','count'));
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
        return view ( 'koor.indexKel' , compact('koorKels', 'kabs', 'kecs', 'kels', 'kabNow', 'kecNow', 'kelNow', 'count'));
      }
      else {
        abort(404);
      }
    }


}
