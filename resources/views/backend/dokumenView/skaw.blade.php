<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN AHLI WARIS</title>
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
            text-indent: 40px;
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
            <p>i. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Format Surat Keterangan Ahli Waris</p>
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN AHLI WARIS</u></b></p>

            <p class="text_content">Yang bertanda tangan di bawah ini kami ahli waris dan atau para ahli waris
                Almarhum {{$skaw->nama_alm}} dengan ini menerangkan dan menyatakan bahwa seorang
                {{$skaw->jk_alm}} yang bernama {{$skaw->nama_alm}} telah meninggal dunia
                pada tanggal {{\Carbon\Carbon::parse($skaw->tgl_kematian)->translatedFormat('d F Y')}} di alamat {{$skaw->alamat}}
                {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}} Kecamatan {{ucwords(strtolower($desa->desa->kecamatan->nama))}}
                Kabupaten Subang yang juga sebagai tempat tinggalnya yang terakhir. Almarhum
                {{$skaw->nama_alm}} semasa hidupnya pernah menikah secara sah dengan
                {{$skaw->pasangan->first()->jk}} yang bernama :<br>

                @if(count($skaw->pasangan) > 0)
                @foreach($skaw->pasangan as $pasangan)
                <ol>
                    <li>
                        {{$pasangan->nama}}, Lahir di {{$pasangan->tempat_lahir}}, pada
                        tanggal {{\Carbon\Carbon::parse($pasangan->tgl_lahir)->translatedFormat('d F Y')}} Kewarganegaraan Indonesia, Pekerjaan
                        {{$pasangan->pekerjaan->nama}}
                    </li>
                </ol>@endforeach
                @endif
                Almarhum dari pernikahan tersebut diatas mempunyai anak/keturunan/ahli waris sebanyak
                {{count($skaw->anak)}} orang masing-masing bernama :
            </p>

            <table>
                @php $i = 1 @endphp
                @if(count($skaw->anak) > 0)
                @foreach($skaw->anak as $anak)
                <tr>
                    <td style="width: 10px">{{$i}}.</td>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 10px">:</td>
                    <td style="width: 70%;">{{$anak->nama}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tempat, Tgl Lahir</td>
                    <td>:</td>
                    <td>{{$anak->tempat_lahir}}, {{\Carbon\Carbon::parse($anak->tgl_lahir)->translatedFormat('d F Y')}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>{{ucfirst($anak->kewarganegaraan)}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$anak->alamat}}</td>
                </tr>
                @php $i++ @endphp
                @endforeach
                @endif
            </table>

            <p class="text_content">Almarhum tidak mempunyai anak/keturunan/akhli waris yang lain selain nama dan atau
                nama-nama sebagaimana tersebut diatas.</p>

            <p class="text_content">Demikian Surat Keterangan dan Pernyataan Ahli Waris ini kami buat dengan sebenarnya
                diatas kertas bermaterai cukup dalam keadaan sehat jasmani dan rohani tanpa ada tekanan maupun paksaan
                dari siapapun dan apabila dikemudian hari keterangan dan pernyataan kami tidak benar, maka kami bersedia
                dituntut sesuai dengan hukum yang berlaku dan Pihak Pejabat maupun Dinas/Instansi Pemerintah terlepas
                dari segala tuntutan dan atau gugatan karena ini merupakan tanggungjawab kami selaku ahli waris,
                selanjutnya untuk diketahui dan dapat dipergunakan sebagaimana mestinya.</p>

            <p style="text-align: right;">Subang, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}</p>

            <table>
                <tr>
                    <td colspan="3">Para Akhli waris,<br><br></td>
                </tr>
                @php $i = 1 @endphp
                @if(count($skaw->anak) > 0)
                @foreach($skaw->anak as $anak)
                <tr>
                    <td style="width: 10px;">{{$i}}.</td>
                    <td style="width: 150px;">{{$anak->nama}}</td>
                    <td>(...................................)</td>
                </tr>
                @php $i++ @endphp
                @endforeach
                @endif
            </table>
            <br><br>
            <table>
                <tr>
                    <td colspan="3">Saksi-saksi :<br><br></td>
                </tr>
                <tr>
                    <td style="width: 10px;">1</td>
                    <td style="width: 100px;">{{$skaw->nama_saksi1}}</td>
                    <td>(...................................)</td>
                </tr>
                <tr>
                    <td style="width: 10px;"><br><br>2</td>
                    <td style="width: 200px;"><br><br>{{$skaw->nama_saksi1}}</td>
                    <td><br><br>(...................................)</td>
                </tr>
            </table>
            <br><br><br><br>
            <table>
                <tr>
                    <td class="tengah" colspan="2">Subang, {{\Carbon\Carbon::parse($skaw->finished_date)->translatedFormat('d F Y')}}<br><br><br></td>
                </tr>
                <tr>
                    <td class="tengah">
                        Dikuatkan oleh kami :<br><br>

                        CAMAT {{strtoupper($desa->desa->kecamatan->nama)}} <br><br><br><br><br><br>


                        <u>..............................</u>

                    </td>
                    <td class="tengah">
                        Disaksikan dan dibenarkan oleh kami :<br><br>

                        {{($desa->desa->kecamatan->id == '2018110602402')?'LURAH':'KEPALA DESA'}} {{($desa)?ucwords(strtoupper($desa->nama)):strtoupper($desa->desa->nama)}} <br><br>
                        <span>{!! $barcode !!}</span><br><br>
                        <u>{{$desa->kades}}</u>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>