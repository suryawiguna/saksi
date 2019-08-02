<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>
    @include('layouts.navbarHome')

    <div class="container py-5 mt-4">
      <div class="row">

        <div class="col">

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
          <br>

            <!-- KOORDINATOR SAKSI -->
            <form method="POST" action="{{route('koor.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}
              <h3 class="text-center">Input Data <strong>Koordinator Saksi</strong></h3>
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
                    <option value="{{$desa->id}}">{{$desa->nama_kelurahandesa}}</option>
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
                <label for="inputNoHpKoor">Nomor Handphone / WhatsApp</label>
                <input type="tel" class="form-control" name="noHpKoor" id="inputNoHpKoor" required>
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
