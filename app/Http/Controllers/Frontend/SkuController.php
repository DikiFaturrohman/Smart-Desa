<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\Admin;
use App\Models\SKU;
use App\Models\LogSuket;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkuController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::all();
            return view('frontend.formSurat.sku',$data);
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
                $data['pekerjaan'] = Pekerjaan::all();
                return view('webview.sku',$data);
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
                'pekerjaan_id' => 'required',
                'jenis_usaha' => 'required',
                'alamat' => 'required',
                'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
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
                'jenis_usaha' => 'Jenis Usaha',
                'alamat' => 'Alamat',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sku/rtrw');
                $nama_rtrw = 'sku_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
                
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sku/ktp');
                $nama_ktp = 'sku_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/sku/kk');
                $nama_kk = 'sku_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
                
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sku/surat_pernyataan');
                $nama_surat_pernyataan = 'sku_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
                
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_usaha'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'alamat' => $request->input('alamat'),
                'jenis_usaha' => $request->input('jenis_usaha'),
                'jk' => $request->input('jk'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sku = SKU::create($data);

            $log = $this->suketLogNotifikasi($sku,'sku','Pengajuan','Pengajuan Surat Keterangan Usaha telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Usaha Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($sku,$user->no_telpon,'Surat Keterangan Usaha');
            
            $generateFile = (new GenerateFileAction)->run($sku->id,'sku');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$sku,'Surat Keterangan Usaha'));
            \DB::commit();

            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Usaha berhasil di buat','Sukses');
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
                $data['sku'] = SKU::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skuDetail',$data);
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
            $data['sku'] = SKU::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skuEdit',$data);
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
                $data['sku'] = SKU::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skuEdit',$data);
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
            
            $sku = SKU::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            
            $rules = [
                'nama' => 'required',
                'nik' => 'required|min:16',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'pekerjaan_id' => 'required',
                'jenis_usaha' => 'required',
                'alamat' => 'required',
                'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
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
                'jenis_usaha' => 'Jenis Usaha',
                'alamat' => 'Alamat',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/sku/rtrw/'.$sku->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/sku/rtrw/'.$sku->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/sku/rtrw');
                $nama_rtrw = 'sku_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $sku->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/sku/ktp/'.$sku->file_ktp)){
                    \File::delete('backend/images/dokumen/sku/ktp/'.$sku->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/sku/ktp');
                $nama_ktp = 'sku_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $sku->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/sku/kk/'.$sku->file_kk)){
                    \File::delete('backend/images/dokumen/sku/kk/'.$sku->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/sku/kk');
                $nama_kk = 'sku_kk'.strtolower(str_replace(' ','_',$request->nama)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $sku->file_kk;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/sku/surat_pernyataan/'.$sku->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/sku/surat_pernyataan/'.$sku->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/sku/surat_pernyataan');
                $nama_surat_pernyataan = 'sku_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $sku->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'nama' => $request->input('nama'),
                'nik' => $request->input('nik'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tgl_lahir' => $request->input('tgl_lahir'),
                'alamat' => $request->input('alamat'),
                'jenis_usaha' => $request->input('jenis_usaha'),
                'jk' => $request->input('jk'),
                'pekerjaan_id' => $request->input('pekerjaan_id'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $sku->update($data);

            $log = $this->updateNotifikasi($sku->id,'sku',$sku->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($sku->id,'sku');

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
                toastr()->success('Pengajuan Surat Keterangan Usaha berhasil di perbaharui','Sukses');
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
