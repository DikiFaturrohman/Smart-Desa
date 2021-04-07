<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\User;
use App\Models\Admin;
use Str;
use Validator;
use Auth;
use DB;
use Session;

class VerifikasiController extends Controller
{
    
    public function verifikasiSurat(Request $request)
    {
        $data = [
            'status' => false,
            'message' => 'Gagal Memuat Data'
        ];
        if(count($request->all()) < 6){
           return response()->json($data);
        }else{
            $admin = Admin::where('api_token',$request->user()->api_token)->first();
            $cekSurat = $this->cekJenisSurat($request->id_pengajuan,$request->jenis_surat);
            $surat = $cekSurat->first();
            if(empty($surat)){
                return response()->json($data);
            }else{
            if($admin->roles()->first()->id == 'kepala_desa'){
                $data = [
                    'no_surat' => $surat->no_surat,
                    'kasi_id' => $surat->kasi_id,
                    'verifikasi_kasi' => $surat->verifikasi_kasi,
                    'verifikasi_sekdes' => $surat->verifikasi_sekdes,
                    'verifikasi_kades' => '1',
                    'status' => '0'
                ];
            }elseif($admin->roles()->first()->id == 'sekretaris_desa'){
                $data = [
                    'no_surat' => $surat->no_surat,
                    'kasi_id' => $surat->kasi_id,
                    'verifikasi_kasi' => $surat->verifikasi_kasi,
                    'verifikasi_sekdes' => '1',
                    'verifikasi_kades' => '0'
                ];
            }elseif($admin->roles()->first()->id == 'kasi'){
                $data = [
                    'no_surat' => $surat->no_surat,
                    'kasi_id' => $surat->kasi_id,
                    'verifikasi_kasi' => '1',
                    'verifikasi_sekdes' => '0',
                    'verifikasi_kades' => '0'
                ];
            }else{
                $data = [
                    'no_surat' => $request->no_surat,
                    'kasi_id' => $request->id_kasi,
                    'verifikasi_kasi' => '0',
                    'verifikasi_sekdes' => '0',
                    'verifikasi_kades' => '0'
                ];
            }
    
            if($request->verif == 'tolak'){
                $this->suketLogNotifikasi($surat,$request->jenis_surat,'Penolakan',$request->pesan,'operator','tolak');
                
                $data = [
                    'status' => true,
                    'message' => 'Berhasil melakukan penolakan, surat dikembalikan ke pemohon'
                ];
    
            }elseif($request->verif == 'terima'){
                if($admin->roles()->first()->id == 'kasi'){
                    $getAdmin = $this->getAdmin('sekretaris_desa',Session::get('desa_id'));
                    $user = 'kasi';
                    $verifikator = 'Sekretaris';
                }elseif($admin->roles()->first()->id == 'sekretaris_desa'){
                    $getAdmin = $this->getAdmin('kepala_desa',Session::get('desa_id'));
                    $user = 'sekdes';
                    $verifikator = 'Kepala';
                }elseif($admin->roles()->first()->id == 'kepala_desa'){
                    $getAdmin = $this->getAdmin('operator',Session::get('desa_id'));
                    $user = 'kades';
                    $verifikator = 'Operator';
                }else{
                    $user = 'operator';
                    $getAdmin = $request->id_kasi;
                    $verifikator = 'Kasi';
                }
    
                $cekSurat->update($data);
                $this->suketLogNotifikasi($surat,$request->jenis_surat,'Verifikasi','Pengajuan Surat telah di verifikasi Oleh '.$admin->roles()->first()->name,$user,'terima');
                $logAdmin = $this->logNotifikasiAdmin($getAdmin,'Verifikasi','Verifikasi Surat disetujui oleh '.$admin->roles()->first()->name);
    
                $data = [
                    'status' => true,
                    'message' => 'Berhasil melakukan verifikasi, surat dilanjutkan ke '.$verifikator.' Desa'
                ];
    
            }else{
                
            }
    
            return response()->json($data);
            }
        }
        

    }

    public function cekJenisSurat($suket_id,$jenis_surat)
    {
        if($jenis_surat == 'skbn'){
            $tabel = 'ds_sk_beda_nama';
        }elseif($jenis_surat == 'skm'){
            $tabel = 'ds_sk_kematian';

        }elseif($jenis_surat == 'skl'){
            $tabel = 'ds_sk_kelahiran';
            
        }elseif($jenis_surat == 'sksp'){
            $tabel = 'ds_sk_nikah';
            
        }elseif($jenis_surat == 'skp'){
            $tabel = 'ds_sk_penghasilan';
            
        }elseif($jenis_surat == 'skaw'){
            $tabel = 'ds_sk_ahli_waris';
            
        }elseif($jenis_surat == 'skrt'){
            $tabel = 'ds_sk_riwayat_tanah';
            
        }elseif($jenis_surat == 'sku'){
            $tabel = 'ds_sk_usaha';
            
        }elseif($jenis_surat == 'sktm'){
            $tabel = 'ds_sktm';
            
        }else{
            $tabel = 'ds_sk_sapu_jagat';
            
        }

        $surat = DB::table($tabel)->where('id',$suket_id)->where('desa_id',Session::get('desa_id'))->where('status','1')->limit(1);

        return $surat;
    }
}
