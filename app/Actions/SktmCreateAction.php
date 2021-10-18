<?php
namespace App\Actions;
use App\Models\SKTM;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SktmCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sktm = SKTM::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Tidak Mampu Baru oleh '.$sktm->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($sktm,'sktm','Pengajuan','Pengajuan Surat Keterangan Tidak Mampu telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($sktm->id,'sktm');
            \DB::commit();
            return $sktm;
        }catch(\QueryException $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}