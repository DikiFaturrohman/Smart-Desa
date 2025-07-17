<?php
  // Menggunakan metode yang aman dari template SKU untuk mencegah eror 'non-object'
  $kec = optional($desa)->kecamatan;
  $kecNama = optional($kec)->nama ?? '[KECAMATAN TIDAK DITEMUKAN]';
  $desaNama = optional($desa)->nama ?? '[DESA TIDAK DITEMUKAN]';
  $isKelurahan = optional($kec)->id === '2018110602402';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SURAT KETERANGAN AHLI WARIS</title>
    
    <style>
        body {
            font-size: 12pt;
            margin-top: 0px;
            padding-top: 0px;
            font-family: 'Times New Roman', Times, serif;
        }
        .halaman {
            position: relative;
            background-color: transparent;
        }
        .footer {
            position: absolute;
            bottom: 5px;
            background-color: transparent;
            width: 100%;
            font-size: 10pt;
            color: #3e3e3e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .tengah {
            text-align: center;
        }
        .tengah-gambar {
            position: absolute;
        }
        .text_content {
            text-indent: 50px;
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
                    <td class="tengah">
                        <img style="margin-top: -1.2em; left: -1.1em; width: 86px; height: 115px;" class="d-flex float-left tengah-gambar" src="assets/img/logo.png">
                        <h1 style="font-size: 17pt; margin-top: -1em;">PEMERINTAH DAERAH KABUPATEN SUBANG</h1>
                        <h1 style="font-size: 18pt; margin-top: -0.5em;">KECAMATAN <?php echo e(strtoupper($kecNama)); ?></h1>
                        <h1 style="font-size: 19pt; margin-top: -0.4em;">KANTOR <?php echo e($isKelurahan ? 'KELURAHAN' : 'DESA'); ?> <?php echo e(strtoupper($desaNama)); ?></h1>
                        <p style="margin-top: -1em; margin-bottom: -0.25em;"><?php echo e(optional($desa)->alamat ?? '-'); ?></p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="isi">
            
            <p class="tengah" style="margin-top: 1.5em;"><b><u>SURAT KETERANGAN AHLI WARIS</u></b></p>
            <p class="tengah" style="margin-top: -1.2em;"><b>Nomor : <?php echo e($skaw->no_surat ?? '..... / ..... / .....'); ?></b></p>

            
            <p class="text_content" style="margin-top: 2em;">
                Yang bertanda tangan di bawah ini, kami para ahli waris dari Almarhum/Almarhumah <?php echo e($skaw->nama_alm); ?>, dengan ini menerangkan dan menyatakan dengan sesungguhnya bahwa:
            </p>

            <table style="width: 100%; margin-left: 50px;">
                 <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;"><b><?php echo e(strtoupper($skaw->nama_alm)); ?></b></td>
                </tr>
                 <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo e(ucfirst($skaw->jk_alm)); ?></td>
                </tr>
                 <tr>
                    <td style="vertical-align: top;">Alamat Terakhir</td>
                    <td style="vertical-align: top;">:</td>
                    <td><?php echo e($skaw->alamat); ?>, <?php echo e($isKelurahan ? 'Kelurahan' : 'Desa'); ?> <?php echo e($desaNama); ?>, Kecamatan <?php echo e($kecNama); ?>, Kabupaten Subang.</td>
                </tr>
                 <tr>
                    <td>Telah meninggal dunia pada</td>
                    <td>:</td>
                    <td>Tanggal <?php echo e(\Carbon\Carbon::parse($skaw->tgl_kematian)->translatedFormat('d F Y')); ?>.</td>
                </tr>
            </table>

            <p class="text_content">
                Semasa hidupnya, Almarhum/Almarhumah pernah menikah secara sah dengan:
            </p>

            <?php if(count($skaw->pasangan) > 0): ?>
                <?php $__currentLoopData = $skaw->pasangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul style="margin-left: 30px;">
                    <li>
                        <b><?php echo e(strtoupper($pasangan->nama)); ?></b> (<?php echo e($pasangan->jk); ?>), lahir di <?php echo e($pasangan->tempat_lahir); ?> pada tanggal <?php echo e(\Carbon\Carbon::parse($pasangan->tgl_lahir)->translatedFormat('d F Y')); ?>.
                    </li>
                </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="tengah">- Tidak ada data pasangan -</p>
            <?php endif; ?>

            <p class="text_content">
                Dari pernikahan tersebut di atas, telah dikaruniai <?php echo e(count($skaw->anak)); ?> orang anak yang merupakan ahli waris yang sah, yaitu:
            </p>

            <table style="width: 100%; margin-left: 50px;">
                <?php $i = 1 ?>
                <?php $__empty_1 = true; $__currentLoopData = $skaw->anak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="width: 5%; vertical-align: top;"><?php echo e($i++); ?>.</td>
                    <td style="width: 95%;">
                        <b><?php echo e(strtoupper($anak->nama)); ?></b>, lahir di <?php echo e($anak->tempat_lahir); ?> tanggal <?php echo e(\Carbon\Carbon::parse($anak->tgl_lahir)->translatedFormat('d F Y')); ?>.
                        <br>Alamat: <?php echo e($anak->alamat); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="2" class="tengah">- Tidak ada data anak/ahli waris -</td></tr>
                <?php endif; ?>
            </table>

             <p class="text_content">
                Selain nama-nama tersebut di atas, tidak ada lagi ahli waris lainnya dari Almarhum/Almarhumah.
            </p>

             <p class="text_content">
                Demikian Surat Keterangan Ahli Waris ini kami buat dengan sebenarnya dalam keadaan sehat jasmani dan rohani tanpa ada paksaan dari pihak manapun. Apabila di kemudian hari surat pernyataan ini tidak benar, maka kami bersedia dituntut sesuai dengan hukum yang berlaku.
            </p>

            
            <br>
            <table style="width:100%;">
                <tr>
                    
                    <td style="width: 50%; vertical-align: top;">
                        <b>Para Ahli Waris:</b>
                        <table style="margin-top: 10px;">
                            <?php $i = 1 ?>
                            <?php $__empty_1 = true; $__currentLoopData = $skaw->anak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td style="width: 10%;"><?php echo e($i++); ?>.</td>
                                <td style="width: 50%;"><?php echo e($anak->nama); ?></td>
                                <td style="width: 40%;">( ................... )</td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td>-</td></tr>
                            <?php endif; ?>
                        </table>
                        <br>
                        <b>Saksi-Saksi:</b>
                        <table style="margin-top: 10px;">
                            <tr>
                                <td style="width: 10%;">1.</td>
                                <td style="width: 50%;"><?php echo e($skaw->nama_saksi1); ?></td>
                                <td style="width: 40%;">( ................... )</td>
                            </tr>
                             <tr>
                                <td style="width: 10%;">2.</td>
                                <td style="width: 50%;"><?php echo e($skaw->nama_saksi2); ?></td>
                                <td style="width: 40%;">( ................... )</td>
                            </tr>
                        </table>
                    </td>
                    
                    <td style="width: 50%; text-align:center; vertical-align: top;">
                         Subang, <?php echo e(\Carbon\Carbon::parse($skaw->finished_date)->translatedFormat('d F Y')); ?><br>
                         Disaksikan dan dibenarkan oleh kami:<br>
                         <b><?php echo e($isKelurahan ? 'LURAH' : 'KEPALA DESA'); ?> <?php echo e(strtoupper($desaNama)); ?></b>
                         <br><br>
                         <img src="data:image/png;base64, <?php echo base64_encode($barcode); ?>" width="100">
                         <br><br>
                         <b><u><?php echo e(optional($desa)->kades); ?></u></b>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2" class="tengah" style="padding-top: 30px;">
                        Dikuatkan oleh:<br>
                        <b>CAMAT <?php echo e(strtoupper($kecNama)); ?></b>
                        <br><br><br><br><br><br>
                        <b><u>..............................</u></b>
                    </td>
                </tr>
            </table>
        </div>

        
        <div class="footer">
            <table>
                <tr>
                    <td style="width:10%"><img src="data:image/png;base64, <?php echo base64_encode($barcode); ?>" height="45px"></td>
                    <td style="width:90%">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik, Badan Siber dan Sandi Negara. Tidak perlu ditandatangani lagi secara fisik oleh pihak terkait. Cek keabsahan dokumen melalui aplikasi VeryDS diplaystore atau kunjungi https://bsre.bssn.go.id/verifikasi</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\smartdesa\resources\views/backend/pdf/skaw.blade.php ENDPATH**/ ?>