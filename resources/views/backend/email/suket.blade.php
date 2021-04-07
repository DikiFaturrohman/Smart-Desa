<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        html {
            font-family: 'Roboto', sans-serif;
            color: #575756;
            font-weight: 300;
            font-size: 16px;
            /* background-color: #f4f4f4;  */
        }

        .hide {
            display: none;
        }

        .align-center {
            text-align: center;
        }

        h3 {
            font-size: 22px;
            line-height: 1.5;
            margin: 16px 0;
        }

        .email-container {
            /* padding: 16px;
        padding-top: 24px; */
        }

        a {
            color: #ff3e4d;
            text-decoration: none;
        }

        .hide-small a,
        .show-small a {
            padding: 0 3px;
        }

        @media screen and (max-width: 600px) {
            .copyright {
                text-align: center;
                padding-bottom: 12px;
            }

            .hide-small {
                display: none;
            }
        }

        @media screen and (min-width: 601px) {
            .show-small {
                display: none;
            }
        }


        .body-wrapper {
            margin-top: 20px;
            font-size: 14px;
        }

        .text-wrapper {
            margin-bottom: 8px 0;
            color: #656565;
        }


        ._hr {
            border-bottom: 1px solid #d4c8c8;
        }

        .table-head {
            border-collapse: collapse;
        }

        .table-head td {
            border-bottom: 1px solid #CFD8DC;
        }

        .table-detail {
            border-collapse: collapse;
        }

        .table-detail td {
            border-top: 1px solid #CFD8DC;
            ;
            border-bottom: 1px solid #CFD8DC;
            padding: 8px 0;
        }

        .fcolor-primary {
            color: #ff3e4d;
        }

        .forms__litle {
            font-size: 10px;
            line-height: 1.5;
            display: inline-block;
        }

        ._dash {
            border-bottom: 2px dashed #CFD8DC;
        }

        .forms__warning {
            background-color: #FEFCBF;
            padding: 20px 16px;
        }

        .forms__gray {
            background-color: #F6F6F6;
            padding: 20px 16px;
            border-bottom: 4px solid #CFD8DC;
        }

        .forms__discl {
            font-size: 10px;
            padding: 16px 0;
            border-top: 1px solid #CFD8DC;
            text-align: center;
        }

        .footer__wrapper {
            text-align: center;
            padding: 24px 0 20px;
            border-top: 1px solid #CFD8DC;
        }

        .footer__wrapper p {
            color: #D9243E;
            font-size: 12px;
            font-weight: 500;
        }

        .link-btn {
            display: inline-block;
            border: 1px solid;
            font-weight: 700;
            outline: none !important;
            cursor: pointer;
            position: relative;
            backface-visibility: hidden;
            border-radius: 5px;
            text-align: center;
            height: 48px;
            font-size: 16px;
            line-height: 46px;
            color: white !important;
            background-color: #D9243E;
            border-color: #D9243E;
            margin-top: 24px;
            width: 100%;
        }

        ._copy {
            background-color: #D9243E;
            display: inline-block;
            color: white;
            padding: 1px 12px;
            border-radius: 60px;
            cursor: pointer;
        }

        ._copy:focus {
            background-color: rgb(168, 34, 54);
        }

        ._copy:active {
            background-color: rgb(168, 34, 54);
        }
    </style>

</head>

<body width="100%" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; text-align: left;">

        <div style="max-width: 680px; margin: auto;" class="email-container">
            <!-- Start Email Body -->
            <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center"
                width="100%" style="max-width: 680px;border-radius:8px;overflow:hidden">
                <!-- Start Isi -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0"
                            width="100%">
                            <tr>
                                <td style="padding:0 20px; font-size: 16px; line-height: 25px; color: #555555;">
                                    <table width="100%" class="table-head">
                                        <tr>
                                            <td valign="middle">
                                                <!-- <img src="#"
                                                width="15%" style="mix-blend-mode: multiply;margin: 8px 0 0"> -->
                                            </td>
                                            <td style="text-align: right;">Pengajuan Surat</td>
                                        </tr>
                                    </table>

                                    <div class="body-wrapper" style="margin-bottom: 30px">
                                        <div class="text-wrapper">
                                            Halo <b>{{$user->nama_lengkap}}</b>,
                                        </div>
                    
                                        <div class="text-wrapper">
                                            Pengajuan <b>{{$ket}}</b> berhasil dibuat dengan id surat <b>{{$suket->id}}</b>.  untuk melihat progres <a href="{{route('frontend.progress')}}" target="_blank">Klik Disini</a>
                                        </div>
                                        <!-- <div class="forms__discl">
                                            Email ini dibuat secara otomatis. Mohon tidak
                                            mengirimkan balasan ke email ini.
                                        </div>

                                        <div class="forms__discl">
                                        Jika butuh bantuan, gunakan halaman
                                            <a href="https://web.donasi.co/index.php/tentang-kami/"> <strong>Tentang Kami</strong></a>
                                        </div> -->

                                        <div class="footer__wrapper">
                                            <p>copyright©2020 Diskominfo Kabupaten Subang</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- End Isi -->
            </table>
            <!-- End Email Body-->
        </div>
    </center>
</body>

</html>