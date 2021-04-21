<?php
namespace App\Actions;
use App\Models\SKK;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkkCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skk = SKK::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Kelahiran Baru oleh '.$skk->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skk,'skk','Pengajuan','Pengajuan Surat Keterangan Kelahiran telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skk->id,'skk');
            \DB::commit();
            return $skk;
        }catch(\QueryBuilder $e){
            dd($e->getMessage());
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}