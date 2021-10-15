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
                        <img style="margin-top: -1.2em; left: -1.1em" class="d-flex float-left tengah-gambar" src="assets/img/logo.png" width="86px" height="115px">
                        <h1 style="font-size: 17pt;margin-top: -1em">PEMERINTAH DAERAH KABUPATEN SUBANG</h1>
                        <h1 style="font-size: 18pt;margin-top: -0.5em">KECAMATAN {{$desa->desa->kecamatan->nama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -0.4em">KANTOR {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}
                            {{($desa)?strtoupper($desa->nama):Auth::guard('masyarakat')->user()->desa->nama}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{!!($desa)?$desa->alamat:'-'!!}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN RIWAYAT TANAH</u></b></p>
            <p class="tengah" style="margin-top: -0.8em;"><b>Nomor : {{$skrt->no_surat}}</b><br></p>

            <p>Kami yang bertanda tangan dibawah ini, {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang dengan ini menyatakan atau  menerangkan dengan sebenarnya bahwa Tanah berdasarkan Bukti Kepemilikan Tanah Milik Adat dengan SPPT No. {{$skrt->no_sppt}} Blok / Persil : {{$skrt->blok}} / {{$skrt->persil}} Kohir/Kikitir/Girik No. {{$skrt->no_kihir}} Luas {{$skrt->luas}} M2, adapun tanah tersebut terletak Kp/Blok: {{$skrt->alamat}} {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}} Kabupaten Subang<br>Batas - Batas Sebagai Berikut :<br></p>

            <table>
                <tr>
                    <td style="width: 30%;">Sebelah Utara</td>
                    <td style="width: 10px">:</td>
                    <td style="width: 70%;">{{$skrt->sebelah_utara}}</td>
                </tr>
                <tr>
                    <td>Sebelah Timur</td>
                    <td>:</td>
                    <td>{{$skrt->sebelah_timur}}</td>
                </tr>
                <tr>
                    <td>Sebelah Selatan</td>
                    <td>:</td>
                    <td>{{$skrt->sebelah_selatan}}</td>
                </tr>
                <tr>
                    <td>Sebelah Barat</td>
                    <td>:</td>
                    <td>{{$skrt->sebelah_barat}}</td>
                </tr>
            </table>

            <p>Dan menurut Keterangan Saudara {{$skrt->nama_pemilik}} selaku pemilik tanah bahwa riwayat tanah tersebut adalah sebagai berikut :</p>

            <table>
                <tr>
                    <td style="width: 10px;">1</td>
                    <td style="width: 50%">Tanggal {{\Carbon\Carbon::parse($skrt->tgl_riwayat1)->translatedFormat('d F Y')}}</td>
                    <td style="width: 50%;">Tercatat Atas Nama {{$skrt->atas_nama1}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td style="width: 50%">Tanggal {{\Carbon\Carbon::parse($skrt->tgl_riwayat2)->translatedFormat('d F Y')}}</td>
                    <td style="width: 50%;">Tercatat Atas Nama {{$skrt->atas_nama2}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">Berdasarkan {{ucfirst($skrt->berdasarkan2)}} </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td style="width: 50%">Tanggal {{\Carbon\Carbon::parse($skrt->tgl_riwayat3)->translatedFormat('d F Y')}}</td>
                    <td style="width: 50%;">Tercatat Atas Nama {{$skrt->atas_nama3}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">Berdasarkan {{ucfirst($skrt->berdasarkan3)}} </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td style="width: 50%">Tanggal {{\Carbon\Carbon::parse($skrt->tgl_riwayat4)->translatedFormat('d F Y')}}</td>
                    <td style="width: 50%;">Tercatat Atas Nama {{$skrt->atas_nama4}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">Berdasarkan {{ucfirst($skrt->berdasarkan4)}} </td>
                </tr>
            </table>

            <p>Kemudian perlu kami jelaskan pula bahwa tanah tersebut TIDAK DALAM SENGKETA baik sengketa batas maupun hak, dan bukan merupakan tanah Kas {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} maupun Tanah Negara dan tidak termasuk obyek Landreform serta sampai saat ini;</p>

            <p class="tengah">
                @if(!empty($skrt->no_sertifikat))
                    SUDAH SERTIFIKAT DENGAN NO M:. {{$skrt->no_sertifikat}}
                @else
                
                BELUM SERTIFIKAT
                @endif
            </p>

            <p>Demikian surat keterangan ini kami buat dengan sebenarnya dan apabila surat keterangan ini tidak benar saya bersedia dituntut dimuka sidang pengadilan.</p>

            <table>
                <tr>
                    <td class="tengah" style="width: 35%;">
                        &nbsp;<br>
                        Mengetahui atas kebenaranya<br>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}<br><br>
                        <span><img src="data:image/png;base64, {!! base64_encode($barcode) !!} " width="70"></span><br><br>
                        
                        <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span>
                    </td>
                    <td style="width: 30%; padding-left: 75px;">
                        <div style="border: 1px #000 solid; padding: 10px; width: 100px; text-align: center;">MATERAI 6000</div>
                    </td>
                    <td class="tengah" style="width: 35%;">
                    {{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}} , {{\Carbon\Carbon::parse($skrt->finished_date)->translatedFormat('d F Y')}}<br>
                        Yang Menerangkan<br><br><br><br><br><br>
                        
                        
                        <span><b><u>{{$skrt->nama_pemilik}}</u></b></span>
                    </td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td colspan="3">Saksi-saksi :<br><br></td>
                </tr>
                <tr>
                    <td style="width: 10px;">1</td>
                    <td style="width: 100px;">{{$skrt->nama_saksi1}}</td>
                    <td>(...................................)</td>
                </tr>
                <tr>
                    <td style="width: 10px;">2</td>
                    <td style="width: 200px;">{{$skrt->nama_saksi2}}</td>
                    <td>(...................................)</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <table>
                <tr>
                    <td style="width:10%"><img src="frontend/img/bsre.png"
                               height="45px"></td>
                    <td style="width:90%">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat
                        elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik, Badan Siber dan Sandi Negara.
                        Tidak perlu ditandatangani lagi secara fisik oleh pihak terkait. Cek keabsahan dokumen melalui
                        aplikasi VeryDS diplaystore atau kunjungi https://bsre.bssn.go.id/verifikasi</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>