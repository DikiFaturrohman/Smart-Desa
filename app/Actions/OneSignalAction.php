<?php
namespace App\Actions;
use App\Models\NotifikasiAdmin;

class OneSignalAction {

    public function run($judul,$konten,$player_id)
    {
        try{
            $heading = array("en" => $judul);
            $content = array("en" => $konten);
            $fields = array(
                'app_id' => "29952693-5746-4bb6-a82a-a98606462846",
                'include_player_ids' => $player_id,
                'contents' => $content,
                'headings' => $heading
            );
            $fields = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                    'Authorization: Basic YzQzYTQ3NzUtOTgyYS00ZDRmLWFmNWEtZmM4YjA5Yzc1M2Zj'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            $response = curl_exec($ch);
            curl_close($ch);
            dd($response);
            return $response;

        }catch(\Exception $e){

            return 'Gagal Membuat Data';
        }
    }
}