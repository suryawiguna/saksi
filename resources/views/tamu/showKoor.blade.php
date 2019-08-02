<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>
    @include('layouts.navbarHome')


    <div class="container py-5 mt-5">
      <div class="row">

        <div class="col-md-10 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Profil Koordinator Saksi</h4>
            </div>

            <div class="card-body">
              <div class="row justify-content-center">
                @foreach($koors as $koor)
                <div class="col-lg-4 col-md-6 py-3">
                  <a href="{{\Storage::url($koor->foto_diri)}}"><img src="{{\Storage::url($koor->foto_diri)}}" class="img-fluid" alt=""></a>
                </div>

                <div class="col-lg-5 col-md-6 py-3">
                    <label>Nama Koordinator :</label>
                    <h5><strong>{{$koor->nama_koor}}</strong></h5><br>
                    <label>Alamat :</label>
                    <h5><strong>{{$koor->alamat}}</strong></h5><br>
                    <label>No.Handphone / WhatsApp :</label>
                    <h5><strong>{{$koor->no_hp}}</strong></h5><br>
                    <label>Foto KTP</label><br>
                    <a href="{{\Storage::url($koor->foto_ktp)}}"><img src="{{\Storage::url($koor->foto_ktp)}}" class="img-fluid" width="200px" alt=""></a>
                  </ul>
                </div>

              </div>
              <br>
              <div class="dropdown-divider">

              </div><br>

              <div class="row justify-content-center">
                <div class="col">
                  <h4 class="text-center">Daftar Saksi</h4><br>

                  <div class="row">
                    <div class="col-md-4">
                      <label>Kabupaten/Kota : </label>
                      <h5><strong>{{$koor->kabupatenKota->nama_kabupatenkota}}</strong></h5>
                    </div>
                    <div class="col-md-4">
                      <label>Kecamatan : </label>
                      <h5><strong>{{$koor->kecamatan->nama_kecamatan}}</strong></h5>
                    </div>
                    <div class="col-md-4">
                      <label>Kelurahan/Desa : </label>
                      <h5><strong>{{$koor->kelurahanDesa->nama_kelurahandesa}}</strong></h5>
                    </div>
                  </div>
                  @endforeach
                  <br>
                  <table id="myTable" class="table table-responsive table-stripped table-bordered table-hover">
                    <thead class="thead text-light">
                      <tr>
                        <th>No.</th>
                        <th scope="col">No. TPS</th>
                        <th scope="col" class="w-25">Nama Saksi</th>
                        <th scope="col" class="w-25">Alamat</th>
                        <th scope="col">No. Hp / WhatsApp</th>
                        <th scope="col">Partai</th>
                        <th scope="col">Foto KTP</th>
                        <th scope="col" class="w-25">Foto Diri</th>
                      </tr>
                      <tbody>
                        <?php $no = 0;?>
                        @foreach($saksis as $saksi)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$saksi->no_tps}}</td>
                          <td>{{$saksi->nama_saksi}}</td>
                          <td>{{$saksi->alamat}}</td>
                          <td>{{$saksi->no_hp}}</td>
                          <td>{{$saksi->partai->nama_partai}}</td>
                          <td><a href="{{\Storage::url($saksi->foto_ktp)}}"><img src="{{\Storage::url($saksi->foto_ktp)}}" class="img-fluid"></td>
                          <td><a href="{{\Storage::url($saksi->foto_diri)}}"><img src="{{\Storage::url($saksi->foto_diri)}}" class="img-fluid"></td>
                        </tr>

                        @endforeach

                      </tbody>
                    </thead>
                  </table>
                </div>
                <br>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    @include('layouts.script')
  </body>
  @include('layouts.footer')
</html>
