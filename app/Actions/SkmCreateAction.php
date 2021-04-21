<?php
namespace App\Actions;
use App\Models\SKM;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkmCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skm = SKM::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Kematian Baru oleh '.$skm->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skm,'skm','Pengajuan','Pengajuan Surat Keterangan Kematian telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skm->id,'skm');
            \DB::commit();
            return $skm;
        }catch(\QueryBuilder $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}