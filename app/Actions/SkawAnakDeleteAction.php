<?php
namespace App\Actions;
use App\Models\SKAWAnak;

class SkawAnakDeleteAction {

    public function run($id)
    {
        \DB::beginTransaction();
        try{
            $result = SKAWAnak::find($id);
            $result->delete();
            \DB::commit();
            return true;
        }catch(\QueryException $e){
            \DB::rollback();
            return false;
        }
    }
}