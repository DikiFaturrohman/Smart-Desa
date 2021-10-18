<?php
namespace App\Actions;
use App\Models\SKAWAnak;
use App\Traits\AutoNumber;

class SkawAnakCreateAction {

    use AutoNumber;
    
    public function run($skaw_id,$dataDetail)
    {
        try{
            $id = $dataDetail['nama'];
            for($i=0;$i<count($id);$i++){
                if($dataDetail['nama'][$i] != null){
                    $data = [
                        'id' => $this->generateAutoNumber('ds_skaw_anak'),
                        'skaw_id' => $skaw_id,
                        'nama' => $dataDetail['nama'][$i], 
                        'tempat_lahir' => $dataDetail['tempat_lahir'][$i], 
                        'tgl_lahir' => $dataDetail['tgl_lahir'][$i], 
                        'kewarganegaraan' => $dataDetail['kewarganegaraan'][$i], 
                        'alamat' => $dataDetail['alamat'][$i], 
                    ];
    
                    $result = SKAWAnak::create($data);
                }
            }
            return true;
        }catch(\QueryException $e){
            return false;
        }
    }
}