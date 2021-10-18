<?php
namespace App\Actions;
use App\Models\SKBNDetail;
use App\Traits\AutoNumber;

class SkbnDetailCreateAction {

    use AutoNumber;
    
    public function run($skbn_id,$dataDetail)
    {
        try{
           foreach($dataDetail as $data)
           {
               SKBNDetail::create([
                    'id' => $this->generateAutoNumber('ds_skbn_detail'),
                   'skbn_id' => $skbn_id,
                   'jenis_dok' => $data['jenis_dok'],
                   'nomor_dok' => $data['nomor_dok'],
                   'nama_dok' => $data['nama_dok'],
               ]);
           }
            return true;
        }catch(\QueryException $e){
            return false;
        }
    }
}