<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN PENGHASILAN (SKP)</title>
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
                    <td class="tengah"><img src="assets/img/logo.png" width="94px" height="150px"></td>
                    <td class="tengah">
                        <h1 style="font-size: 17pt;margin-top: -0.50em;">PEMERINTAH DAERAH KABUPATEN SUBANG</h1>
                        <h1 style="font-size: 18pt;margin-top: -0.50em;">KECAMATAN {{$desa->desa->kecamatan->nama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -0.50em;">KANTOR {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}
                            {{($desa)?strtoupper($desa->nama):$desa->desa->nama}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{!!($desa)?$desa->alamat:'-'!!}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <p class="tengah"><b><u>SURAT KETERANGAN PENGHASILAN (SKP)</u></b></p>
            <p class="tengah" style="margin-top: -1em;"><b>Nomor : {{$skp->no_surat}}</b></p>

            <p>Saya yang bertanda tangan di bawah, {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} <b>{{($desa)?$desa->kades:'-'}}</b> Desa
                <b>{{($desa)?$desa->nama:ucwords(strtolower($desa->desa->nama))}}</b> Kecamatan
                <b>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</b> Kabupaten <b>Subang</b>, dengan ini
                menerangkan bahwa :</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width: 10px">:</td>
                        <td style="width: 70%;">{{ucfirst($skp->nama)}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{$skp->nik}}</td>
                    </tr>
                    <tr>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ucfirst($skp->tempat_lahir)}},
                            {{\Carbon\Carbon::parse($skp->tgl_lahir)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ucfirst($skp->jk)}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{$skp->pekerjaan->nama}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{!!ucfirst($skp->alamat)!!}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}. {{ucwords(strtolower($skp->area->nama))}} Kec.
                            {{ucwords(strtolower($skp->kecamatan->nama))}} Kab. Subang</td>
                    </tr>
                </table>
            </p>

            <p>Nama yang tertera diatas adalah benar-benar penduduk kami yang tepatnya berdomisili di {!! $skp->alamat
                !!} {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($skp->area->nama))}} Kecamatan
                {{ucwords(strtolower($skp->kecamatan->nama))}} Kabupaten Subang. Menurut pengamatan kami adalah benar
                yang bersangkutan memilki penghasilan rata-rata sebulan Rp {{number_format($skp->gaji,0,',','.')}} dan
                menanggung {{$skp->jumlah_tanggungan}} Orang anggota keluarga</p>

            <p>Demikian surat keterangan ini kami buat dengan sebenarnya, dan untuk dipergunakan sebagaimana mestinya.
            </p>

            <p>
                <table>
                    <tr>
                        <td style="width: 35%;"></td>
                        <td style="width: 20%;"></td>
                        <td style="width: 45%;">
                            <table>
                                <tr>
                                    <td style="width: 20%;">Dikeluarkan di</td>
                                    <td style="width: 5px">:</td>
                                    <td style="width: 80%;">
                                        {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Pada tanggal</td>
                                    <td style="width: 5px">:</td>
                                    <td style="width: 80%;">
                                        {{\Carbon\Carbon::parse($skp->finished_date)->translatedFormat('d F Y')}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;">
                                        {{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?$desa->nama:$desa->desa->nama}}
                                        <br><br>
                                        <span>{!! $barcode !!}</span><br><br>
                                        <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span>
                                    </td>
                                </tr>

                            </table>
                            <br>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
    </div>

</body>

</html>
