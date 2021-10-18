<?php
namespace App\Actions;
use App\Models\SKAW;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;
use App\Actions\SkawAnakUpdateAction;
use App\Actions\SkawAPasanganUpdateAction;

class SkawUpdateAction {

    public function run(array $data,$dataAnak,$dataPasangan)
    {
        \DB::beginTransaction();
        try{
            $skaw = SKAW::find($data['id']);
            $skaw->update($data);

            $skawAnak = (new SkawAnakUpdateAction)->run($skaw->id,$dataAnak);
            $skawPasangan = (new SkawPasanganUpdateAction)->run($skaw->id,$dataPasangan);

            $updateNotif = (new NotifikasiUpdateSuketAction)->run($skaw->id,'skaw',$skaw->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skaw->id,'skaw');
            \DB::commit();
            return $skaw;
        }catch(\QueryException $e){
            dd($e->getMessage());
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}