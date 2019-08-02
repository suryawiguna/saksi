<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Saksi;
use App\Koor;
use App\KabupatenKota;
use App\Kecamatan;
use App\KelurahanDesa;
use App\User;

class ConvertPdfController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function pdfview() {
    $users = User::all()->get();
        view()->share('users',$users);

        if($request->has('download')) {
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('userlist.pdf');
        }
        return view('pdfview');
  }

  public function cetakAll(Request $request)
  {
    if ($request->is('lihatkoor/*'))
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
      if ($request->is('lihatkoor/*'))
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
      if ($request->is('lihatkoor/*'))
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
      if ($request->is('lihatkoor/*'))
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

  public function cetakKecSaya(Request $request) {
    $users = Auth::user();

    $namaKab = $users->kab_kota;
    $namaKec = $users->name;
    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');

    if($request->is('koorsaya/*')) {
      $koorKecs = Koor::where('id_kecamatan', $idKec)->get();

      $pdf = PDF::loadview('pdf.koorsaya.kecamatan', compact('koorKecs','namaKab','namaKec'))->setPaper('a4','portait');

      return $pdf->download('koorSaksiKecamatan-'.$namaKec.'-'.$namaKab.'.pdf');
    }

    else {
      $saksiKecs = Saksi::where('id_kecamatan',$idKec)->get();

      $pdf = PDF::loadview('pdf.saksisaya.kecamatan', compact('saksiKecs','namaKab','namaKec'))->setPaper('a4','portait');

      return $pdf->download('saksiKecamatan-'.$namaKec.'-'.$namaKab.'.pdf');
    }
  }

  public function cetakKelSaya(Request $request, $id) {
    $users = Auth::user();

    $namaKab = $users->kab_kota;
    $namaKec = $users->name;
    $idKec = Kecamatan::where('nama_kecamatan', $namaKec)->value('id');

    $kelNow = KelurahanDesa::find($id);
    $idKels = Kecamatan::find($idKec)->kelurahanDesa->pluck('id')->toArray();

    if(in_array($id, $idKels)) {
      if($request->is('koorsaya/*')) {
        $koorKels = Koor::where('id_kelurahandesa', $id)->get();

        $pdf = PDF::loadview('pdf.koorsaya.kelurahan', compact('koorKels','namaKab','namaKec','kelNow'))->setPaper('a4','portait');

        return $pdf->download('koorSaksiKelurahanDesa-'.$kelNow->nama_kelurahandesa.'-'.$namaKec.'-'.$namaKab.'.pdf');
      }

      else {
        $saksiKels = Saksi::where('id_kelurahandesa', $id)->get();

        $pdf = PDF::loadview('pdf.saksisaya.kelurahan', compact('saksiKels','namaKab','namaKec','kelNow'))->setPaper('a4','portait');

        return $pdf->download('saksiKelurahanDesa-'.$kelNow->nama_kelurahandesa.'-'.$namaKec.'-'.$namaKab.'.pdf');
      }
    }
    else {
      abort(404);
    }
  }
}
