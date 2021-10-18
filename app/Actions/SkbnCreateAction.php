<?php
namespace App\Actions;
use App\Models\SKBN;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;
use App\Actions\SkbnDetailCreateAction;

class SkbnCreateAction {

    public function run(array $data,$dataDetail)
    {
        \DB::beginTransaction();
        try{
            // dd($data);
            $skbn = SKBN::create($data);
            
            $skbnDetail = (new SkbnDetailCreateAction)->run($skbn->id,$dataDetail);

            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Beda Nama Baru oleh '.$skbn->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($skbn,'skbn','Pengajuan','Pengajuan Surat Keterangan Beda Nama telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($skbn->id,'skbn');
            \DB::commit();
            return $skbn;
        }catch(\QueryException $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}