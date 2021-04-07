<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKP;
use App\Models\Pekerjaan;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkpController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::get();
            return view('frontend.formSurat.skp',$data);
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
                return view('webview.skp',$data);
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
                'nominal' => 'required',
                'jumlah_tanggungan' => 'required',
                'jk' => 'required',
                'pekerjaan_id' => 'required',
                'alamat' => 'required',
                'file_slip_gaji' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/ 1 mb',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'nama' => 'Nama',
                'nik' => 'NIK',
                'tempat_lahir' => 'Tempat Lahir',
                'tgl_lahir' => 'Tanggal Lahir',
                'jk' => 'Jenis Kelamin',
                'pekerjaan_id' => 'Pekerjaan',
                'nominal' => 'Jumlah Gaji',
                'jumlah_tanggungan' => 'Jumlah Orang yang di tanggung',
                'alamat' => 'Alamat',
                'file_slip_gaji' => 'File Slip Gaji',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_slip_gaji')){
                $slip_gaji = $request->file('file_slip_gaji');
                $destinationPathSg = public_path('backend/images/dokumen/skp/slip_gaji');
                $nama_slip_gaji = 'skp_slip_gaji'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$slip_gaji->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skp/ktp');
                $nama_ktp = 'skp_ktp'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skp/kk');
                $nama_kk = 'skp_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skp/surat_pernyataan');
                $nama_surat_pernyataan = 'skp_surat_pernyataan'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_penghasilan'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'gaji' => $request->input('nominal'),
                'jumlah_tanggungan' => $request->input('jumlah_tanggungan'),
                'alamat' => $request->input('alamat'),
                'jk' => $request->input('jk'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'slip_gaji' => $nama_slip_gaji,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $skp = SKP::create($data);

            $log = $this->suketLogNotifikasi($skp,'skp','Pengajuan','Pengajuan Surat Keterangan Penghasilan telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Penghasilan Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skp,$user->no_telpon,'Surat Keterangan Penghasilan');
            $generateFile = (new GenerateFileAction)->run($skp->id,'skp');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skp,'Surat Keterangan Penghasilan'));
            \DB::commit();

            $slip_gaji->move($destinationPathSg,$nama_slip_gaji);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Penghasilan berhasil di buat','Sukses');
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
                $data['skp'] = SKP::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skpDetail',$data);
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
            $data['skp'] = SKP::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skpEdit',$data);
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
                $data['skp'] = SKP::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skpEdit',$data);
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
            
            $skp = SKP::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'nama' => 'required',
                'nik' => 'required|min:16',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'nominal' => 'required',
                'jumlah_tanggungan' => 'required',
                'jk' => 'required',
                'pekerjaan_id' => 'required',
                'alamat' => 'required',
                'file_slip_gaji' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/ 1 mb',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'nama' => 'Nama',
                'nik' => 'NIK',
                'tempat_lahir' => 'Tempat Lahir',
                'tgl_lahir' => 'Tanggal Lahir',
                'jk' => 'Jenis Kelamin',
                'pekerjaan_id' => 'Pekerjaan',
                'nominal' => 'Jumlah Gaji',
                'jumlah_tanggungan' => 'Jumlah Orang yang di tanggung',
                'alamat' => 'Alamat',
                'file_slip_gaji' => 'File Slip Gaji',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_slip_gaji')){
                if(\File::exists('backend/images/dokumen/skp/slip_gaji/'.$skp->slip_gaji)){
                    \File::delete('backend/images/dokumen/skp/slip_gaji/'.$skp->slip_gaji);
                }
                $slip_gaji = $request->file('file_slip_gaji');
                $destinationPathSg = public_path('backend/images/dokumen/skp/slip_gaji');
                $nama_slip_gaji = 'skp_slip_gaji'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$slip_gaji->getClientOriginalExtension();
            }else{
                $nama_slip_gaji = $skp->slip_gaji;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/skp/ktp/'.$skp->file_ktp)){
                    \File::delete('backend/images/dokumen/skp/ktp/'.$skp->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skp/ktp');
                $nama_ktp = 'skp_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $skp->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/skp/kk/'.$skp->file_kk)){
                    \File::delete('backend/images/dokumen/skp/kk/'.$skp->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skp/kk');
                $nama_kk = 'skp_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $skp->file_kk;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/skp/surat_pernyataan/'.$skp->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/skp/surat_pernyataan/'.$skp->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skp/surat_pernyataan');
                $nama_surat_pernyataan = 'skp_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $skp->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'gaji' => $request->input('nominal'),
                'jumlah_tanggungan' => $request->input('jumlah_tanggungan'),
                'alamat' => $request->input('alamat'),
                'jk' => $request->input('jk'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'slip_gaji' => $nama_slip_gaji,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $skp->update($data);

            $log = $this->updateNotifikasi($skp->id,'skp',$skp->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skp->id,'skp');

            \DB::commit();
            if($request->file('file_slip_gaji')){
                $slip_gaji->move($destinationPathSg,$nama_slip_gaji);
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
                toastr()->success('Pengajuan Surat Keterangan Penghasilan berhasil di perbaharui','Sukses');
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
