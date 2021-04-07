<!DOCTYPE html>
<html lang="en">
<head>
  <title>SURAT KETERANGAN BEDA NAMA (SKBN)</title>
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
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN BEDA NAMA</u></b></p>
            <p class="tengah" style="margin-top: -1em;"><b>Nomor : {{$skbn->no_surat}}</b><br><br></p>

            <p>Yang bertanda tangan di bawah ini :<br></p>

            <p >
                <table style="padding-left: 30px;">
                    <tr>
                        <td style="width: 30%;">Nama</td>
                        <td style="width: 10px">:</td>
                        <td style="width: 70%;">{{($desa)?$desa->kades:'-'}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}} {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Kabupaten Subang</td>
                    </tr>
                </table>
            </p>

            <p><br>Dengan ini menerangkan bahwa :</p>

            <p>
                <ol>
                    <li>
                        Nama yang tercantum di {{strtoupper($skbn->skbnDetail[0]->jenis_dok)}} No: {{$skbn->skbnDetail[0]->nomor_dok}} adalah:
                        <table>
                            <tr>
                                <td style="width: 30%;">Nama</td>
                                <td style="width: 10px">:</td>
                                <td style="width: 70%;">{{$skbn->skbnDetail[0]->nama_dok}}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        Sedangkan Nama yang tercantum di {{strtoupper($skbn->skbnDetail[1]->jenis_dok)}} No: {{$skbn->skbnDetail[1]->nomor_dok}} adalah:
                        <table>
                            <tr>
                                <td style="width: 30%;">Nama</td>
                                <td style="width: 10px">:</td>
                                <td style="width: 70%;">{{$skbn->skbnDetail[1]->nama_dok}}</td>
                            </tr>
                        </table>
                    </li>
                </ol>
            </p>

            <p>Dengan adanya perbedaan nama tersebut, kami menegaskan bahwa orangnya sama dan berdasarkan pengakuan dari yang bersangkutan, nama yang akan digunakan nama yang tercantum di {{strtoupper($skbn->data_dok_benar)}} No: {{$dataBenar->nomor_dok}} yaitu nama:<br><br></p>

            <p class="tengah">{{$dataBenar->nama_dok}}</p>

            <p><br>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>

            <p>
                <table>
                    <tr>
                        <td style="width: 35%;"></td>
                        <td style="width: 20%;"></td>
                        <td style="width: 45%;">
                            <table style="border-bottom: 1px solid #000;">
                                <tr>
                                    <td style="width: 30%;">Dibuat di</td>
                                    <td style="width: 10px">:</td>
                                    <td style="width: 70%;">{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;">Pada tanggal</td>
                                    <td style="width: 10px">:</td>
                                    <td style="width: 70%;">{{\Carbon\Carbon::parse($skbn->finished_date)->translatedFormat('d F Y')}}</td>
                                </tr>
                            </table>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">
                            Tanda tangan Pemegang
                            <br><br><br><br><br><br><br><br>
                            
                            <span><b><u>{{$dataBenar->nama_dok}}</u></b></span>
                        </td>
                        <td></td>
                        <td>
                            {{($desa->desa->kecamatan->id == '2018110602402')?'LURAH':'KEPALA DESA'}} {{($desa)?strtoupper($desa->nama):$desa->desa->nama}}
                            <br><br>
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