<?php
namespace App\Actions;
use App\Models\SKSJ;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SksjUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sksj = SKSJ::find($data['id']);
            $sksj->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($sksj->id,'sksj',$sksj->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sksj->id,'sksj');
            \DB::commit();
            return $sksj;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}