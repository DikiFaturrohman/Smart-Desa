<!DOCTYPE html>
<html lang="en">
<head>
  <title>SURAT KETERANGAN STATUS PERNIKAHAN (SKSP)</title>
  <style>
        body {
            font-size: 12pt;
            margin-top: 0px;
            padding-top: 0px;
        }

        table {
            width: 100%;
        }

        .tengah {
            text-align: center;
        }

        .text_content{
            text-indent: 60px;
        }

        .isi {
            text-align: justify;
        }

        .kopsurat {
            border-bottom: 4px groove #000;
        }
  </style>
</head>
<body>

    <div class="halaman">
        <div class="kopsurat">
            <table>
                <tr>
                    <td class="tengah"><img src="assets/img/logo.png" width="94px" height="150px"></td>
                    <td class="tengah">
                        <h1 style="font-size: 18pt;margin-top: -0.50em;">PEMERINTAH DAERAH KABUPATEN SUBANG</h1>
                        <h1 style="font-size: 18pt;margin-top: -0.50em;">KECAMATAN {{$desa->desa->kecamatan->nama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -0.50em;">KANTOR {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}} {{($desa)?strtoupper($desa->nama):$desa->desa->nama}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{!!($desa)?$desa->alamat:'-'!!}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN STATUS PERNIKAHAN</u></b></p>
            <p class="tengah" style="margin-top: -1em;"><b>Nomor : {{$skn->no_surat}}</b><br><br></p>

            <p>Yang bertanda tangan dibawah ini {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} <b>{{($desa)?$desa->kades:'-'}}</b> Desa <b>{{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}</b> Kecamatan .<b>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</b> Kabupaten <b>Subang</b> dengan ini menerangkan bahwa:<br></p>

            <p>
                <table>
                    <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width: 10px">:</td>
                        <td style="width: 70%;">{{$skn->nama}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{$skn->nik}}</td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{$skn->tempat_lahir}}, {{\Carbon\Carbon::parse($skn->tgl_lahir)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ucfirst($skn->jk)}}</td>
                    </tr>
                    <tr>
                        <td>Warga Negara</td>
                        <td>:</td>
                        <td>{{ucfirst($skn->warga_negara)}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ucfirst($skn->agama)}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{!! $skn->alamat !!}</td>
                    </tr>
                </table>
            </p>

            <p><br>Bahwa yang namanya tersebut diatas adalah benar-benar warga Kami dengan memiliki status pernikahan sebagai berikut:<br><br></p>

            <p class="tengah"><i>{{ ucfirst($skn->status_perkawinan)}} (Bukti terlampir).</i><br><br></p>

            <p>Surat keterangan ini dibuat untuk keperluan:</p>

            <p class="tengah">{{$skn->keperluan}}</p>

            <p>Demikian surat keterangan ini diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;"></td>
                        <td class="tengah" style="width: 50%;">
                            {{$desa->nama}}, {{\Carbon\Carbon::parse($skn->finished_date)->translatedFormat('d F Y')}}<br>
                            {{($desa->desa->kecamatan->id == '2018110602402')?'LURAH':'KEPALA DESA'}}<br><br>
                            <span>{!! $barcode !!}</span><br><br>
                            <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
    </div>

</body>
</html>