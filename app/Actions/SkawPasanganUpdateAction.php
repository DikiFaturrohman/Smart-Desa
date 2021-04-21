<?php
namespace App\Actions;
use App\Models\SKAWPasangan;
use App\Traits\AutoNumber;

class SkawPasanganUpdateAction {

    use AutoNumber;
    
    public function run($skaw_id,$dataDetail)
    {
        try{
            $id = $dataDetail['nama'];
            for($i=0;$i<count($id)+1;$i++){

                if(!empty($dataDetail['id'][$i])){
                    $result = SKAWPasangan::find($dataDetail['id'][$i]);
                    if($result){
                        $result->update([
                            'skaw_id' => $skaw_id,
                            'nama' => $dataDetail['nama'][$i], 
                            'tempat_lahir' => $dataDetail['tempat_lahir'][$i], 
                            'tgl_lahir' => $dataDetail['tgl_lahir'][$i], 
                            'jk' => $dataDetail['jk'][$i], 
                            'pekerjaan_id' => $dataDetail['pekerjaan_id'][$i], 
                        ]);
                    }
                }elseif(!empty($dataDetail['nama'][$i])){
                    $data = [
                        'id' => $this->generateAutoNumber('ds_skaw_pasangan'),
                        'skaw_id' => $skaw_id,
                        'nama' => $dataDetail['nama'][$i], 
                        'tempat_lahir' => $dataDetail['tempat_lahir'][$i], 
                        'tgl_lahir' => $dataDetail['tgl_lahir'][$i], 
                        'jk' => $dataDetail['jk'][$i], 
                        'pekerjaan_id' => $dataDetail['pekerjaan_id'][$i], 
                    ];
    
                    $result = SKAWPasangan::create($data);
                }
            }
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
}