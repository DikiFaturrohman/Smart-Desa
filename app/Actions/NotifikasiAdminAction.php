<?php
namespace App\Actions;
use App\Models\NotifikasiAdmin;

class NotifikasiAdminAction {

    public function run($admin_id,$judul,$konten)
    {
        try{
            $notifikasi = NotifikasiAdmin::create([
                'admin_id' => $admin_id,
                'judul' => $judul,
                'deskripsi' => $konten,
                'photo' => 'default.jpg',
                'tanggal' => \Carbon\Carbon::now(),
            ]);
        }catch(\Exception $e){
            return 'Gagal Membuat Data';
        }
    }
}