<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    @include('layouts.navbarHome')

    <div class="container-fluid py-5 mt-4">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center py-3">Daftar <strong>Koordinator</strong> yang Telah Tercatat</h3>

          <div class="dropdown-divider">

          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="row">
                  <div class="col-lg col-md col-sm py-2">
                    <label>Provinsi</label>
                    <h5><strong>Bali</strong></h5>
                    <a class="btn btn-secondary" href="/lihatkoor" role="button">
                      Lihat Semua
                    </a>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kabupaten/Kota</label>
                    <h5><strong>{{$kabNow->nama_kabupatenkota}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownKabKota" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kabupaten/Kota
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKabKota">
                        @foreach($kabs as $kab)
                        <a class="dropdown-item" href="/lihatkoor/kab/{{$kab->id}}">{{$kab->nama_kabupatenkota}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kecamatan</label>
                    <h5><strong>{{$kecNow->nama_kecamatan}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownKec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kecamatan
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKec">
                        @foreach($kecs as $kec)
                        <a class="dropdown-item" href="/lihatkoor/kec/{{$kec->id}}">{{$kec->nama_kecamatan}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kelurahan/Desa</label>
                    <h5><strong>{{$kelNow->nama_kelurahandesa}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownKel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kelurahan/Desa
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKel">
                        @foreach($kels as $kel)
                        <a class="dropdown-item" href="/lihatkoor/kel/{{$kel->id}}">{{$kel->nama_kelurahandesa}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="dropdown-divider">

          </div><br>
          @if (\Session::has('success'))
            <div class="alert alert-success">
              <p>{{\Session::get('success')}}</p>
            </div>
          @endif

        </div>
        <br><br>

        <div class="col">
          <div class="row">
            <div class="col-md-4">
              <form class="" action="/lihatkoor/kel/{{$kelNow->id}}/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                  <input class="form-control" name="q" type="search" placeholder="Cari TPS, Nama, Partai, Alamat, No.Hp" aria-label="Search" required>
                  <span class="input-group-btn">
                    <button class="btn btn-outline-success" type="submit"><i class="mdi mdi-magnify"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <br><br>
            <div class="col-md text-left">
              <a class="btn btn-outline-dark" href="/lihatkoor/cetak/kel/{{$kelNow->id}}" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
            </div>
          </div>
          <br>

          <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
              <thead class="thead text-light">
                <tr>
                  <th>No.</th>
                  <th scope="col">Kabupaten/Kota</th>
                  <th scope="col">Kecamatan</th>
                  <th scope="col">Kelurahan/Desa</th>
                  <th scope="col" class="w-50">Nama Koordinator</th>
                  <th scope="col" class="w-25">Alamat</th>
                  <th scope="col" class="w-25">No. Hp / WhatsApp</th>
                  <th scope="col">Foto KTP</th>
                  <th scope="col" class="w-25">Foto Diri</th>
                </tr>
              </thead>
              <tbody>

              @foreach($koorKels as $koorKel)
                <tr>
                  <td>{{(($koorKels->currentPage() - 1 ) * $koorKels->perPage() ) + $loop->iteration}}</td>
                  <td>{{$koorKel->kabupatenKota->nama_kabupatenkota}}</td>
                  <td>{{$koorKel->kecamatan->nama_kecamatan}}</td>
                  <td>{{$koorKel->kelurahanDesa->nama_kelurahandesa}}</td>
                  <td><a href="/profilkoor/{{$koorKel->id}}" class="text-dark">{{$koorKel->nama_koor}}</a></td>
                  <td>{{$koorKel->alamat}}</td>
                  <td>{{$koorKel->no_hp}}</td>
                  <td><a href="{{\Storage::url($koorKel->foto_ktp)}}"><img src="{{\Storage::url($koorKel->foto_ktp)}}" class="img-fluid"></a></td>
                  <td><a href="{{\Storage::url($koorKel->foto_diri)}}"><img src="{{\Storage::url($koorKel->foto_diri)}}" class="img-fluid"></a></td>
                </tr>

              @endforeach

              </tbody>
            </table>

          </div>
          <br>
          <p>Total Data : <strong>{{$count}}</strong></p>
          {{ $koorKels->links() }}
        </div>
      </div>
    </div>
    @include('layouts.script')
  </body>

  @include('layouts.footer')
</html>
