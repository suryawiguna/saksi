<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    @include('layouts.navbarHome')

    <div class="container-fluid py-5 mt-4">
      <div class="row">
        <div class="col-12">
          <h3 class="text-center py-3">Daftar <strong>Saksi</strong> yang Telah Tercatat</h3>
          <div class="dropdown-divider"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="row">
                  <div class="col-lg col-md col-sm py-2">
                    <label>Provinsi</label>
                    <h5><strong>Bali</strong></h5>
                    <a class="btn btn-secondary" href="/" role="button">
                      Lihat Semua
                    </a>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kabupaten/Kota</label>
                    <div class="dropdown">
                      <button class="btn btn-info dropdown-toggle" type="button" id="dropdownKabKota" data-toggle="dropdown">
                        Pilih Kabupaten/Kota
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKabKota">
                        @foreach($kabs as $kab)
                        <a class="dropdown-item" href="kab/{{$kab->id}}">{{$kab->nama_kabupatenkota}}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-lg col-md col-sm py-2">

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

          <div class="col">
            <div class="row">
              <div class="col-md-4">
                <form class="" action="/search" method="POST" role="search">
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
                <a class="btn btn-outline-dark" href="/cetak/provinsi" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col">
                <div class="table-responsive">
                  <table id="example" class="table table-stripped table-bordered table-hover">
                    <thead class="thead text-light">
                      <tr>
                        <th>No.</th>
                        <th scope="col">Kabupaten/Kota</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Kelurahan/Desa</th>
                        <th scope="col" class="w-25">No. TPS</th>
                        <th scope="col" class="w-25">Nama Koordinator</th>
                        <th scope="col">Partai</th>
                        <th scope="col" class="w-25">Nama Saksi</th>
                        <th scope="col" class="w-25">Alamat</th>
                        <th scope="col">No. Hp / WhatsApp</th>
                        <th scope="col">Foto KTP</th>
                        <th scope="col">Foto Diri</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($saksis as $x=>$saksi)
                      <tr>
                        <td>{{$x+1}}</td>
                        <td>{{$saksi->kabupatenKota->nama_kabupatenkota}}</td>
                        <td>{{$saksi->kecamatan->nama_kecamatan}}</td>
                        <td>{{$saksi->kelurahanDesa->nama_kelurahandesa}}</td>
                        <td>{{$saksi->no_tps}}</td>
                        <td><a href="/profilkoor/{{$saksi->id_koor}}" class="text-dark">{{$saksi->koor->nama_koor}}</a></td>
                        <td>{{$saksi->partai->nama_partai}}</td>
                        <td>{{$saksi->nama_saksi}}</td>
                        <td>{{$saksi->alamat}}</td>
                        <td>{{$saksi->no_hp}}</td>
                        <td><a href="{{\Storage::url($saksi->foto_ktp)}}"><img src="{{\Storage::url($saksi->foto_ktp)}}" class="img-fluid"></a></td>
                        <td><a href="{{\Storage::url($saksi->foto_diri)}}"><img src="{{\Storage::url($saksi->foto_diri)}}" class="img-fluid"></a></td>

                      </tr>

                    @endforeach

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
            <br>

          </div>
        </div>
      </div>
    </div>
    @include('layouts.script')
    <script>
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    lengthChange: false,
                    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
                } );
            
                table.buttons().container()
                    .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
            } );
        </script>
  </body>

  @include('layouts.footer')
</html>
