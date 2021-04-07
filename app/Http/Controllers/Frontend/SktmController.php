<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKTM;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SktmController extends Controller
{
    public function index()
    {
        try{
            return view('frontend.formSurat.sktm');
        }catch(\Exception $e){
            toastr()->error('Gagal Memuat Halaman','error');
            return back();
        }
    }

    public function indexWebView(Request $request)
    {
        try{
            $user = User::where('api_token',$request->token)->first();
            if(!empty($user)){
            	$data['user']=$user;
                return view('webview.sktm',$data);
            }else{
                toastr()->error('Gagal Memuat Halaman','error');
                return back();
            }
        }catch(\Exception $e){
            toastr()->error('Gagal Memuat Halaman','error');
            return back();
        }
    }

    public function createProccess(Request $request)
    {
        \DB::beginTransaction();
        try{
            if(Auth::guard('masyarakat')->check()){
                $user = User::find(Auth::guard('masyarakat')->user()->id);
            }else{
                $user = User::where('api_token',$request->token)->first();
            }
            
        $rules = [
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'warga_negara' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_orangtua' => 'required|min:6',
            'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/1 mb',
            'mimes' => 'format :attribute salah',
            'min' => ':attribute maksimal :min karakter/digit',
        ];

        $label = [
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'warga_negara' => 'Warga Negara',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'alamat_orangtua' => 'Alamat Orangtua',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File Kartu Keluarga',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sktm/rtrw');
                $nama_rtrw = 'sktm_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sktm/ktp');
                $nama_ktp = 'sktm_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/sktm/kk');
                $nama_kk = 'sktm_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sktm/surat_pernyataan');
                $nama_surat_pernyataan = 'sktm_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sktm'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'jk' => $request->input('jk'),
                'warga_negara' => $request->input('warga_negara'),
                'agama' => $request->input('agama'),
                'alamat' => $request->input('alamat'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'alamat_orangtua' => $request->input('alamat_orangtua'),
                'kota_id_orangtua' => Session::get('kota_id'),
                'kecamatan_id_orangtua' => Session::get('kecamatan_id'),
                'area_id_orangtua' => Session::get('desa_id'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sktm = SKTM::create($data);

            $log = $this->suketLogNotifikasi($sktm,'sktm','Pengajuan','Pengajuan Surat Keterangan Tidak Mampu telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Tidak Mampu Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($sktm,$user->no_telpon,'Surat Keterangan Tidak Mampu');
            $generateFile = (new GenerateFileAction)->run($sktm->id,'sktm');
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$sktm,'Surat Keterangan Tidak Mampu'));

            \DB::commit();

            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Tidak Mampu berhasil di buat','Sukses');
                return redirect()->route('frontend.listprogress');
            }else{
                return view('webview.sukses');
            }
        }catch(\QueryBuilder $e){
            \DB::rollback();
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detailWebView(Request $request)
    {
        try{
            $user = Admin::where('api_token',$request->token)->first();
            if(!empty($user)){
                $data['sktm'] = SKTM::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.sktmDetail',$data);
            }else{
                toastr()->error('Gagal Memuat Halaman','error');
                return back();
            }
        }catch(\Exception $e){
            toastr()->error('Gagal Memuat Halaman','error');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = base64_decode($id);
            $data['sktm'] = SKTM::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.sktmEdit',$data);
        }catch(\Exception $e){
            toastr()->error('Gagal Memuat Halaman','error');
            return back();
        }
    }

    public function editWebView(Request $request)
    {
        try{
            $user = User::where('api_token',$request->token)->first();
            if(!empty($user)){
                $data['sktm'] = SKTM::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.sktmEdit',$data);
            }else{
                toastr()->error('Gagal Memuat Halaman','error');
                return back();
            }
        }catch(\Exception $e){
            toastr()->error('Gagal Memuat Halaman','error');
            return back();
        }
    }

    public function editProccess(Request $request)
    {
        \DB::beginTransaction();
        try{
            if(Auth::guard('masyarakat')->check()){
                $user = User::find(Auth::guard('masyarakat')->user()->id);
            }else{
                $user = User::where('api_token',$request->token)->first();
            }
            
            $sktm = SKTM::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

        $rules = [
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'warga_negara' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_orangtua' => 'required|min:6',
            'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
            'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
            'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/1 mb',
            'mimes' => 'format :attribute salah',
            'min' => ':attribute maksimal :min karakter/digit',
        ];

        $label = [
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'warga_negara' => 'Warga Negara',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'alamat_orangtua' => 'Alamat Orangtua',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File Kartu Keluarga',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sktm/rtrw');
                $nama_rtrw = 'sktm_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $sktm->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp)){
                    \File::delete('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sktm/ktp');
                $nama_ktp = 'sktm_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $sktm->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/sktm/kk/'.$sktm->file_kk)){
                    \File::delete('backend/images/dokumen/sktm/kk/'.$sktm->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/sktm/kk');
                $nama_kk = 'sktm_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $sktm->file_kk;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sktm/surat_pernyataan');
                $nama_surat_pernyataan = 'sktm_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $sktm->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'jk' => $request->input('jk'),
                'warga_negara' => $request->input('warga_negara'),
                'agama' => $request->input('agama'),
                'alamat' => $request->input('alamat'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'nama_ayah' => $request->input('nama_ayah'),
                'nama_ibu' => $request->input('nama_ibu'),
                'alamat_orangtua' => $request->input('alamat_orangtua'),
                'kota_id_orangtua' => Session::get('kota_id'),
                'kecamatan_id_orangtua' => Session::get('kecamatan_id'),
                'area_id_orangtua' => Session::get('desa_id'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sktm->update($data);

            $log = $this->updateNotifikasi($sktm->id,'sktm',$sktm->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sktm->id,'sktm');
            \DB::commit();

            if($request->file('file_sp_rtrw')){
                $rtrw->move($destinationPathRtrw,$nama_rtrw);
            }

            if($request->file('file_ktp')){
                $ktp->move($destinationPathKtp,$nama_ktp);
            }
            if($request->file('file_kk')){
                $kk->move($destinationPathKk,$nama_kk);
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);
            }
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Tidak Mampu berhasil di perbaharui','Sukses');
                return redirect()->route('frontend.listprogress');
            }else{
                return view('webview.sukses');
            }
        }catch(\QueryBuilder $e){
            \DB::rollback();
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
