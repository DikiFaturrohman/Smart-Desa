<?php
namespace App\Actions;
use App\Models\PassphraseLog;

class PassphraseLogAction {

    public function run($admin_id,$keterangan)
    {
        \DB::beginTransaction();
        try{
            $log = PassphraseLog::create([
                'admin_id' => $admin_id,
                'information' => $keterangan,
                'date' => \Carbon\Carbon::now(),
            ]);
            \DB::commit();
            return 'berhasil';
        }catch(\QueryBuilder $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}