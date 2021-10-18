<?php
namespace App\Actions;
use App\Models\SKN;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkspCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $skn = SKN::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Status PErnikahan Baru oleh '.$skn->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skn,'skn','Pengajuan','Pengajuan Surat Keterangan Status PErnikahan telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skn->id,'skn');
            \DB::commit();
            return $skn;
        }catch(\QueryException $e){
            \DB::rollback();
            return 'Gagal Membuat Data';
        }
    }
}