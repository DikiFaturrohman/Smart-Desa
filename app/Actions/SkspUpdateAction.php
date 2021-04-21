<?php
namespace App\Actions;
use App\Models\SKN;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkspUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skn = SKN::find($data['id']);
            $skn->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skn->id,'skn',$skn->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skn->id,'skn');
            \DB::commit();
            return $skn;
        }catch(\Exception $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}