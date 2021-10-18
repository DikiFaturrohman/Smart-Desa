<?php
namespace App\Actions;
use App\Models\SKU;
use App\Actions\NotifikasiUpdateSuketAction;
use App\Actions\GenerateFileAction;

class SkuUpdateAction {

    public function run(array $data)
    {
        \DB::beginTransaction();
        try{
            $sku = SKU::find($data['id']);
            $sku->update($data);
            $updateNotif = (new NotifikasiUpdateSuketAction)->run($sku->id,'sku',$sku->user->nama_lengkap.' telah memperbaharui surat yang diajukan',session()->get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sku->id,'sku');
            \DB::commit();
            return $sku;
        }catch(\QueryException $e){
            \DB::rollback();

            return 'Gagal Membuat Data';
        }
    }
}