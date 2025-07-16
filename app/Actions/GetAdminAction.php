<?php
namespace App\Actions;
use App\Models\Admin;

class GetAdminAction {

    public function run($role,$desa_id)
    {
        $admin = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')
                    ->select('ds_admins.id as id')
                    ->where('ds_admins.desa_id',$desa_id)
                    ->where('ds_admin_roles.role_id',$role)->first();
        if (! $admin) {
        // Pilihannya:  
        // a) Throw exception agar langsung ketahuan
            throw new \Exception("Admin role {$role} di desa {$desa_id} tidak ditemukan");
        // b) Atau return null dan skip notifikasi di caller
        // return null;
        }
        return $admin->id;
    }

}