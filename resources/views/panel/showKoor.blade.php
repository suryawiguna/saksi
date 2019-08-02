<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>
    @include('layouts.navbarHome')


    <div class="container py-5 mt-5">
      <div class="row">

        <div class="col-md-10 mx-auto">

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

                <div class="col-lg-3 col-md-12 py-3">
                @if(Auth::user()->name == $koor->kecamatan->nama_kecamatan)
                  <a href="{{action('KoorController@edit', $koor->id)}}" class="btn btn-success">
                    Edit
                  </a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapusKoor{{$koor->id}}">
                  Hapus
                  </button>
                @endif
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

                  <!-- Modal Hapus Koor -->
                  <div class="modal fade" id="modalHapusKoor{{$koor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                          <form action="{{action('KoorController@destroy', $koor->id)}}" method="post">
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
                        @foreach($koors as $koor)
                          @if(Auth::user()->name == $koor->kecamatan->nama_kecamatan)
                            <th scope="col">Aksi</th>
                          @endif
                        @endforeach
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
                          @foreach($koors as $koor)
                              @if(Auth::user()->name == $koor->kecamatan->nama_kecamatan)
                          <td class="text-center">
                            <a href="{{action('SaksiController@edit', $saksi->id)}}" class="btn btn-success">
                              Edit
                            </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$saksi->id}}">
                            Hapus
                            </button>
                          </td>
                              @endif
                          @endforeach
                        </tr>

                        @foreach($koors as $koor)
                            @if(Auth::user()->name == $koor->kecamatan->nama_kecamatan)


                            <!-- Modal Hapus -->
                            <div class="modal fade" id="modalHapus{{$saksi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                            
                            @endif
                        @endforeach

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
