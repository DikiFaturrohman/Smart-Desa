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
                        <h1 style="font-size: 18pt;margin-top: -1em">KECAMATAN {{$desa->desa->kecamatan->nama}}</h1>
                        <h1 style="font-size: 19pt;margin-top: -1em">KANTOR {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}
                            {{($desa)?strtoupper($desa->nama):Auth::guard('masyarakat')->user()->desa->nama}}</h1>
                        <p style="margin-top: -1em;margin-bottom: -0.25em;">{!!($desa)?$desa->alamat:'-'!!}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <p class="tengah" style="font-size: 14pt;"><b><u>SURAT KETERANGAN BEDA NAMA</u></b></p>
            <p class="tengah" style="margin-top: -0.8em;"><b>Nomor : {{$skbn->no_surat}}</b><br></p>

            <p>Yang bertanda tangan di bawah ini :<br></p>

            <p>
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

            <p>Dengan ini menerangkan bahwa :</p>

            <p>
                <ol>
                    <li>
                        Nama yang tercantum di {{strtoupper($skbn->skbnDetail[0]->jenis_dok)}} dengan No: {{$skbn->skbnDetail[0]->nomor_dok}} adalah:
                        <table>
                            <tr>
                                <td style="width: 30%;">Nama</td>
                                <td style="width: 10px">:</td>
                                <td style="width: 70%;">{{$skbn->skbnDetail[0]->nama_dok}}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        Sedangkan Nama yang tercantum di {{strtoupper($skbn->skbnDetail[1]->jenis_dok)}} dengan No: {{$skbn->skbnDetail[1]->nomor_dok}} adalah:
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

            <p>Dengan adanya perbedaan nama tersebut, kami menegaskan bahwa orangnya sama dan berdasarkan pengakuan dari yang bersangkutan, nama yang akan digunakan adalah nama yang tercantum di {{strtoupper($skbn->data_dok_benar)}} dengan No: {{$dataBenar->nomor_dok}} yaitu nama:<br></p>

			<p class="tengah"><strong>{{$dataBenar->nama_dok}}</strong></p>

            <p><br>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>

            <p>
            <br>
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
                            {{--($desa->desa->kecamatan->id == '2018110602402')?'LURAH':'KEPALA DESA'--}} {{--($desa)?strtoupper($desa->nama):$desa->desa->nama--}}
                            <br><br>
                            {{--<span><img src="data:image/png;base64, {!! base64_encode($barcode) !!} " width="100"></span><br><br>
                            <span><b><u>{{($desa)?$desa->kades:'-'}}</u></b></span>--}}
                        	<div class="ttd">
											<table>
												<tr>
													<td width="70px">
														<img style="width:55px;height:55px" src="{{asset('frontend/img/bsre.png')}}">
													</td>
													<td width="210px">
														<span style="font-size:12px;">Ditandatangani secara elektronik oleh:</span><br>
                                                    	<span>Kepala Desa Kawunganten</span><br><br>

                                                    	<span style="margin-top:12px;font-weight:bold">{{($desa)?$desa->kades:'-'}}</span>
													</td>
												</tr>
											</table>
										</div>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
		<div class="footer">
        	<table>
            	<tr>
                	<td style="width:10%"><span><img src="data:image/png;base64, {!! base64_encode($barcode) !!}" width="auto" height="45px"></span></td>
                	<td style="width:90%">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik, Badan Siber dan Sandi Negara. Tidak perlu ditandatangani lagi secara fisik oleh pihak terkait. Cek keabsahan dokumen melalui aplikasi VeryDS diplaystore atau kunjungi https://tte.kominfo.go.id/verifyPDF</td>
            	</tr>
        	</table>        	
    	</div>
    </div>

</body>
</html>