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
              <div class="col-lg-10 col-md-12 col-sm-12 mx-auto">
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

                  </div>
                  <div class="col py-2">

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

          <div class="col">
            <div class="row">
              <div class="col-md-4">
                <form class="" action="/admin/search" method="POST" role="search">
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
                <a class="btn btn-outline-dark" href="/admin/cetak/provinsi" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
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
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                <?php $no = 0;?>
                @foreach($saksis as $saksi)
                <?php $no++ ;?>
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$saksi->kab_kota}}</td>
                    <td>{{$saksi->kecamatan}}</td>
                    <td>{{$saksi->desa}}</td>
                    <td>{{$saksi->no_tps}}</td>
                    <td><a href="/profilkoor/{{$saksi->kab_kota}}/{{$saksi->kecamatan}}/{{$saksi->desa}}/{{$saksi->nama_koor}}" class="text-dark">{{$saksi->nama_koor}}</a></td>
                    <td>{{$saksi->partai}}</td>
                    <td>{{$saksi->nama_saksi}}</td>
                    <td>{{$saksi->alamat}}</td>
                    <td>{{$saksi->no_hp}}</td>
                    <td><a href="{{\Storage::url($saksi->foto_ktp)}}"><img src="{{\Storage::url($saksi->foto_ktp)}}" class="img-fluid"></a></td>
                    <td><a href="{{\Storage::url($saksi->foto_diri)}}"><img src="{{\Storage::url($saksi->foto_diri)}}" class="img-fluid"></a></td>
                    <td class="text-center">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus">
                        Hapus
                      </button>
                    </td>
                  </tr>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Hapus Data Saksi ini?
                        </div>
                        <div class="modal-footer">
                          <form action="{{action('SaksiController@destroy', $saksi->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                    </div>
                  </div>

                @endforeach

                </tbody>
              </table>

            </div>
            <br>
            {{ $saksis->links() }}
          </div>

          <br><br>
        </div>
      </div>
    </div>
    <br>
    @include('layouts.script')
  </body>

  @include('layouts.footer')
</html>
