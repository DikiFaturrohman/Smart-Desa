<?php
namespace App\Actions;
use App\Models\SKBN;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;
use App\Actions\SkbnDetailUpdateAction;

class SkbnUpdateAction {

    public function run(array $data,$dataDetail)
    {
        \DB::beginTransaction();
        try{
            $skbn = SKBN::find($data['id']);
            $skbn->update($data);

            $skbnDetail = (new SkbnDetailUpdateAction)->run($skbn->id,$dataDetail);

            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skbn->id,'skbn',$skbn->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skbn->id,'skbn');
            \DB::commit();
            return $skbn;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}