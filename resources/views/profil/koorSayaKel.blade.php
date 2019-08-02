<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    @include('layouts.navbarHome')

    <div class="container-fluid py-5 mt-4">
      <div class="row">
        <div class="col-12">
        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{\Session::get('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{$errors->first()}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <h3 class="text-center py-3">Daftar <strong>Koordinator</strong> Saya</h3>

          <div class="dropdown-divider">

          </div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-10 col-md-12 col-sm-6 mx-auto">
                <div class="row">
                  <div class="col-lg col-md col-sm py-2">
                    <label>Provinsi</label>
                    <h5><strong>Bali</strong></h5>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kabupaten/Kota</label>
                    <h5><strong>{{Auth::user()->kab_kota}}</strong></h5>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kecamatan</label>
                    <h5><strong>{{Auth::user()->name}}</strong></h5>
                    <a class="btn btn-secondary" href="/koorsaya" role="button">
                      Lihat Semua
                    </a>
                  </div>
                  <div class="col-lg col-md col-sm py-2">
                    <label>Kelurahan/Desa</label>
                    <h5><strong>{{$kelNow->nama_kelurahandesa}}</strong></h5>
                    <div class="dropdown">
                      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownKec" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pilih Kelurahan/Desa
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownKec">
                        @foreach($kels as $kel)
                        <a class="dropdown-item" href="/koorsaya/kel/{{$kel->id}}">{{$kel->nama_kelurahandesa}}</a>
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
          

        </div>
        <br><br>

        <div class="col">
          <div class="row">
            <div class="col-md-4">
              <form class="" action="/koorsaya/kel/{{$kelNow->id}}/search" method="POST" role="search">
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
              <a class="btn btn-outline-dark" href="/koorsaya/cetak/kel/{{$kelNow->id}}" role="button"><i class="mdi mdi-printer"></i> Cetak</a>
            </div>
          </div>
          <br>

          <div class="table-responsive">
            <table class="table table-stripped table-bordered table-hover">
              <thead class="thead text-light">
                <tr>
                  <th>No.</th>
                  <th scope="col" class="w-25">Kelurahan/Desa</th>
                  <th scope="col" class="w-25">Nama Koordinator</th>
                  <th scope="col" class="w-25">Alamat</th>
                  <th scope="col">No. Hp / WhatsApp</th>
                  <th scope="col">Foto KTP</th>
                  <th scope="col">Foto Diri</th>
                  <th scope="col" class="w-25">Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach($koorKels as $koorKel)
                <tr>
                  <td>{{(($koorKels->currentPage() - 1 ) * $koorKels->perPage() ) + $loop->iteration}}</td>
                  <td>{{$koorKel->kelurahanDesa->nama_kelurahandesa}}</td>
                  <td><a href="/profilkoor/{{$koorKel->id}}" class="text-dark">{{$koorKel->nama_koor}}</a></td>
                  <td>{{$koorKel->alamat}}</td>
                  <td>{{$koorKel->no_hp}}</td>
                  <td><a href="{{\Storage::url($koorKel->foto_ktp)}}"><img src="{{\Storage::url($koorKel->foto_ktp)}}" class="img-fluid"></a></td>
                  <td><a href="{{\Storage::url($koorKel->foto_diri)}}"><img src="{{\Storage::url($koorKel->foto_diri)}}" class="img-fluid"></a></td>
                  <td class="text-center">
                    <a href="{{action('KoorController@edit', $koorKel->id)}}" class="btn btn-success">
                      Edit
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$koorKel->id}}">
                      Hapus
                    </button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          @foreach($koorKels as $koorKel)
          <!-- Modal Hapus -->
            <div class="modal fade" id="modalHapus{{$koorKel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Hapus Data Koordinator Saksi ini?
                  </div>
                  <div class="modal-footer">
                    <form action="{{action('KoorController@destroy', $koorKel->id)}}" method="post">
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
