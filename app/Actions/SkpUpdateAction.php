<?php
namespace App\Actions;
use App\Models\SKP;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkpUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skp = SKP::find($data['id']);
            $skp->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skp->id,'skp',$skp->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skp->id,'skp');
            \DB::commit();
            return $skp;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}