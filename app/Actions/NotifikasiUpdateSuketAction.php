<?php
namespace App\Actions;
use App\Models\LogSuket;
use App\Models\Notifikasi;
use App\Models\OneSignal;
use App\Actions\OneSignalAction;
use App\Models\Admin;

class NotifikasiUpdateSuketAction {

    public function run($suket_id,$jenis,$pesan,$desa_id)
    {
        try{
            $logOperator = LogSuket::where('suket_id',$suket_id)->where('jenis_suket',$jenis)->where('keterangan','operator')->where('status','tolak')->where('desa_id',$desa_id)->delete();

            $logUser = LogSuket::where('suket_id',$suket_id)->where('jenis_suket',$jenis)->where('keterangan','user')->where('desa_id',$desa_id)->first();

            if($logUser){
                $logUser->update(['pesan' => $pesan]);
            }

             $admin = Admin::join('ds_admin_roles','ds_admin_roles.admin_id','=','ds_admins.id')->select('ds_admins.id as admin_id')->where('ds_admin_roles.role_id','operator')->where('ds_admins.desa_id',$desa_id)->first();

            $user = OneSignal::where('iduser',$admin->admin_id)->first();

            if(!empty($user)){
                $judul = 'Pengajuan';
                $onesignal = (new OneSignalAction)->run($judul,$pesan,array($user->idonesignal));
                return $onesignal;
            }   
        }catch(\Exception $e){
            return 'Gagal Membuat Data';
        }
    }
}