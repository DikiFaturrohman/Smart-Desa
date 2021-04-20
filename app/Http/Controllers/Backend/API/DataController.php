<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\DownloadDokumenAction;
use App\Models\Desa;
use App\Models\User;
use App\Models\Admin;
use Str;
use Validator;
use Auth;
use DB;

class DataController extends Controller
{
    public function getDesa(Request $request)
    {
        try{
            $desa = Desa::join('ds_kecamatan','ds_kecamatan.id','=','ds_desa.kecamatan_id')->where('ds_desa.kota_id',20190101173)->get(['ds_desa.id as id','ds_desa.nama as nama_desa','ds_kecamatan.nama as nama_kecamatan']);

            $desas = [];

            foreach($desa as $data){
                $dataDesa['id'] = $data->id;
                $dataDesa['nama'] = ucfirst(strtolower($data->nama_desa)).' - '.ucfirst(strtolower($data->nama_kecamatan));
                $desas[] = $dataDesa;
            }
            return response()->json([
                'status' =>true,
                'data' => $desas
            ]);
            
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }
    public function cekApps(Request $request)
    {
        try{

            $user = User::where('api_token',$request->user()->api_token)->first();
            if(empty($user)){
                $data= [
                    'judul' => '',
                    'pesan'=> "",
                   'url'=> "",
                   'image'=>""
                ];
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan',
                ]);
            }else{
                $data= [
                    'judul' => '',
                    'pesan'=> "",
                   'url'=> "",
                   'image'=>""
                ];

                return response()->json([
                    'status' => false,
                    'data' => $data,
                ]);
            }
            return response()->json([
                'status' =>true,
                'data' => $request->user()->api_token
            ]);
            
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }
    public function cekAppsAdmin(Request $request)
    {
        try{

            $user = Admin::where('api_token',$request->user()->api_token)->first();
            if(empty($user)){
                $data= [
                    'judul' => '',
                    'pesan'=> "",
                    'url'=> "",
                    'image'=>""
                ];
                return response()->json([
                    'status' => false,
                    'message' => 'Data Admin tidak ditemukan',
                ]);
            }else{
                $data= [
                    'judul' => '',
                    'pesan'=> "",
                    'url'=> "",
                    'image'=>""
                ];

                return response()->json([
                    'status' => false,
                    'data' => $data,
                ]);
            }
            return response()->json([
                'status' =>true,
                'data' => $request->user()->api_token
            ]);
            
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }
    public function beranda(Request $request)
    {
        try{
            $invalid = [
                'status' => false,
                'message' => 'Gagal Memuat halaman, silahkan coba kembali',
            ];
            $user = Admin::where('api_token',$request->user()->api_token)->first();
            
            if(empty($user)){
                return response()->json($invalid);
            }else{
                $profile = [
                    'username' => $user->username,
                    'name' => $user->name,
                    'role' => $user->roles->first()->name,
                    'desa' => $user->desa->nama,
                    'kecamatan' => $user->desa->kecamatan->nama,
                    'header' => asset('backend/icon/header-1.jpeg')
                ];

                $data= [
                   'profile' => $profile,
                   'menu' => array(
                    array(
                        'id' => 1,
                        'nama' => 'Surat Keterangan Kelahiran',
                        'icon' => asset('backend/icon/001_SKLahir.png'),
                        'url' => route('frontend.webview.skl').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_kelahiran',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 2,
                        'nama' => 'Surat Keterangan Kematian',
                        'icon' => asset('backend/icon/006_SKMati.png'),
                        'url' => route('frontend.webview.skm').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_kematian',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 3,
                        'nama' => 'Surat Keterangan Usaha',
                        'icon' => asset('backend/icon/002-SKUsaha.png'),
                        'url' => route('frontend.webview.sku').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_usaha',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 4,
                        'nama' => 'Surat Keterangan Beda Nama',
                        'icon' => asset('backend/icon/007-SKNama.png'),
                        'url' => route('frontend.webview.skbn').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_beda_nama',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 5,
                        'nama' => 'Surat Keterangan Tidak Mampu',
                        'icon' => asset('backend/icon/003_SKMiskin.png'),
                        'url' => route('frontend.webview.sktm').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sktm',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 6,
                        'nama' => 'Surat Keterangan Penghasilan',
                        'icon' => asset('backend/icon/008_SKPenghasilan.png'),
                        'url' => route('frontend.webview.skp').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_penghasilan',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 7,
                        'nama' => 'Surat Keterangan Status Pernikahan',
                        'icon' => asset('backend/icon/004-SKNikah.png'),
                        'url' => route('frontend.webview.sksp').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_nikah',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 8,
                        'nama' => 'Surat Keterangan Riwayat Tanah',
                        'icon' => asset('backend/icon/009-SKTanah.png'),
                        'url' => route('frontend.webview.skrt').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_riwayat_tanah',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 9,
                        'nama' => 'Surat Keterangan Ahli Waris',
                        'icon' => asset('backend/icon/005_SKAhliWaris.png'),
                        'url' => route('frontend.webview.skaw').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_ahli_waris',$user->desa_id,$user->roles->first()->id))
                    ), array(
                        'id' => 10,
                        'nama' => 'Surat Keterangan Lain',
                        'icon' => asset('backend/icon/010-SKLainnya.png'),
                        'url' => route('frontend.webview.sksj').'?token=' . $user->api_token,
                        'surat_count' => count($this->listSurat('ds_sk_sapu_jagat',$user->desa_id,$user->roles->first()->id))
                    )

                )
                ];

                return response()->json([
                    'status' => true,
                    'data' => $data,
                ]);
            }
            return response()->json([
                'status' =>true,
                'data' => $request->user()->api_token
            ]);
            
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }

    private function listSurat($tabel,$desa_id,$role)
    {
        if($role == 'operator'){
            $kasi = ['verifikasi_kasi' => '0'];
            $sekdes = ['verifikasi_sekdes' => '0'];
            $kades = ['verifikasi_kades' => '0'];
        }elseif($role == 'kasi'){
            $kasi = ['verifikasi_kasi' => '0'];
            $sekdes = ['verifikasi_sekdes' => '0'];
            $kades = ['verifikasi_kades' => '0'];
        }elseif($role == 'sekretaris_desa'){
            $kasi = ['verifikasi_kasi' => '1'];
            $sekdes = ['verifikasi_sekdes' => '0'];
            $kades = ['verifikasi_kades' => '0'];
        }elseif($role == 'kepala_desa'){
            $kasi = ['verifikasi_kasi' => '1'];
            $sekdes = ['verifikasi_sekdes' => '1'];
            $kades = ['verifikasi_kades' => '0'];
        }

        if($role == 'operator'){
            $surat = DB::table($tabel)->where('desa_id',$desa_id)->where('no_surat',null)->where($kasi)->where($sekdes)->where($kades)->orderBy('created_at','asc')->get();
        }else{
            $surat = DB::table($tabel)->where('desa_id',$desa_id)->where('no_surat','!=',null)->where($kasi)->where($sekdes)->where($kades)->orderBy('created_at','asc')->get();
        }
        
        return $surat;
    }

    public function getListSuratBaru(Request $request)
    {
        $admin = Admin::where('api_token',$request->user()->api_token)->first();
        if($request->id == 1){
            $tabel = 'ds_sk_kelahiran';
            $jenis = 'Surat Keterangan Kelahiran';
            $jenis_surat = 'skl';
            $route = route('frontend.webview.skl.detail');
        }elseif($request->id == 2){
            $tabel = 'ds_sk_kematian';
            $jenis = 'Surat Keterangan Kematian';
            $route = route('frontend.webview.skm.detail');
            $jenis_surat = 'skm';

        }elseif($request->id == 3){
            $tabel = 'ds_sk_usaha';
            $jenis = 'Surat Keterangan Usaha';
            $route = route('frontend.webview.sku.detail');
            $jenis_surat = 'sku';
            
        }elseif($request->id == 4){
            $tabel = 'ds_sk_beda_nama';
            $jenis = 'Surat Keterangan Beda Nama';
            $route = route('frontend.webview.skbn.detail');
            $jenis_surat = 'skbn';
            
        }elseif($request->id == 5){
            $tabel = 'ds_sktm';
            $jenis = 'Surat Keterangan Tidak Mampu';
            $route = route('frontend.webview.sktm.detail');
            $jenis_surat = 'sktm';
            
        }elseif($request->id == 6){
            $tabel = 'ds_sk_penghasilan';
            $jenis = 'Surat Keterangan Penghasilan';
            $route = route('frontend.webview.skp.detail');
            $jenis_surat = 'skp';
            
        }elseif($request->id == 7){
            $tabel = 'ds_sk_nikah';
            $jenis = 'Surat Keterangan Status Pernikahan';
            $route = route('frontend.webview.sksp.detail');
            $jenis_surat = 'sksp';
            
        }elseif($request->id == 8){
            $tabel = 'ds_sk_riwayat_tanah';
            $jenis = 'Surat Keterangan Riwayat Tanah';
            $route = route('frontend.webview.skrt.detail');
            $jenis_surat = 'skrt';
            
        }elseif($request->id == 9){
            $tabel = 'ds_sk_ahli_waris';
            $jenis = 'Surat Keterangan Ahli Waris';
            $route = route('frontend.webview.skaw.detail');
            $jenis_surat = 'skaw';
            
        }else{
            $tabel = 'ds_sk_sapu_jagat';
            $jenis = 'Surat Keterangan Sapu Jagat';
            $route = route('frontend.webview.sksj.detail');
            $jenis_surat = 'sksj';
            
        }
        $surat = $this->listSurat($tabel,$admin->desa_id,$admin->roles()->first()->id);
        if(count($surat) > 0){
            foreach($surat as $data){
                $user = User::where('id',$data->user_id)->first();
                $desa = Desa::where('id',$data->desa_id)->first();
                if($admin->roles()->first()->id == 'operator'){
                    $kasi = Admin::select('ds_admins.id as id_kasi','ds_admins.name as nama_kasi')->join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','kasi')->where('desa_id',$data->desa_id)->get();
                }else{
                    $kasi = [];
                }
                $result[] = [
                    'jenis' => $jenis,
                    'jenis_surat' => $jenis_surat,
                    'id_pengajuan' => $data->id,
                    'no_surat' => $data->no_surat,
                    'tanggal_pengajuan' => $data->created_at,
                    'url' => $route.'?id='.$data->id.'&token='.$admin->api_token,
                    'nik_pemohon' => $user->nik,
                    'nama_pemohon' => $user->nama_lengkap,
                    'no_telpon_pemohon' => $user->no_telpon,
                    'tgl_lahir_pemohon' => $user->tgl_lahir,
                    'jk' => $user->jenis_kelamin,
                    'desa' => $desa->nama,
                    'alamat' => $user->alamat,
                    'kasi' => $kasi,
                ];
                $response = [
                    'status' => true,
                    'data' => $result
                ];
            }
           
            return response()->json($response);
        }else{
            $response = [
                'status' => true,
                'data' => array()
            ];

            return response()->json($response);
        }
    }

	public function upload(Request $request)
    {
    	try{

            header('Content-type: application/pdf');
            \Storage::put('surat/'.$request->tipe.'/'.$request->nama,$request->dokumen);
            return response()->json([
                'status' => true,
                'data' => '',
                'message' => 'Dokumen berhasil disimpan'
            ]);
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'message' => $e->getMessage()
            ]);
        }
    }
}
