<?php
namespace App\Actions;
use App\Models\SKU;
use App\Actions\NotifikasiSuketAction;
use App\Actions\NotifikasiAdminAction;
use App\Actions\GetAdminAction;
use App\Actions\GenerateFileAction;

class SkuCreateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sku = SKU::create($data);
            $admin = (new GetAdminAction)->run('operator',session()->get('desa_id'));
            $notifikasiAdmin = (new NotifikasiAdminAction)->run($admin,'Pengajuan','Pengajuan Surat Keterangan Usaha Baru oleh '.$sku->user->nama_lengkap);
            $notifikasiSuket =  (new NotifikasiSuketAction)->run($sku,'sku','Pengajuan','Pengajuan Surat Keterangan Usaha telah berhasil dibuat oleh user','user','terima');
            $generateFile = (new GenerateFileAction)->run($sku->id,'sku');
            \DB::commit();
            return $sku;
        }catch(\QueryException $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}