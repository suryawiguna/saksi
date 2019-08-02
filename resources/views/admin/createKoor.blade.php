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
              <a class="btn btn-block btn-input nav-link active" href="{{route('koor.create')}}">Koordinator Saksi</a>
            </li>
            <li class="nav-item nav-space">
              <a class="btn btn-block btn-input nav-link" href="{{route('saksi.create')}}">Saksi</a>
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
            <!-- KOORDINATOR SAKSI -->
            <form method="POST" action="{{route('koor.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}
              <h4 class="text-center">Input Data <strong>Koordinator Saksi</strong></h4>
              <br>
              <div class="dropdown-divider"></div>
              <br>
              <div class="form-row">
                @foreach($users as $user)
                <!-- KABUPATEN/KOTA -->
                <div class="form-group col-md-4">
                  <label for="KabKota">Kabupaten/Kota</label>
                  <h5><strong>{{$user->kab_kota}}</strong></h5>
                </div>

                <!-- KECAMATAN -->
                <div class="form-group col-md-4">
                  <label for="Kecamatan">Kecamatan</label>
                  <h5><strong>{{$user->name}}</strong></h5>
                </div>
                @endforeach

                <!-- DESA -->
                <div class="form-group col-md-4">
                  <label for="pilihDesaKoor">Pilih Kelurahan/Desa</label>
                  <select class="form-control" id="pilihDesaKoor" name="desaKoor" required>
                    @foreach($desas as $desa)
                    <option value="{{$desa->nama_kelurahandesa}}">{{$desa->nama_kelurahandesa}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <br>
              <div class="dropdown-divider"></div>
              <br>

              <div class="form-group">
                <label for="inputNamaKoor">Nama Koordinator</label>
                <input type="text" name="namaKoor" class="form-control" id="inputNamaKoor" required>
              </div>

              <div class="form-group">
                <label for="inputAlamatKoor">Alamat Tempat Tinggal</label>
                <input type="text" name="alamatKoor" class="form-control" id="inputAlamatKoor" required>
              </div>

              <div class="form-group">
                <label for="inputNoHpKoor">Nomor Handphone</label>
                <input type="text" class="form-control" name="noHpKoor" id="inputNoHpKoor" required>
              </div>

              <img src="" id="fotoKtpKoorPreview" width="200px" /><br><br>
              <div class="custom-file">
                <input id="fotoKtpKoor" type="file" class="custom-file-input" id="customFile" name='fotoKtpKoor' accept="image/*" required>
                <label class="custom-file-label" for="customFile">Pilih Foto KTP Koordinator</label>
              </div><br><br>

              <img src="" id="fotoDiriKoorPreview" width="200px" /><br><br>
              <div class="custom-file">
                <input id="fotoDiriKoor" type="file" class="custom-file-input" id="customFile" name='fotoDiriKoor' accept="image/*" required>
                <label class="custom-file-label" for="customFile">Pilih Foto Diri Koordinator</label>
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
