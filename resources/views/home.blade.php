<!DOCTYPE html>
<html lang="en">
  @include('layouts.base')
  <body>

    @include('layouts.navbarHome')

    <div class="py-5 mt-3">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <h5 class="text-center mt-4">Semua <strong>Saksi</strong></h5>
               <h1 class="text-center percent-font"><strong>{{$persenSemuaSaksi}}%</strong></h1>
               <p class="text-center text-secondary">{{$semuaSaksi}} / {{$targetSemuaSaksi}}</p>
            </div>
            <div class="col-lg-6">
               <h5 class="text-center mt-4">Semua <strong>Koordinator Saksi</strong></h5>
               <h1 class="text-center percent-font"><strong>{{$persenSemuaKoor}}%</strong></h1>
               <p class="text-center text-secondary">{{$semuaKoor}} / {{$targetSemuaKoor}}</p>
            </div>
         </div>
      </div>
      <div class="dropdown-divider"></div>
      <div class="container">
         <div class="row">
            <div class="col"><br>
            <canvas id="myChart" width="800" height="400"></canvas>
            <br><br>
              <table class="table table-responsive table-stripped table-bordered table-hover">
                <thead class="thead text-light">
                  <tr>
                    <th rowspan="2" class="align-middle">No.</th>
                    <th scope="col" rowspan="2" class="align-middle">Kabupaten/Kota</th>
                    <th scope="col" colspan="3" class="w-50 text-center">Saksi</th>
                    <th scope="col" colspan="3" class="w-50 text-center">Koordinator</th>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Target</th>
                    <th scope="col">Persentase</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Target</th>    
                    <th scope="col">Persentase</th>                    
                  </tr>
                  <tbody>
                    @foreach($kab as $key => $data)
                    <tr>
                      <td>{{$key}}</td>
                      <td><strong>{{$data['nama']}}</strong></td>
                      <td>{{$data['jumSaksi']}}</td>
                      <td class="text-secondary">{{$data['saksi']}}</td>
                      <td><strong>{{number_format($data['persenSaksi'],1,',','')}}%</strong></td>
                      <td>{{$data['jumKoor']}}</td>                                                                              
                      <td class="text-secondary">{{$data['koor']}}</td>
                      <td><strong>{{number_format($data['persenKoor'],1,',','')}}%</strong></td>
                    </tr>
                    @endforeach
                  </tbody>
                </thead>
              </table>
            </div>
         </div>
      </div>
    </div>
    @include('layouts.script')
    <script>
      var ctx = document.getElementById("myChart");
      ctx.height = 500;
      var nama = {!! json_encode($nama) !!};
      var persenSaksi = <?php echo  json_encode($persenSaksi) ?>;
      var persenKoor = <?php echo  json_encode($persenKoor) ?>;
      var myChart = new Chart(ctx, {
          type: 'horizontalBar',
          data: {
              labels: nama,
              datasets: [{
                  label: '% Saksi',
                  data: persenSaksi,
                  backgroundColor: [
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                      '#1f3983',
                  ],
              },
              {
                  label: '% Koor',
                  data: persenKoor,
                  backgroundColor: [
                      '#f6ab02',
                      '#f6ab02', 
                      '#f6ab02',
                      '#f6ab02', 
                      '#f6ab02',
                      '#f6ab02', 
                      '#f6ab02',
                      '#f6ab02',                      
                      '#f6ab02',
                  ],
              }],
          },
          options: {

              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                          barPercentage: 1.0,
                          categoryPercentage: 1.0,
                          maintainAspectRatio: false,
                      }
                  }],
                  xAxes: [{
                    ticks: {
                        min: 0,
                        max: 100,
                        stepSize: 20
                    }
                }]
              }
          }
      });
      </script>
  </body>

  @include('layouts.footer')
</html>
