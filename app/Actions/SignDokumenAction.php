<?php
namespace App\Actions;

use App\Actions\DownloadDokumenAction;

class SignDokumenAction {

    public function run($fileId,$tipe,$nik,$passphrase)
    {
        if($tipe == 'skk'){
            $tabel = 'ds_sk_kelahiran';
        }elseif($tipe == 'skm'){
            $tabel = 'ds_sk_kematian';

        }elseif($tipe == 'sku'){
            $tabel = 'ds_sk_usaha';
            
        }elseif($tipe == 'skbn'){
            $tabel = 'ds_sk_beda_nama';
            
        }elseif($tipe == 'sktm'){
            $tabel = 'ds_sktm';
            
        }elseif($tipe == 'skp'){
            $tabel = 'ds_sk_penghasilan';
            
        }elseif($tipe == 'skn'){
            $tabel = 'ds_sk_nikah';
            
        }elseif($tipe == 'skrt'){
            $tabel = 'ds_sk_riwayat_tanah';
            
        }elseif($tipe == 'skaw'){
            $tabel = 'ds_sk_ahli_waris';
            
        }else{
            $tabel = 'ds_sk_sapu_jagat';   
        }
        $dokumen = \DB::table($tabel)->where('id',$fileId)->first();
        if(!empty($dokumen)){
            $result = \App\Models\Dokumen::where('suket_id',$dokumen->id)->where('jenis',$tipe)->first();
            if(!$result){
                return 'Data Dokumen tidak ditemukan';
            }

            $namaFile = $result->dokumen;

            $pathFile = public_path('storage/surat/'.$tipe.'/'.$namaFile);
            $curl = curl_init();
            $post = [
                'file' => curl_file_create($pathFile,'application/pdf'),
                'nik' => $nik,
                'passphrase' => $passphrase,
                'tampilan' => 'invisible',
                'jenis_response' => 'BASE64'
            ];
            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://192.168.18.27/api/sign/pdf",
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
            $resp = json_decode($response);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                if(empty($resp->error)){
                    (new DownloadDokumenAction)->run($resp->id_dokumen,$namaFile,$tipe);
                    return 'berhasil';
                }else{
                    return $resp->error;
                }
                
            }
        }
    }
}