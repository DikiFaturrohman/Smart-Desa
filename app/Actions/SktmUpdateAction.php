<?php
namespace App\Actions;
use App\Models\SKTM;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SktmUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sktm = SKTM::find($data['id']);
            $sktm->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($sktm->id,'sktm',$sktm->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sktm->id,'sktm');
            \DB::commit();
            return $sktm;
        }catch(\Exception $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}