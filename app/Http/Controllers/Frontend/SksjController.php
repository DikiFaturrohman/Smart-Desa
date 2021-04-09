<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKSJ;
use App\Models\Pekerjaan;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SksjController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::get();
            return view('frontend.formSurat.sksj',$data);
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
                $data['pekerjaan'] = Pekerjaan::get();

                return view('webview.sksj',$data);
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
                'umur' => 'required',
                'pekerjaan_id' => 'required',
                'nik' => 'required|min:16',
                'tgl_menetap' => 'required',
                'keperluan' => 'required',
                'alamat' => 'required|min:6',
                'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
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
                'umur' => 'Umur',
                'pekerjaan_id' => 'Pekerjaan',
                'keperluan' => 'Keperluan',
                'nik' => 'KTP/SIM',
                'tgl_menetap' => 'Mulai Menetap',
                'alamat' => 'Alamat',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sksj/rtrw');
                $nama_rtrw = 'sksj_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sksj/ktp');
                $nama_ktp = 'sksj_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sksj/surat_pernyataan');
                $nama_surat_pernyataan = 'sksj_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_sapu_jagat'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama_penduduk' => $request->input('nama'),
                'umur' => $request->input('umur'),
                'no_nik' => $request->input('nik'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'alamat_kantor' => $request->input('alamat'),
                'keperluan' => $request->input('keperluan'),
                'tgl_menetap' => $request->input('tgl_menetap'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sksj = SKSJ::create($data);

            $log = $this->suketLogNotifikasi($sksj,'sksj','Pengajuan','Pengajuan Surat Keterangan Sapu Jagat telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Sapu Jagat Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($sksj,$user->no_telpon,'Surat Keterangan Sapu Jagat');
            $generateFile = (new GenerateFileAction)->run($sksj->id,'sksj');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$sksj,'Surat Keterangan Sapu Jagat'));

            \DB::commit();

            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Sapu Jagat berhasil di buat','Sukses');
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
                $data['pekerjaan'] = Pekerjaan::all();
                $data['sksj'] = SKSJ::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.sksjDetail',$data);
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
            $data['pekerjaan'] = Pekerjaan::all();
            $data['sksj'] = SKSJ::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.sksjEdit',$data);
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
                $data['pekerjaan'] = Pekerjaan::all();
                $data['sksj'] = SKSJ::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.sksjEdit',$data);
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
            
            $sksj = SKSJ::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'nama' => 'required',
                'umur' => 'required',
                'pekerjaan_id' => 'required',
                'nik' => 'required|min:16',
                'tgl_menetap' => 'required',
                'keperluan' => 'required',
                'alamat' => 'required|min:6',
                'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
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
                'umur' => 'Umur',
                'pekerjaan_id' => 'Pekerjaan',
                'keperluan' => 'Keperluan',
                'nik' => 'KTP/SIM',
                'tgl_menetap' => 'Mulai Menetap',
                'alamat' => 'Alamat',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/sksj/rtrw/'.$sksj->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/sksj/rtrw/'.$sksj->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sksj/rtrw');
                $nama_rtrw = 'sksj_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $sksj->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/sksj/ktp/'.$sksj->file_ktp)){
                    \File::delete('backend/images/dokumen/sksj/ktp/'.$sksj->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sksj/ktp');
                $nama_ktp = 'sksj_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $sksj->file_ktp;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/sksj/surat_pernyataan/'.$sksj->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/sksj/surat_pernyataan/'.$sksj->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sksj/surat_pernyataan');
                $nama_surat_pernyataan = 'sksj_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $sksj->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'nama_penduduk' => $request->input('nama'),
                'umur' => $request->input('umur'),
                'no_nik' => $request->input('nik'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'alamat_kantor' => $request->input('alamat'),
                'keperluan' => $request->input('keperluan'),
                'tgl_menetap' => $request->input('tgl_menetap'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sksj->update($data);

            $log = $this->updateNotifikasi($sksj->id,'sksj',$sksj->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sksj->id,'sksj');

            \DB::commit();

            if($request->file('file_sp_rtrw')){
                $rtrw->move($destinationPathRtrw,$nama_rtrw);
            }

            if($request->file('file_ktp')){
                $ktp->move($destinationPathKtp,$nama_ktp);
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);
            }

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Sapu Jagat berhasil di buat','Sukses');
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
