<!DOCTYPE html>
<html lang="en">
<head>
  <title>SURAT KETERANGAN TIDAK MAMPU (SKTM)</title>
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
            <p class="tengah"><b><u>SURAT KETERANGAN TIDAK MAMPU (SKTM)</u></b></p>
            <p class="tengah" style="margin-top: -1em;"><b>Nomor : {{$sktm->no_surat}}</b></p>

            <p>Yang bertanda tangan dibawah ini {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} <b>{{($desa)?$desa->kades:'-'}}</b> {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} <b>{{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}</b>  Kecamatan <b>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</b> Kabupaten <b>Subang</b>, dengan ini menerangkan bahwa :</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width: 10px">:</td>
                        <td style="width: 70%;">{{ucfirst($sktm->nama)}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{$sktm->nik}}</td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->tempat_lahir)}}, {{\Carbon\Carbon::parse($sktm->tgl_lahir)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->jk)}}</td>
                    </tr>
                    <tr>
                        <td>Warga Negara</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->warga_negara)}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->agama)}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{!!ucfirst($sktm->alamat)!!}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}. {{ucwords(strtolower($sktm->area->nama))}} Kec. {{ucwords(strtolower($sktm->kecamatan->nama))}} Kab. Subang</td>
                    </tr>
                    <tr>
                        <td>Nama Orang Tua Kandung</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama Ayah</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->nama_ayah)}}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->nama_ibu)}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ucfirst($sktm->alamat_orangtua)}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}. {{ucwords(strtolower($sktm->areaOrtu->nama))}} Kec. {{ucwords(strtolower($sktm->kecOrtu->nama))}} Kab. Subang</td>
                    </tr>
                </table>
            </p>

            <p class="text_content">Benar nama tersebut diatas adalah warga kami, yang menurut sepengetahuan kami orang tersebut termasuk dalam kategori <b>Masyarakat Tidak Mampu ( Miskin )</b>.</p>

            <p class="text_content">Demikian surat keterangan ini kami buat dengan sebenarnya, dan untuk dipergunakan sebagaimana mestinya.</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;"></td>
                        <td class="tengah" style="width: 50%;">
                            {{$desa->nama}}, {{\Carbon\Carbon::parse($sktm->finished_date)->translatedFormat('d F Y')}}<br>
                            {{($desa->desa->kecamatan->id == '2018110602402')?'LURAH':'KEPALA DESA'}}<br><br>
                            <span>{!!$barcode!!}</span><br><br>
                            <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
    </div>

</body>
</html>