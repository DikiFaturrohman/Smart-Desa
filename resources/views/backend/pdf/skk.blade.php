<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN KELAHIRAN</title>
    <style>
        body {
            font-size: 8pt;
            margin-top: 0px;
            padding-top: 0px;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        td {
            padding-left: 5px;
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
        <div
            style="font-size: 12pt; float: right; width: 100px; border: 1px #000 solid; padding: 10px; margin-bottom: 10px;">
            <b>Kode .
                F-2.01</b></div>
        <div class="isi">
            <table>
                <tr>
                    <td width="215px">Pemerintah {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td width="10px">:</td>
                    <td style="width: 40%;">{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}</td>
                    <td width="20px">Ket</td>
                    <td width="10px">:</td>
                    <td width="50px">Lembar 1</td>
                    <td width="10px">:</td>
                    <td width="150px">UPTD/Instansi Pelaksana</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>{{ucwords(strtolower($desa->desa->kecamatan->nama))}}</td>
                    <td>Ket</td>
                    <td>:</td>
                    <td>Lembar 2</td>
                    <td>:</td>
                    <td>Untuk yang bersangkutan</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>:</td>
                    <td>{{ucwords(strtolower($desa->desa->kota->nama))}}</td>
                    <td>Ket</td>
                    <td>:</td>
                    <td>Lembar 3</td>
                    <td>:</td>
                    <td>{{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Ket</td>
                    <td>:</td>
                    <td>Lembar 4</td>
                    <td>:</td>
                    <td>Kecamatan</td>
                </tr>
                <tr>
                    <td>Kode Wilayah</td>
                    <td>:</td>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td colspan="8">&nbsp;</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td colspan="9" class="tengah" style="font-size: 10pt;"><b>SURAT KETERANGAN KELAHIRAN</b></td>
                </tr>
                <tr>
                    <td colspan="2">Nama Kepala Keluarga</td>
                    <td>:</td>
                    <td colspan="6">{{($skk->nama_kepala_keluarga)??'-'}}</td>
                </tr>
                <tr>
                    <td colspan="2">Nomor Kartu Keluarga</td>
                    <td>:</td>
                    <td colspan="6">{{($skk->no_kk)??'-'}}</td>
                </tr>

                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>BAYI / ANAK</b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;" width="10px">1.</td>
                    <td width="150px">Nama</td>
                    <td width="10px">:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_bayi)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Jenis kelamin</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->jk_bayi)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Tempat dilahirkan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->tempat_dilahirkan)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Tempat kelahiran</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_kepala_keluarga)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Hari dan Tanggal lahir</td>
                    <td>:</td>
                    <td>Hari</td>
                    <td>{{($skk->hari)??'-'}}</td>
                    <td>Tgl</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_bayi)->translatedFormat('d')??'-'}}</td>
                    <td>Bln</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_bayi)->translatedFormat('m')??'-'}}</td>
                    <td>Tahun</td>
                    <td style="border-right: 1px #000 solid;">{{\Carbon\Carbon::parse($skk->tgl_lahir_bayi)->translatedFormat('Y')??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Pukul</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pukul)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">7.</td>
                    <td>Jenis kelahiran</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->jenis_kelahiran)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">8.</td>
                    <td>Kelahiran ke</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->kelahiran_ke)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">9.</td>
                    <td>Penolong kelahiran</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->penolong_kelahiran)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">10.</td>
                    <td>Berat bayi</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->berat_bayi)??'-'}} Kg</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">11.</td>
                    <td>Panjang bayi</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->panjang_bayi)??'-'}} Cm</td>
                </tr>

                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>IBU</b></td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">1.</td>
                    <td>NIK</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nik_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Tanggal Lahir / Umur</td>
                    <td>:</td>
                    <td>Tgl</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ibu)->translatedFormat('d')??'-'}}</td>
                    <td>Bln</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ibu)->translatedFormat('m')??'-'}}</td>
                    <td>Tahun</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ibu)->translatedFormat('Y')??'-'}}</td>
                    <td>Umur</td>
                    <td style="border-right: 1px #000 solid;">{{($skk->umur_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pekerjaanIbu->nama)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->alamat_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td width="100px">a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td colspan="2">{{ucwords(strtolower($skk->areaIbu->nama))??'-'}}</td>
                    <td width="75px">c. Kabupaten</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->kotaIbu->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td>b. Kecamatan</td>
                    <td colspan="2">{{ucwords(strtolower($skk->kecamatanIbu->nama))??'-'}}</td>
                    <td>d. Provinsi</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->provinsiIbu->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->kewarganegaraan_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">7.</td>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->kebangsaan_ibu)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">8.</td>
                    <td>Tgl Pencatatan Perkawinan</td>
                    <td>:</td>
                    <td>Tgl.</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_pencatatan_perkawinan)->translatedFormat('d')??'-'}}</td>
                    <td>Bln</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_pencatatan_perkawinan)->translatedFormat('m')??'-'}}</td>
                    <td>Tahun</td>
                    <td style="border-right: 1px #000 solid;">{{\Carbon\Carbon::parse($skk->tgl_pencatatan_perkawinan)->translatedFormat('Y')??'-'}}</td>
                </tr>

                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>AYAH</b></td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">1.</td>
                    <td>NIK</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nik_ayah)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_ayah)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Tanggal Lahir / Umur</td>
                    <td>:</td>
                    <td>Tgl</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ayah)->translatedFormat('d')??'-'}}</td>
                    <td>Bln</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ayah)->translatedFormat('m')??'-'}}</td>
                    <td>Tahun</td>
                    <td>{{\Carbon\Carbon::parse($skk->tgl_lahir_ayah)->translatedFormat('Y')??'-'}}</td>
                    <td>Umur</td>
                    <td style="border-right: 1px #000 solid;">{{($skk->umur_ayah)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pekerjaanAyah->nama)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->alamat_ayah)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td width="100px">a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td colspan="2">{{ucwords(strtolower($skk->areaAyah->nama))??'-'}}</td>
                    <td width="75px">c. Kabupaten</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->kotaAyah->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td>b. Kecamatan</td>
                    <td colspan="2">{{ucwords(strtolower($skk->kecamatanAyah->nama))??'-'}}</td>
                    <td>d. Provinsi</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->provinsiAyah->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->kewarganegaraan_ayah)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">7.</td>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->kebangsaan_ayah)??'-'}}</td>
                </tr>

                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>PELAPOR</b></td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">1.</td>
                    <td>NIK</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nik_pelapor)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_pelapor)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Umur</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->umur_pelapor)??'-'}} Tahun</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->jk_pelapor)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pekerjaanPelapor->nama)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->alamat_pelapor)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td width="100px">a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td colspan="2">{{ucwords(strtolower($skk->areaPelapor->nama))??'-'}}</td>
                    <td width="75px">c. Kabupaten</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->kotaPelapor->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td>b. Kecamatan</td>
                    <td colspan="2">{{ucwords(strtolower($skk->kecamatanPelapor->nama))??'-'}}</td>
                    <td>d. Provinsi</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->provinsiPelapor->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>SAKSI I</b></td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">1.</td>
                    <td>NIK</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nik_saksi1)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_saksi1)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Umur</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->umur_saksi1)??'-'}} Tahun</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->jk_saksi1)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pekerjaanSaksi1->nama)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->alamat_saksi1)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td width="100px">a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td colspan="2">{{ucwords(strtolower($skk->areaSaksi1->nama))??'-'}}</td>
                    <td width="75px">c. Kabupaten</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->kotaSaksi1->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td>b. Kecamatan</td>
                    <td colspan="2">{{ucwords(strtolower($skk->kecamatanSaksi1->nama))??'-'}}</td>
                    <td>d. Provinsi</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->provinsiSaksi1->nama))??'-'}}</td>
                </tr>

                <tr>
                    <td colspan="9"
                        style="border-top: 1px #000 solid; border-left: 1px #000 solid; border-right: 1px #000 solid;">
                        <b>SAKSI II</b>
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">1.</td>
                    <td>NIK</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nik_saksi2)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">2.</td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->nama_Saksi2)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">3.</td>
                    <td>Umur</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->umur_saksi2)??'-'}} Tahun</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">4.</td>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{ucfirst($skk->jk_saksi2)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">5.</td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->pekerjaanSaksi2->nama)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;">6.</td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td style="border-right: 1px #000 solid;" colspan="6">{{($skk->alamat_saksi2)??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td width="100px">a. {{($desa->desa->kecamatan->id == '2018110602402')?'Kelurahan':'Desa'}}</td>
                    <td colspan="2">{{ucwords(strtolower($skk->areaSaksi2->nama))??'-'}}</td>
                    <td width="75px">c. Kabupaten</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->kotaSaksi2->nama))??'-'}}</td>
                </tr>
                <tr>
                    <td style="border-left: 1px #000 solid;"></td>
                    <td></td>
                    <td></td>
                    <td>b. Kecamatan</td>
                    <td colspan="2">{{ucwords(strtolower($skk->kecamatanSaksi2->nama))??'-'}}</td>
                    <td>d. Provinsi</td>
                    <td style="border-right: 1px #000 solid;" colspan="2">{{ucwords(strtolower($skk->provinsiSaksi2->nama))??'-'}}</td>
                </tr>

                <tr>
                    <td colspan="9" style="border-top: 1px #000 solid;">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="9">&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td colspan="3"></td>
                    <td colspan="3" class="tengah">{{($desa)?ucwords(strtolower($desa->nama)):ucwords(strtolower($desa->desa->nama))}}, \Carbon\Carbon::parse($skk->finished_date)->translatedFormat('d F Y')</td>
                </tr>
                <tr>
                    <td colspan="3" class="tengah">Mengetahui :<br>{{($desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa'}}<br><br>
                        <span><img src="data:image/png;base64, {!! base64_encode($barcode) !!} " width="100"></span><br><br>
                        ({{($desa->kades)??'-'}})</td>
                    <td colspan="3"></td>
                    <td colspan="3" class="tengah">Pelapor<br><br><br><br><br><br><br><br>({{($skk->nama_pelapor)??'-'}})</td>
                </tr>

            </table>
        </div>
    </div>

</body>

</html>