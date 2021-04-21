<?php
namespace App\Actions;
use App\Models\SKM;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkmUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skm = SKM::find($data['id']);
            $skm->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skm->id,'skm',$skm->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skm->id,'skm');
            \DB::commit();
            return $skm;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}