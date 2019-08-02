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

            <!-- SAKSI -->
            <form method="POST" action="{{route('saksi.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}
              <h3 class="text-center">Input Data <strong>Saksi</strong></h3>
              <br>
              <div class="dropdown-divider"></div>
              <br>
              <div class="form-row">

                <!-- KABUPATEN/KOTA -->
                <div class="form-group col-md">
                  <label for="KabKota">Kabupaten/Kota</label>
                  <h5><strong>{{$namaKab}}</strong></h5>
                </div>

                <!-- KECAMATAN -->
                <div class="form-group col-md">
                  <label for="Kecamatan">Kecamatan</label>
                  <h5><strong>{{$namaKec}}</strong></h5>
                </div>


                <!-- DESA -->
                <div class="form-group col-md">
                  <label for="pilihDesaSaksi">Kelurahan/Desa</label>
                  <h5><strong>{{$namaDesa}}</strong></h5>
                  <input type="hidden" name="desaSaksi" value="{{$kelNow->id}}">
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
                    <option value="{{$koor->id}}">{{$koor->nama_koor}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md">
                  <label for="pilihPartai">Partai</label>
                  <select class="form-control" id="pilihPartai" name="namaPartai" required>
                    @foreach($partais as $partai)
                    <option value="{{$partai->id}}">{{$partai->nama_partai}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-md-2">
                  <label for="pilihNoTPS">Nomor TPS</label>
                  <select class="form-control" id="pilihNoTPS" name="noTPS" required>
                    @for ($i = 1; $i <= 50; $i++)
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
                <label for="inputNoHpSaksi">Nomor Handphone / WhatsApp</label>
                <input type="tel" class="form-control" name="noHpSaksi" id="inputNoHpSaksi" required>
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
