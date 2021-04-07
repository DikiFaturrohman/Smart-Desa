<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKN;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkspController extends Controller
{
    public function index()
    {
        try{
            return view('frontend.formSurat.sksp');
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
                return view('webview.sksp',$data);
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
                'nik' => 'required|min:16',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'warga_negara' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'status_nikah' => 'required',
                'keperluan' => 'required',
                'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_akta_cerai' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
        

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 mb',
                'min' => ':attribute maksimal :min karakter',
                'mimes' => 'format :attribute salah',
            ];

            $label = [
                'nama' => 'Nama',
                'nik' => 'NIK',
                'tempat_lahir' => 'Tempat Lahir',
                'tgl_lahir' => 'Tanggal Lahir',
                'jk' => 'Jenis Kelamin',
                'warga_negara' => 'Warga Negara',
                'alamat' => 'Alamat',
                'agama' => 'Agama',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_akta_cerai' => 'File Akta Cerai',
                'status_nikah' => 'Status Nikah',
                'keperluan' => 'Keperluan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skn/rtrw');
                $nama_rtrw = 'skn_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skn/ktp');
                $nama_ktp = 'skn_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skn/kk');
                $nama_kk = 'skn_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }

            if($request->file('file_akta_cerai')){
                $akta_cerai = $request->file('file_akta_cerai');
                $destinationPathAc = public_path('backend/images/dokumen/skn/akta_cerai');
                $nama_akta_cerai = 'skn_akta_cerai_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$akta_cerai->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_nikah'),
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
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_akta_cerai' => $nama_akta_cerai,
                'status_perkawinan' => $request->input('status_nikah'),
                'keperluan' => $request->input('keperluan'),
            ];

            $skn = SKN::create($data);

            $log = $this->suketLogNotifikasi($skn,'skn','Pengajuan','Pengajuan Surat Keterangan Status Pernikahan telah berhasil dibuat oleh user','user','terima');
            
            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Status Pernikahan Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skn,$user->no_telpon,'Surat Keterangan Status Pernikahan');
            $generateFile = (new GenerateFileAction)->run($skn->id,'skn');
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$akn,'Surat Keterangan Status Pernikahan'));

            \DB::commit();
            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $akta_cerai->move($destinationPathAc,$nama_akta_cerai);
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Status Pernikahan berhasil di buat','Sukses');
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
                $data['skn'] = SKN::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skspDetail',$data);
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
            $data['sksp'] = SKN::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skspEdit',$data);
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
                $data['sksp'] = SKN::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skspEdit',$data);
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
            
            $sksp = SKN::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'nama' => 'required',
                'nik' => 'required|min:16',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'warga_negara' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'status_nikah' => 'required',
                'keperluan' => 'required',
                'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_akta_cerai' => 'max:1024|mimes:jpeg,jpg,png',
            ];
        

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 mb',
                'min' => ':attribute maksimal :min karakter',
                'mimes' => 'format :attribute salah',
            ];

            $label = [
                'nama' => 'Nama',
                'nik' => 'NIK',
                'tempat_lahir' => 'Tempat Lahir',
                'tgl_lahir' => 'Tanggal Lahir',
                'jk' => 'Jenis Kelamin',
                'warga_negara' => 'Warga Negara',
                'alamat' => 'Alamat',
                'agama' => 'Agama',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_akta_cerai' => 'File Akta Cerai',
                'status_nikah' => 'Status Nikah',
                'keperluan' => 'Keperluan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/skn/rtrw/'.$sksp->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/skn/rtrw/'.$sksp->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skn/rtrw');
                $nama_rtrw = 'skn_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $sksp->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/skn/ktp/'.$sksp->file_ktp)){
                    \File::delete('backend/images/dokumen/skn/ktp/'.$sksp->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skn/ktp');
                $nama_ktp = 'skn_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $sksp->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/skn/kk/'.$sksp->file_kk)){
                    \File::delete('backend/images/dokumen/skn/kk/'.$sksp->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skn/kk');
                $nama_kk = 'skn_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $sksp->file_kk;
            }

            if($request->file('file_akta_cerai')){
                if(\File::exists('backend/images/dokumen/skn/akta_cerai/'.$sksp->file_akta_cerai)){
                    \File::delete('backend/images/dokumen/skn/akta_cerai/'.$sksp->file_akta_cerai);
                }
                $akta_cerai = $request->file('file_akta_cerai');
                $destinationPathAc = public_path('backend/images/dokumen/skn/akta_cerai');
                $nama_akta_cerai = 'skn_akta_cerai_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$akta_cerai->getClientOriginalExtension();
            }else{
                $nama_akta_cerai = $sksp->file_akta_cerai;
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
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_akta_cerai' => $nama_akta_cerai,
                'status_perkawinan' => $request->input('status_nikah'),
                'keperluan' => $request->input('keperluan'),
            ];
            
            $sksp->update($data);

            $log = $this->updateNotifikasi($sksp->id,'skn',$sksp->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skn->id,'skn');

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

            if($request->file('file_akta_cerai')){
                $akta_cerai->move($destinationPathAc,$nama_akta_cerai);
            }
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Status Pernikahan berhasil di perbaharui','Sukses');
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
