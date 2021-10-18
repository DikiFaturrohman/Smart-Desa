<?php
namespace App\Actions;
use App\Models\SKBNDetail;

class SkbnDetailUpdateAction {

    public function run($skbn_id,$dataDetail)
    {
        try{
           foreach($dataDetail as $data)
           {
               $skbn = SKBNDetail::find($data['id']);
               $skbn->update([
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