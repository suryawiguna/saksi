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
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownKabKota" data-toggle="dropdown">
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

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="dropdown-divider">

          </div><br>
        </div>
      </div>

      <div class="col">
        <div class="row">
          <div class="col-md-4">
            <form class="" action="/lihatkoor/kab/{{$kabNow->id}}/search" method="POST" role="search">
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
            <a class="btn btn-outline-dark" href="/lihatkoor/cetak/kab/{{$kabNow->id}}" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
          </div>
        </div>
        <br>

        <div class="row">
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
                  <th scope="col">Foto Diri</th>
                </tr>
              </thead>
              <tbody>

              @foreach($koorKabs as $koorKab)
                <tr>
                  <td>{{(($koorKabs->currentPage() - 1 ) * $koorKabs->perPage() ) + $loop->iteration}}</td>
                  <td>{{$koorKab->kabupatenKota->nama_kabupatenkota}}</td>
                  <td>{{$koorKab->kecamatan->nama_kecamatan}}</td>
                  <td>{{$koorKab->kelurahanDesa->nama_kelurahandesa}}</td>
                  <td><a href="/profilkoor/{{$koorKab->id}}" class="text-dark">{{$koorKab->nama_koor}}</a></td>
                  <td>{{$koorKab->alamat}}</td>
                  <td>{{$koorKab->no_hp}}</td>
                  <td><a href="{{\Storage::url($koorKab->foto_ktp)}}"><img src="{{\Storage::url($koorKab->foto_ktp)}}" class="img-fluid"></a></td>
                  <td><a href="{{\Storage::url($koorKab->foto_diri)}}"><img src="{{\Storage::url($koorKab->foto_diri)}}" class="img-fluid"></a></td>
                </tr>

              @endforeach

              </tbody>
            </table>

          </div>
        </div>
        <br>
      </div>
      <p>Total Data : <strong>{{$count}}</strong></p>
      {{ $koorKabs->links() }}
    </div>
    @include('layouts.script')
  </body>

  @include('layouts.footer')
</html>
