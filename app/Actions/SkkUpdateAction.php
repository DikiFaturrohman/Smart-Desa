<?php
namespace App\Actions;
use App\Models\SKK;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkkUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skk = SKK::find($data['id']);
            $skk->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skk->id,'skk',$skk->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skk->id,'skk');
            \DB::commit();
            return $skk;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}