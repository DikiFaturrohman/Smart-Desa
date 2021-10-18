<?php
namespace App\Actions;
use App\Models\UnggahDokumen;

class UnggahDokumenCreateAction {

    public function run($data)
    {
        \DB::beginTransaction();
        try{
            UnggahDokumen::create($data);
            \DB::commit();
            return true;
        }catch(\QueryException $e){
            \DB::rollback();
            return false;
        }
    }
    
}