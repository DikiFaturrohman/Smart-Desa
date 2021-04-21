<?php
namespace App\Actions;
use App\Models\SKP;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkpCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skp = SKP::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Penghasilan Baru oleh '.$skp->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skp,'skp','Pengajuan','Pengajuan Surat Keterangan Penghasilan telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skp->id,'skp');
            \DB::commit();
            return $skp;
        }catch(\Exception $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}