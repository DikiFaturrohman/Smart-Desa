<?php
namespace App\Actions;
use App\Models\SKRT;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkrtCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skrt = SKRT::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Riwayat Tanah Baru oleh '.$skrt->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skrt,'skrt','Pengajuan','Pengajuan Surat Keterangan Riwayat Tanah telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skrt->id,'skrt');
            \DB::commit();
            return $skrt;
        }catch(\Exception $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}