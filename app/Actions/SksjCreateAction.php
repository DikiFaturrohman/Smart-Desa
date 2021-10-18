<?php
namespace App\Actions;
use App\Models\SKSJ;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SksjCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sksj = SKSJ::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Sapu Jagat Baru oleh '.$sksj->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($sksj,'sksj','Pengajuan','Pengajuan Surat Keterangan Sapu Jagat telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($sksj->id,'sksj');
            \DB::commit();
            return $sksj;
        }catch(\QueryException $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}