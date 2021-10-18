<?php
namespace App\Actions;
use App\Models\UnggahDokumen;

class UnggahDokumenUpdateAction {

    public function run($data,$id)
    {
        \DB::beginTransaction();
        try{
            $result = UnggahDokumen::find($id);
            $result->update($data);
            \DB::commit();
            return true;
        }catch(\QueryException $e){
            \DB::rollback();
            return false;
        }
    }
    
}