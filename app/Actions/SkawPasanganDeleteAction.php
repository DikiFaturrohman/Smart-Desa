<?php
namespace App\Actions;
use App\Models\SKAWPasangan;

class SkawPasanganDeleteAction {

    public function run($id)
    {
        \DB::beginTransaction();
        try{
            $result = SKAWPasangan::find($id);
            $result->delete();
            \DB::commit();
            return true;
        }catch(\Exception $e){
            \DB::rollback();
            return false;
        }
    }
}