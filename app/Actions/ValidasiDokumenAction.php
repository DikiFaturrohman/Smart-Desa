<?php
namespace App\Actions;

class ValidasiDokumenAction {

    public function run($file,$namaFile)
    {
        $curl = curl_init();
        $post = [
            'signed_file' => curl_file_create($file,'application/pdf',$namaFile),
        ];
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://192.168.18.27/api/sign/verify",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $post,
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic c21hcnRkZXNhOiFzbWFydGRlc2EyMDIwIw==",
            "content-type: multipart/form-data",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }
    
}