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

        .halaman {
            position: relative;
            background-color: transparent;
        }

        .footer {
            position: absolute;
            bottom: 2px;
            background-color: transparent;
            text-align: center;
            font-size: 10pt;
            color: #3e3e3e;
        }

        .ttd {
            width: 280px;
            padding: 2px;
            border: 1px solid #000;
            margin: 0;
        }

        table {
            width: 100%;
        }

        .tengah {
            text-align: center;
        }

        .tengah-gambar {
            position: absolute;
        }

        .text_content {
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
                    <!-- <td class="tengah-gambar" ><img src="assets/img/logo.png" width="90px" height="128px"></td> -->
                    <td class="tengah">
                        <img style="margin-top: -1.2em; left: -1.1em" class="d-flex float-left tengah-gambar"
                            src="assets/img/logo.png" width="86px" height="115px">
                        <h1 style="font-size: 17pt;margin-top: -1em">PEMERINTAH DAERAH KABUPATEN SUBANG</h1>
                        <h1 style="font-size: 18pt;margin-top: -1em">KECAMATAN {{$desa->desa->kecamatan->nama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -1em">KANTOR
                            {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}
                            {{($desa)?strtoupper($desa->nama):Auth::guard('masyarakat')->user()->desa->nama}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{!!($desa)?$desa->alamat:'-'!!}</p>
                    </td>
                </tr>
            </table>
        </div>
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
                    <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}
                        {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan
                        {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang</td>
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
                    <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}
                        {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan
                        {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang</td>
                </tr>
                <tr>
                    <td>No KTP/SIM</td>
                    <td>:</td>
                    <td>{{$sksj->no_nik}}</td>
                </tr>
            </table>
            <br>
            <p>
                Dengan ini menyatakan bahwa :
                <ol>
                    <li style="margin-bottom: 10px;">Nama tersebut diatas benar-benar penduduk
                        {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} kami yang sudah tinggal
                        selama {{\Carbon\Carbon::parse($sksj->tgl_menetap)->diffInDays()}} Hari
                        ({{\Carbon\Carbon::parse($sksj->tgl_menetap)->diffInYears()}}) Tahun</li>
                    <li style="margin-bottom: 10px;">Dan orang tersebut diatas telah menghadap kami untuk membuat Surat
                        Keterangan yang akan digunakan untuk:<br>
                        <center>{{$sksj->keperluan}}</center>
                    </li>
                    <li style="margin-bottom: 10px;">Surat Keterangan ini dibuat dengan sebenar-benarnya dengan
                        memperhatikan aturan dan hukum yang berlaku di Negara Kesatuan Republik Indonesia serta
                        melampirkan dokumen-dokumen yang dianggap perlu.</li>
                </ol>
            </p>
            <p>Demikian, Agar dapat digunakan sebagaimana mestinya.</p>
            <br>
            <table>
                <tr>
                    <td style="width: 25%;"></td>
                    <td style="width: 25%;"></td>
                    <!-- <td class="tengah" style="width: 50%;">
                        Subang, {{\Carbon\Carbon::parse($sksj->finished_date)->translatedFormat('d F Y')}}<br>
                        {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}
                        {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}<br>
                        Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}}<br>
                        Kabupaten Subang<br><br>
                        <span><img src="data:image/png;base64, {!! base64_encode($barcode) !!} "
                                width="100"></span><br><br>
                        <b><u>{{($desa)?$desa->kades:'-'}}</u></b>
                    </td> -->
                    <td>
                        <div class="ttd">
                            <table>
                                <tr>
                                    <td width="70px">
                                        <img style="width:55px;height:55px" src="{{asset('frontend/img/bsre.png')}}">
                                    </td>
                                    <td width="210px">
                                        <span style="font-size:12px;">Ditandatangani secara elektronik
                                            oleh:</span><br>
                                        <span>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}
                                            {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower(Auth::guard('masyarakat')->user()->desa->nama))}}</span><br><br>

                                        <span
                                            style="margin-top:12px;font-weight:bold">{{($desa)?$desa->kades:'-'}}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <table>
                <tr>
                    <td style="width:10%">
                        <span><img src="data:image/png;base64, {!! base64_encode($barcode) !!}" width="auto"
                                height="45px"></span></td>
                    <td style="width:90%">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat
                        elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik, Badan Siber dan Sandi Negara.
                        Tidak
                        perlu ditandatangani lagi secara fisik oleh pihak terkait. Cek keabsahan dokumen melalui
                        aplikasi
                        VeryDS diplaystore atau kunjungi https://tte.kominfo.go.id/verifyPDF</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
