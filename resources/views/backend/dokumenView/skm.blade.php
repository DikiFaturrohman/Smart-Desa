<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN KEMATIAN</title>
    <style>
        body {
            font-size: 6.5pt;
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
            text-indent: 20px;
        }

        .isi {
            text-align: justify;
        }

        .kopsurat {
            border-bottom: 4px groove #000;
        }

        .nospasing {
            border-spacing: 0px;
        }
    </style>
</head>

<body>

    <div class="halaman">
        <div class="isi">
            <table>
                <tr>
                    <td width="25%" style="border-right:1px #000 dashed;"  valign="top">
                        <table>
                            <tr>
                                <td colspan="3"><b><i>Kode : F - 2.16</i></b></td>
                            </tr>
                            <tr>
                                <td width="100px">Pemerintah Kab.</td>
                                <td width="10px">:</td>
                                <td>{{ucwords(strtolower($desa->desa->kota->nama))}}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</td>
                            </tr>
                            <tr>
                                <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                                <td>:</td>
                                <td>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                            </tr>
                        </table>
                        <br><br><br>
                        <p class="tengah">ARSIP UNTUK {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}</p>
                        <p class="tengah"><b>SURAT KETERANGAN KEMATIAN</b></p>
                        <p class="tengah"><b>No : {{$skm->no_surat}}</b></p>
                        <br><br><br>

                        <p class="text_content">Yang bertanda tangan dibawah ini menerangkan bahwa :</p>
                        <table>
                            <tr>
                                <td width="100px">Nama Lengkap</td>
                                <td width="10px">:</td>
                                <td>{{($skm->nama_jenazah)}}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{($skm->nik_jenazah)}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ucfirst($skm->jk_jenazah)}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir/umur</td>
                                <td>:</td>
                                <td>{{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->translatedFormat('d F Y')}} / {{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->diffInYears()}}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td>{{ucfirst($skm->agama)}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{($skm->alamat_janazah)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Telah meninggal dunia pada</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Hari</td>
                                <td>:</td>
                                <td>{{\Carbon\Carbon::parse($skm->tgl_kematian)->translatedFormat('l')}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{\Carbon\Carbon::parse($skm->tgl_kematian)->translatedFormat('d F Y')}}</td>
                            </tr>
                            <tr>
                                <td>Bertempat di</td>
                                <td>:</td>
                                <td>{{($skm->tempat_kematian)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Penyebab kematian</td>
                                <td>:</td>
                                <td>{{($skm->sebab_kematian)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <p class="text_content">Surat keterangan ini di buat berdasarkan keterangan pelapor :</p>
                        <table>
                            <tr>
                                <td width="100px">Nama Lengkap</td>
                                <td width="10px">:</td>
                                <td>{{($skm->nama_pelapor)}}</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{($skm->nik_pelapor)}}</td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td>{{($skm->umur_pelapor)}} Tahun</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td>{{($skm->pekerjaanPelapor->nama)??'-'}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{($skm->alamat_pelapor)}}</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Hubungan pelapor dengan yang mati</td>
                                <td>:</td>
                                <td>{{($skm->hubungan)}}</td>
                            </tr>
                        </table>
                        <br>
                        <table>
                            <tr>
                                <td width="35%">&nbsp;</td>
                                <td width="10%">&nbsp;</td>
                                <td width="55%" class="tengah">
                                    <p>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}, \Carbon\Carbon::parse($skm->finished_date)->translatedFormat('d F Y')</p>
                                    <p>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}</p>
                                    <br><br><br><br><br>
                                    <p>({{$desa->kades}})</p>
                                </td>
                            </tr>
                        </table>
                    </td>


                    <td width="50%" style="border-right:1px #000 dashed;" valign="top">
                        <table>
                            <tr>
                                <td colspan="3"><b><i>Kode : F - 2.16</i></b></td>
                            </tr>
                            <tr>
                                <td width="100px">Pemerintah Kab.</td>
                                <td width="10px">:</td>
                                <td>{{ucwords(strtolower($desa->desa->kota->nama))}}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>:</td>
                                <td>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</td>
                            </tr>
                            <tr>
                                <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                                <td>:</td>
                                <td>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                            </tr>
                        </table>
                        <br>
                        <p class="tengah">ARSIP UNTUK KECAMATAN/TEMPAT PEREKAMAN DATA</p>
                        <p class="tengah"><b>SURAT KETERANGAN KEMATIAN</b></p>
                        <p class="tengah"><b>No : {{$skm->no_surat}}</b></p>
                        <br>

                        <table>
                            <tr>
                                <td width="30px">&nbsp;</td>
                                <td width="100px">Nama Kepala Keluarga</td>
                                <td width="10px">:</td>
                                <td>{{$skm->nama_kepala_keluarga}}</td>
                            </tr>
                            <tr>
                                <td width="30px">&nbsp;</td>
                                <td width="100px">Nomor Kartu Keluarga :</td>
                                <td width="10px">:</td>
                                <td>{{$skm->no_kk}}</td>
                            </tr>
                        </table>

                        <table class="nospasing">
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">JENAZAH</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{$skm->nik_jenazah}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{$skm->nama_jenazah}}</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td colspan="4">{{ucfirst($skm->jk_jenazah)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Tanggal Lahir / Umur</td>
                                            <td>:</td>
                                            <td colspan="4">{{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->translatedFormat('d F Y')}} / {{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->diffInYears()}}</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Tempat Lahir</td>
                                            <td>:</td>
                                            <td colspan="4">{{$skm->tempat_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td colspan="4">{{ucfirst($skm->agama)}}</td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td colspan="4">{{(#skm->pekerjaanJenazah->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->alamat_jenazah)}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>a. Desa {{ucwords(strtolower($skm->areaJenazah->nama))??'-'}}</td>
                                            <td></td>
                                            <td>c. {{($skm->kotaJenazah->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>b. Kecamatan {{ucwords(strtolower($skm->kecamatanJenazah->nama))??'-'}}</td>
                                            <td></td>
                                            <td>d. Provinsi {{($skm->provinsiJenazah->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">9.</td>
                                            <td width="100px">Kewarganegaraan</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->kewarganegaraan)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">10.</td>
                                            <td width="100px">Keturunan</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->keturunan)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">11.</td>
                                            <td width="100px">Kebangsaan</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->kebangsaan)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">12.</td>
                                            <td width="100px">Anak Ke</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->anak_ke)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">13.</td>
                                            <td width="100px">Tanggal Kematian</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{\Carbon\Carbon::parse($skm->tgl_kematian)->tranaslatedFormat('d F Y')??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">14.</td>
                                            <td width="100px">Pukul</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{($skm->pukul)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">15.</td>
                                            <td width="100px">Sebab Kematian</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->sebab_kematian)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">16.</td>
                                            <td width="100px">Tempat Kematian</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->tempat_kematian)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">17.</td>
                                            <td width="100px">yang menerangka</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{ucfirst($skm->yang_menerangkan)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">AYAH</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{($skm->nik_ayah)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->nama_ayah)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Umur</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->umur_ayah)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->pekerjaanAyah->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->alamat_ayah)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($skm->areaAyah->nama))??'-'}}</td>
                                            <td></td>
                                            <td>c. {{($skm->kotaAyah->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>b. Kecamatan {{ucwords(strtolower($skm->kecamatanAyah->nama))??'-'}}</td>
                                            <td></td>
                                            <td>d. Provinsi {{($skm->provinsiAyah->nama)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">IBU</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{$skm->nik_ibu}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{$skm->nama_ibu}}</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Umur</td>
                                            <td>:</td>
                                            <td colspan="4">{{$skm->umur_ibu}}</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->pekerjaanIbu->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->alamat_ibu)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}} {{ucwords(strtolower($skm->areaIbu->nama))??'-'}}</td>
                                            <td></td>
                                            <td>c. {{($skm->kotaIbu->nama)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>b. Kecamatan {{ucwords(strtolower($skm->kecamatanIbu->nama))??'-'}}</td>
                                            <td></td>
                                            <td>d. Provinsi {{($skm->provinsiIbu->nama)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">PELAPOR</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{($skm->nama_pelapor)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->nama_pelapor)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">SAKSI I</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{($skm->nik_saksi1)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->nama_saksi1)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px #000 solid;">
                                    <table>
                                        <tr>
                                            <td colspan="7">SAKSI II</td>
                                        </tr>
                                        <tr>
                                            <td width="10px">1.</td>
                                            <td width="100px">NIK</td>
                                            <td width="10px">:</td>
                                            <td colspan="4">{{($skm->nik_saksi2)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="4">{{($skm->nama_saksi2)??'-'}}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td width="35%" class="tengah"> <p>&nbsp;</p>
                                    <p>Registar</p>
                                    <br><br><br><br><br>
                                    <p>(........................................)</p></td>
                                <td width="10%">&nbsp;</td>
                                <td width="55%" class="tengah cantik">
                                    <p>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}, \Carbon\Carbon::now()->translatedFormat('d F Y')</p>
                                    <p>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}</p>
                                    <br><br><br><br><br>
                                    <p>({{$desa->kades}})</p>
                                </td>
                            </tr>
                        </table>
                    </td>


            <td width="25%" valign="top">
                <table>
                    <tr>
                        <td colspan="3"><b><i>Kode : F - 2.16</i></b></td>
                    </tr>
                    <tr>
                        <td width="100px">Pemerintah Kab.</td>
                        <td width="10px">:</td>
                        <td>{{ucwords(strtolower($desa->desa->kota->nama))}}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</td>
                    </tr>
                    <tr>
                        <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                        <td>:</td>
                        <td>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                    </tr>
                </table>
                <br><br><br>
                <p class="tengah">ARSIP UNTUK {{($desa->desa->kecamatan->id == '2018110602402')?'KELURAHAN':'DESA'}}</p>
                <p class="tengah"><b>SURAT KETERANGAN KEMATIAN</b></p>
                <p class="tengah"><b>No : {{$skm->no_surat}}</b></p>
                <br><br><br>

                <p class="text_content">Yang bertanda tangan dibawah ini menerangkan bahwa :</p>
                <table>
                    <tr>
                        <td width="100px">Nama Lengkap</td>
                        <td width="10px">:</td>
                        <td>{{($skm->nama_jenazah)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{($skm->nik_jenazah)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ucfirst($skm->jk_jenazah)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal lahir/umur</td>
                        <td>:</td>
                        <td>{{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->translatedFormat('d F Y')}} / {{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->diffInYears()}}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ucfirst($skm->agama)}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{($skm->alamat_janazah)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Telah meninggal dunia pada</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hari</td>
                        <td>:</td>
                        <td>{{\Carbon\Carbon::parse($skm->tgl_kematian)->translatedFormat('l')}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{\Carbon\Carbon::parse($skm->tgl_kematian)->translatedFormat('d F Y')}}</td>
                    </tr>
                    <tr>
                        <td>Bertempat di</td>
                        <td>:</td>
                        <td>{{($skm->tempat_kematian)}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Penyebab kematian</td>
                        <td>:</td>
                        <td>{{($skm->sebab_kematian)}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <p class="text_content">Surat keterangan ini di buat berdasarkan keterangan pelapor :</p>
                <table>
                    <tr>
                        <td width="100px">Nama Lengkap</td>
                        <td width="10px">:</td>
                        <td>{{($skm->nama_pelapor)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{($skm->nik_pelapor)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>Umur</td>
                        <td>:</td>
                        <td>{{($skm->umur_pelapor)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{($skm->pekerjaanPelapor->nama)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{($skm->alamat_pelapor)??'-'}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hubungan pelapor dengan yang mati</td>
                        <td>:</td>
                        <td>{{($skm->hubungan)??'-'}}</td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td width="35%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="55%" class="tengah">
                            <p>{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}, \Carbon\Carbon::now()->translatedFormat('d F Y')</p>
                            <p>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}</p>
                            <br><br>
                            <span>{!! $barcode !!}</span><br><br>
                            <p>({{$desa->kades}})</p>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
            </table>
        </div>
    </div>

</body>

</html>