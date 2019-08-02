<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>
    <div class="container-fluid">

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-md fixed-top">
        <a href="/" class="btn text-center text-light nav-space" role="button" aria-pressed="true"><i class="mdi mdi-arrow-left"></i> Ke Beranda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="mdi mdi-menu text-light"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class=" nav nav-pills navbar-nav">
            <li class="nav-item active nav-space">
              <a class="btn btn-block btn-input nav-link" href="{{route('koor.create')}}">Koordinator Saksi</a>
            </li>
            <li class="nav-item nav-space">
              <a class="btn btn-block btn-input nav-link active" href="{{route('saksi.create')}}">Saksi</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>


    <div class="container py-5 mt-4">
      <div class="row">

        <div class="col">

          <br>
          @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{\Session::get('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <br>
            <!-- SAKSI -->
            <form method="POST" action="{{route('saksi.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}
              <h4 class="text-center">Input Data <strong>Saksi</strong></h4>
              <br>
              <div class="dropdown-divider"></div>
              <br>
              <div class="form-row">
                @foreach($users as $user)
                <!-- KABUPATEN/KOTA -->
                <div class="form-group col-md">
                  <label for="KabKota">Kabupaten/Kota</label>
                  <h5><strong>{{$user->kab_kota}}</strong></h5>
                </div>

                <!-- KECAMATAN -->
                <div class="form-group col-md">
                  <label for="Kecamatan">Kecamatan</label>
                  <h5><strong>{{$user->name}}</strong></h5>
                </div>
                @endforeach

                <!-- DESA -->
                <div class="form-group col-md">
                  <label for="pilihDesaSaksi">Kelurahan/Desa</label>
                  <h5><strong>{{$namaDesa}}</strong></h5>
                  <input type="hidden" name="desaSaksi" value="{{$namaDesa}}">
                  <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownDesaSaksi" data-toggle="dropdown">
                      Pilih Kelurahan/Desa
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownDesaKoor">
                      @foreach($desas as $desa)
                      <a class="dropdown-item" href="/saksi/create/kel/{{$desa->id}}">{{$desa->nama_kelurahandesa}}</a>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="pilihKoor">Pilih Koordinator</label>
                  <select class="form-control" id="pilihKoor" name="namaKoorSaksi" required>
                    @foreach($koors as $koor)
                    <option value="{{$koor->nama_koor}}">{{$koor->nama_koor}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md">
                  <label for="pilihPartai">Partai</label>
                  <select class="form-control" id="pilihPartai" name="namaPartai" required>
                    @foreach($partais as $partai)
                    <option value="{{$partai->nama_partai}}">{{$partai->nama_partai}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label for="pilihNoTPS">Nomor TPS</label>
                  <select class="form-control" id="pilihNoTPS" name="noTPS" required>
                    @for ($i = 1; $i <= 20; $i++)
                      <option value="TPS-{{ $i }}">TPS-{{ $i }}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <br>
              <div class="dropdown-divider"></div>
              <br>

              <div class="form-group">
                <label for="inputNamaSaksi">Nama Saksi</label>
                <input type="text" name="namaSaksi" class="form-control" id="inputNamaSaksi" required>
              </div>

              <div class="form-group">
                <label for="inputAlamatSaksi">Alamat Tempat Tinggal</label>
                <input type="text" name="alamatSaksi" class="form-control" id="inputAlamatSaksi" required>
              </div>

              <div class="form-group">
                <label for="inputNoHpSaksi">Nomor Handphone</label>
                <input type="text" class="form-control" name="noHpSaksi" id="inputNoHpSaksi" required>
              </div>

              <img src="" id="fotoKtpSaksiPreview" width="200px" /><br><br>
              <div class="custom-file">
                <input id="fotoKtpSaksi" type="file" class="custom-file-input" id="customFile" name='fotoKtpSaksi' accept="image/*" required>
                <label class="custom-file-label" for="customFile">Pilih Foto KTP Saksi</label>
              </div><br><br>

              <img src="" id="fotoDiriSaksiPreview" width="200px" /><br><br>
              <div class="custom-file">
                <input id="fotoDiriSaksi" type="file" class="custom-file-input" id="customFile" name='fotoDiriSaksi' accept="image/*" required>
                <label class="custom-file-label" for="customFile">Pilih Foto Diri Saksi</label>
              </div>

              <br><br><br>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
            </form>

            </div>
          </div>


          <br>
        </div>

      </div>
    </div>
    @include('layouts.script')
  </body>
  @include('layouts.footer')
</html>
