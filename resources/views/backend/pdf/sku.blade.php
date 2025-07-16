@php
  // defensive defaults so the PDF will still render even if something is missing:
  $kec = optional($desa->kecamatan);
  $kecNama = $kec->nama       ?? '[kecamatan tidak ditemukan]';
  $desaNama = $desa->nama     ?? '[desa tidak ditemukan]';
  $isKelurahan = $kec->id === '2018110602402';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN USAHA (SKU)</title>
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
            bottom: 5px;
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
                        <h1 style="font-size: 18pt;margin-top: -0.5em">KECAMATAN {{$kecNama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -0.4em">KANTOR
                            {{( $isKelurahan == '2018110602402')?'KELURAHAN':'DESA'}}
                            {{strtoupper($desaNama)}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{{$desa->alamat ?? '-'}}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <p class="tengah"><b><u>SURAT KETERANGAN USAHA (SKU)</u></b></p>
            <p class="tengah" style="margin-top: -1.2em;"><b>Nomor : {{$sku->no_surat}}</b></p>

            <p>Saya yang bertanda tangan di bawah,
                {{($isKelurahan == '2018110602402')?'Lurah':'Kepala Desa'}}
                <b>{{($desa)?$desa->kades:'-'}}</b>
                {{($isKelurahan == '2018110602402')?'Kelurahan':'Desa'}}
                <b>{{($desa)?$desa->nama:ucwords(strtolower(Auth::guard('masyarakat')->user()->desa->nama))}}</b>
                Kecamatan
                <b>{{ucwords(strtolower(optional(optional($desa)->kecamatan)->nama ?? '[tidak tersedia]'))}}</b> Kabupaten <b>Subang</b>, dengan ini
                menerangkan bahwa :</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width: 10px">:</td>
                        <td style="width: 70%;">{{ucfirst($sku->nama)}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{$sku->nik}}</td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ucfirst($sku->tempat_lahir)}},
                            {{\Carbon\Carbon::parse($sku->tgl_lahir)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ucfirst($sku->jk)}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{$sku->pekerjaan->nama}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{!!ucfirst($sku->alamat)!!}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{($isKelurahan == '2018110602402')?'Kelurahan':'Desa'}}.
                            {{ucwords(strtolower($sku->area->nama))}} Kec.
                            {{ucwords(strtolower($sku->kecamatan->nama))}} Kab. Subang</td>
                    </tr>
                </table>
            </p>

            <p>Nama yang tertera diatas adalah benar-benar penduduk kami yang tepatnya berdomisili di {!! $sku->alamat
                !!} {{($isKelurahan == '2018110602402')?'Kelurahan':'Desa'}}
                {{ucwords(strtolower($sku->area->nama))}} Kecamatan
                {{ucwords(strtolower($sku->kecamatan->nama))}} Kabupaten Subang. Dan benar sepengetahuan kami bahwa yang
                bersangkutan memiliki usaha berupa:</p>
            <p class="tengah">{{$sku->jenis_usaha}}</p>
            <p>Demikian surat keterangan ini kami buat dengan sebenarnya, dan untuk dipergunakan sebagaimana mestinya.
            </p>

            <p>
                <table>
                    <tr>
                        <td style="width: 24%;"></td>
                        <td style="width: 20%;"></td>
                        <td style="width: 46%;">
                            <table>
                                <tr>
                                    <td style="width: 30%;" align="left">Dikeluarkan di</td>
                                    <td style="width: 2px" align="left">:</td>
                                    <td style="width: 68%;padding-left:10px" align="left">
                                        {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower(Auth::guard('masyarakat')->user()->desa->nama))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;" align="left">Pada tanggal</td>
                                    <td style="width: 2px" align="left">:</td>
                                    <td style="width: 68%;padding-left:10px" align="left">
                                        {{\Carbon\Carbon::parse($sku->finished_date)->translatedFormat('d F Y')}}</td>
                                </tr>
                                <tr>
                                    <!--                                     <td colspan="3" style="width: 100%;">
                                    {{($isKelurahan == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower(Auth::guard('masyarakat')->user()->desa->nama))}}
                                        <br><br>
                                        <center>
                                        <span ><img src="data:image/png;base64, {!! base64_encode($barcode) !!} "
                                                width="100"></span><br><br>
                                        <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span></center>
										
                                    </td> -->
                                    <td colspan="3">
                                        <div class="ttd">
                                            <table>
                                                <tr>
                                                    <td width="70px">
                                                        <img style="width:55px;height:55px"
                                                            src="frontend/img/bsre.png">
                                                    </td>
                                                    <td width="210px">
                                                        <span style="font-size:12px;">Ditandatangani secara elektronik
                                                            oleh:</span><br>
                                                        <span>{{($isKelurahan == '2018110602402')?'Lurah':'Kepala Desa'}}
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
                            <br>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
        <div class="footer">
            <table>
                <tr>
                    <td style="width:10%"><img src="data:image/png;base64, {!! base64_encode($barcode) !!}"
                                height="45px"></td>
                    <td style=" width:90%">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat
                        elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik, Badan Siber dan Sandi Negara.
                        Tidak perlu ditandatangani lagi secara fisik oleh pihak terkait. Cek keabsahan dokumen
                        melalui aplikasi VeryDS diplaystore atau kunjungi https://bsre.bssn.go.id/verifikasi</td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>
