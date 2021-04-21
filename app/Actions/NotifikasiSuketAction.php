<?php
namespace App\Actions;
use App\Models\LogSuket;
use App\Models\Notifikasi;
use App\Models\OneSignal;
use App\Actions\OneSignalAction;
use App\Traits\AutoNumber;

class NotifikasiSuketAction {

    use AutoNumber;

    public function run($suket,$jenis_suket,$judul,$konten,$ket,$status)
    {
        try{
            $log = LogSuket::create([
                'id' => $this->generateAutoNumber('ds_suket_log'), 
                'desa_id' => $suket->desa_id,
                'suket_id' => $suket->id,
                'jenis_suket' => $jenis_suket,
                'pesan' => $konten,
                'keterangan' => $ket,
                'status' => $status,
            ]);
    
            $notifikasi = Notifikasi::create([
                'pengguna' => $suket->user_id,
                'judul' => $judul,
                'deskripsi' => $konten,
                'photo' => 'default.jpg',
                'tanggal' => \Carbon\Carbon::now(),
            ]);
    
    
    
            $user = OneSignal::where('iduser',$suket->user_id)->first();
            if(!empty($user)){
    
                $onesignal = (new OneSignalAction)->run($judul,$konten,array($user->idonesignal));
                return $onesignal;
            }
        }catch(\Exception $e){
            return 'Gagal Membuat Data';
        }
    }
}