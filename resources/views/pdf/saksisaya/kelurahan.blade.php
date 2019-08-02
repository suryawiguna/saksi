<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Saksi</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>

            <div style="font-family:Arial; font-size:12px;">
              <center><h2><strong>Data Saksi</strong></h2></center>
              <center>
                <h4>Kelurahan/Desa: <strong>{{$kelNow->nama_kelurahandesa}}</strong>, Kecamatan: <strong>{{$namaKec}}</strong>, Kabupaten/Kota: <strong>{{$namaKab}}</strong>, Provinsi: <strong>Bali</strong></h4>
              </center>
            </div>

            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No.</th>
                <th class="tg-3wr7">Nama<br></th>
                <th class="tg-3wr7">Alamat<br></th>
                <th class="tg-3wr7">No Handphone<br></th>
                <th class="tg-3wr7">Kelurahan / Desa<br></th>
                <th class="tg-3wr7">No TPS<br></th>
                <th class="tg-3wr7">Nama Koordinator<br></th>
                <th class="tg-3wr7">Partai<br></th>
              </tr>
              <?php $no=0; ?>
              @foreach ($saksiKels as $data)
              <?php $no++; ?>
              <tr>
                <td class="tg-rv4w" width="10%">{{$no}}</td>
                <td class="tg-rv4w" width="30%">{{$data->nama_saksi}}</td>
                <td class="tg-rv4w" width="40%">{{$data->alamat}}</td>
                <td class="tg-rv4w" width="30%">{{$data->no_hp}}</td>
                <td class="tg-rv4w" width="30%">{{$data->kelurahanDesa->nama_kelurahandesa}}</td>
                <td class="tg-rv4w" width="30%">{{$data->no_tps}}</td>
                <td class="tg-rv4w" width="30%">{{$data->koor->nama_koor}}</td>
                <td class="tg-rv4w" width="30%">{{$data->partai->nama_partai}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>
