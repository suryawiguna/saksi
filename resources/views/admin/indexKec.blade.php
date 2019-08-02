<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    @include('layouts.navbarHomeAdmin')

    <div class="container-fluid py-5 mt-4">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center py-3">Daftar Saksi yang Telah Tercatat</h3>

          <div class="dropdown-divider">

          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-10 col-md-12 col-sm-6 mx-auto">
                <div class="row">
                  <div class="col py-2">
                    <label>Provinsi</label>
                    <h5><strong>Bali</strong></h5>
                    <a class="btn btn-secondary" href="/admin" role="button">
                      Lihat Semua
                    </a>
                  </div>
                  <div class="col py-2">
                    <label>Kabupaten/Kota</label>
                    <h5><strong>{{$namaKab}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownKabKota" data-toggle="dropdown">
                        Pilih Kabupaten/Kota
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKabKota">
                        @foreach($kabs as $kab)
                        <a class="dropdown-item" href="/admin/kab/{{$kab->id}}">{{$kab->nama_kabupatenkota}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col py-2">
                    <label>Kecamatan</label>
                    <h5><strong>{{$namaKec}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownKec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kecamatan
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKec">
                        @foreach($kecs as $kec)
                        <a class="dropdown-item" href="/admin/kab/{{$idKab}}/kec/{{$kec->id}}">{{$kec->nama_kecamatan}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col py-2">
                    <label>Kelurahan/Desa</label>
                    <div class="dropdown">
                      <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownKec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kelurahan/Desa
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKec">
                        @foreach($kels as $kel)
                        <a class="dropdown-item" href="/admin/kab/{{$idKab}}/kec/{{$idKec}}/kel/{{$kel->id}}">{{$kel->nama_kelurahandesa}}</a>
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
              <form class="" action="/admin/kab/{{$idKab}}/kec/{{$idKec}}/search" method="POST" role="search">
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
              <a class="btn btn-outline-dark" href="/admin/cetak/kab/{{$idKab}}/kec/{{$idKec}}" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
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
                  <th scope="col">No. TPS</th>
                  <th scope="col" class="w-25">Nama Koordinator</th>
                  <th scope="col" class="w-25">Partai</th>
                  <th scope="col" class="w-25">Nama Saksi</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No. Hp</th>
                  <th scope="col">Foto KTP</th>
                  <th scope="col" class="w-25">Foto Diri</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0;?>
              @foreach($saksiKecs as $saksiKec)
              <?php $no++ ;?>
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$saksiKec->kab_kota}}</td>
                  <td>{{$saksiKec->kecamatan}}</td>
                  <td>{{$saksiKec->desa}}</td>
                  <td>{{$saksiKec->no_tps}}</td>
                  <td><a href="/profilkoor/{{$saksiKec->kab_kota}}/{{$saksiKec->kecamatan}}/{{$saksiKec->desa}}/{{$saksiKec->nama_koor}}" class="text-dark">{{$saksiKec->nama_koor}}</a></td>
                  <td>{{$saksiKec->partai}}</td>
                  <td>{{$saksiKec->nama_saksi}}</td>
                  <td>{{$saksiKec->alamat}}</td>
                  <td>{{$saksiKec->no_hp}}</td>
                  <td><a href="{{\Storage::url($saksiKec->foto_ktp)}}"><img src="{{\Storage::url($saksiKec->foto_ktp)}}" class="img-fluid"></a></td>
                  <td><a href="{{\Storage::url($saksiKec->foto_diri)}}"><img src="{{\Storage::url($saksiKec->foto_diri)}}" class="img-fluid"></a></td>
                </tr>


              @endforeach

              </tbody>
            </table>
          </div>
          <br>
          {{ $saksiKecs->links() }}
        </div>
      </div>
    </div>
    <br>
    @include('layouts.script')
  </body>

  @include('layouts.footer')
</html>
