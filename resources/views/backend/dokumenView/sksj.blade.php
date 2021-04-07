<!DOCTYPE html>
<html lang="en">
<head>
  <title>SURAT KETERANGAN SAPU JAGAT (SKSJ)</title>
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
        <div class="isi">
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN</u></b></p>

            <p>Yang bertandatangan dibawah ini :</p>
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 10px">:</td>
                    <td style="width: 70%;">{{$sksj->nama_pejabat}}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{$sksj->jabatan}}</td>
                </tr>
                <tr>
                    <td>Alamat Kantor</td>
                    <td>:</td>
                    <td>{{$sksj->alamat}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang</td>
                </tr>
            </table>

            <p>Dengan ini menerangkan bahwa :</p>
            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 10px">:</td>
                    <td style="width: 70%;">{{$sksj->nama_penduduk}}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>:</td>
                    <td>{{$sksj->umur}} Tahun</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{$sksj->pekerjaan->nama}}</td>
                </tr>
                <tr>
                    <td>Alamat Kantor</td>
                    <td>:</td>
                    <td>{{$sksj->alamat_kantor}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang</td>
                </tr>
                <tr>
                    <td>No KTP/SIM</td>
                    <td>:</td>
                    <td>{{$sksj->no_nik}}</td>
                </tr>
            </table>

            <p>
                <br>Dengan ini menyatakan bahwa :
                <ol>
                    <li style="margin-bottom: 10px;">Nama tersebut diatas benar-benar penduduk {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} kami yang sudah tinggal selama {{\Carbon\Carbon::parse($sksj->tgl_menetap)->diffInDays()}} Hari ({{\Carbon\Carbon::parse($sksj->tgl_menetap)->diffInYears()}}) Tahun</li>
                    <li style="margin-bottom: 10px;">Dan orang tersebut diatas telah menghadap kami untuk membuat Surat Keterangan yang akan digunakan untuk<br><br><center>{{$sksj->keperluan}}</center><br></li>
                    <li style="margin-bottom: 10px;">Surat Keterangan ini dibuat dengan sebenar-benarnya dengan memperhatikan aturan dan hukum yang berlaku di Negara Kesatuan Republik Indonesia serta melampirkan dokumen-dokumen yang dianggap perlu.</li>
                </ol>
                <br>
                Demikian, Agar dapat digunakan sebagaimana mestinya.
            </p>
            <br><br>
            <table>
                <tr>
                    <td style="width: 25%;"></td>
                    <td style="width: 25%;"></td>
                    <td class="tengah" style="width: 50%;">
                        Subang, {{\Carbon\Carbon::parse($sksj->finished_date)->translatedFormat('d F Y')}}<br>
                        {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}<br>
                        Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}}<br>
                        Kabupaten Subang<br><br>
                        <span>{!! $barcode !!}</span><br><br>
                        <b><u>{{($desa)?$desa->kades:'-'}}</u></b>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>