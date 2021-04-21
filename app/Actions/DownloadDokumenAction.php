<?php
namespace App\Actions;

use App\Models\ProfilDesa;
use App\Models\SKN;
use App\Models\SKP;
use App\Models\SKTM;
use App\Models\SKAW;
use App\Models\SKRT;
use App\Models\SKSJ;
use App\Models\SKU;
use App\Models\SKBN;
use App\Models\SKK;
use App\Models\SKM;
use PDF;

class DownloadDokumenAction {

    public function run($id_dokumen,$namaFile,$tipe)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => url_server()."/api/sign/download/".$id_dokumen,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic c21hcnRkZXNhOiFzbWFydGRlc2EyMDIwIw==",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

         if ($err) {
            return "cURL Error #:" . $err;
        } else {
                header('Content-type: application/pdf');
                \Storage::put('surat/'.$tipe.'/'.$namaFile,$response);
         		return 'Dokumen Sukses Disimpan';
         
        }
}
}