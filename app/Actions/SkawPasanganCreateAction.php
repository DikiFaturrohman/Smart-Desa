<?php
namespace App\Actions;
use App\Models\SKAWPasangan;
use App\Traits\AutoNumber;

class SkawPasanganCreateAction {

    use AutoNumber;
    
    public function run($skaw_id,$pasangan)
    {
        try{
            $id = $pasangan['nama'];
            for($i=0;$i<count($id);$i++){
                if($pasangan['nama'][$i] != null){
                $data = [
                    'id' => $this->generateAutoNumber('ds_skaw_pasangan'),
                    'skaw_id' => $skaw_id,
                    'nama' => $pasangan['nama'][$i], 
                    'tempat_lahir' => $pasangan['tempat_lahir'][$i], 
                    'tgl_lahir' => $pasangan['tgl_lahir'][$i], 
                    'pekerjaan_id' => $pasangan['pekerjaan_id'][$i], 
                    'jk' => $pasangan['jk'][$i], 
                ];

                $result = SKAWPasangan::create($data);
                }
            }
            return true;
        }catch(\QueryException $e){
            return false;
        }
    }
}
