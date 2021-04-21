<?php
namespace App\Actions;
use App\Models\SKRT;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkrtUpdateAction {

    public function run(array $data,$id)
    {
        \DB::beginTransaction();
        try{
            $skrt = SKRT::find($id);
            $skrt->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skrt->id,'skrt',$skrt->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skrt->id,'skrt');
            \DB::commit();
            return $skrt;
        }catch(\Exception $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}