<?php
namespace App\Actions;
use App\Models\SKAW;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;
use App\Actions\SkawAnakCreateAction;
use App\Actions\SkawPasanganCreateAction;

class SkawCreateAction {

    public function run(array $data,$dataAnak,$dataPasangan)
    {
        \DB::beginTransaction();
        try{
            $skaw = SKAW::create($data);
            
            $skawAnak = (new SkawAnakCreateAction)->run($skaw->id,$dataAnak);
            $skawPasangan = (new SkawPasanganCreateAction)->run($skaw->id,$dataPasangan);

            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Ahli Waris Baru oleh '.$skaw->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skaw,'skaw','Pengajuan','Pengajuan Surat Keterangan Ahli Waris telah berhasil dibuat oleh user','user','terima');
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