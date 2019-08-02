<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Koordinator Saksi</title>
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
              <center><h2><strong>Data Koordinator Saksi</strong></h2></center>
              <center>
                <h4>Kecamatan: <strong>{{$kecNow->nama_kecamatan}}</strong>, Kabupaten/Kota: <strong>{{$kabNow->nama_kabupatenkota}}</strong>, Provinsi: <strong>Bali</strong></h4>
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
              </tr>
              <?php $no=0; ?>
              @foreach ($koorKecs as $data)
              <?php $no++; ?>
              <tr>
                <td class="tg-rv4w" width="10%">{{$no}}</td>
                <td class="tg-rv4w" width="30%">{{$data->nama_koor}}</td>
                <td class="tg-rv4w" width="40%">{{$data->alamat}}</td>
                <td class="tg-rv4w" width="30%">{{$data->no_hp}}</td>
                <td class="tg-rv4w" width="30%">{{$data->kelurahanDesa->nama_kelurahandesa}}</td>
              </tr>
              @endforeach
            </table>
        </body>
    </head>
</html>
