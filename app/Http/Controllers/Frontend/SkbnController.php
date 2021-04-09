<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKBN;
use App\Models\Admin;
use App\Models\SKBNDetail;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkbnController extends Controller
{
    public function index()
    {
        try{
            return view('frontend.formSurat.skbn');
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
                return view('webview.skbn');
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
                'data_dok_benar' => 'required',
                'jenis_dok.*' => 'required',
                'nomor_dok.*' => 'required',
                'nama_dok.*' => 'required',
                'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
            
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'data_dok_benar' => 'Data Dokumen Benar',
                'jenis_dok.*' => 'Jenis Dokumen',
                'nomor_dok.*' => 'Nomor Dokumen',
                'nama_dok.*' => 'Nama Dokumen',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skbn/rtrw');
                $nama_rtrw = 'skbn_rtrw'.strtolower(str_replace(' ','_',$request->data_dok_benar)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skbn/ktp');
                $nama_ktp = 'skbn_ktp_'.strtolower(str_replace(' ','_',$request->data_dok_benar)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skbn/kk');
                $nama_kk = 'skbn_kk'.strtolower(str_replace(' ','_',$request->data_dok_benar)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skbn/surat_pernyataan');
                $nama_surat_pernyataan = 'skbn_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->data_dok_benar)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_beda_nama'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'data_dok_benar' => $request->input('data_dok_benar'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $skbn = SKBN::create($data);


            for($i = 0;$i<count($request->jenis_dok);$i++){
                $detail = [
                    'id' => $this->generateAutoNumber('ds_skbn_detail'),
                    'skbn_id' => $skbn->id,
                    'jenis_dok' => $request->jenis_dok[$i],
                    'nomor_dok' => $request->nomor_dok[$i],
                    'nama_dok' => $request->nama_dok[$i],
                ];

                $skbnDetail = SKBNDetail::create($detail);
            }

            $log = $this->suketLogNotifikasi($skbn,'skbn','Pengajuan','Pengajuan Surat Keterangan Beda Nama telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Beda Nama Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skbn,$user->no_telpon,'Surat Keterangan Beda Nama');
            $generateFile = (new GenerateFileAction)->run($skbn->id,'skbn');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skbn,'Surat Keterangan Beda Nama'));
            \DB::commit();

            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Beda Nama berhasil di buat','Sukses');
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
                $data['skbn'] = SKBN::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skbnDetail',$data);
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
            $data['skbn'] = SKBN::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skbnEdit',$data);
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
                $data['skbn'] = SKBN::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skbnEdit',$data);
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
            
            $skbn = SKBN::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'data_dok_benar' => 'required',
                'jenis_dok.*' => 'required',
                'nomor_dok.*' => 'required',
                'nama_dok.*' => 'required',
                'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
            ];
            
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'data_dok_benar' => 'Data Dokumen Benar',
                'jenis_dok.*' => 'Jenis Dokumen',
                'nomor_dok.*' => 'Nomor Dokumen',
                'nama_dok.*' => 'Nama Dokumen',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/skbn/rtrw/'.$skbn->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/skbn/rtrw/'.$skbn->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skbn/rtrw');
                $nama_rtrw = 'skbn_rtrw'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $skbn->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/skbn/ktp/'.$skbn->file_ktp)){
                    \File::delete('backend/images/dokumen/skbn/ktp/'.$skbn->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skbn/ktp');
                $nama_ktp = 'sku_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $skbn->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/skbn/kk/'.$skbn->file_kk)){
                    \File::delete('backend/images/dokumen/skbn/kk/'.$skbn->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skbn/kk');
                $nama_kk = 'skbn_kk'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $skbn->file_kk;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/skbn/surat_pernyataan/'.$skbn->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/skbn/surat_pernyataan/'.$skbn->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skbn/surat_pernyataan');
                $nama_surat_pernyataan = 'skbn_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $skbn->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'data_dok_benar' => $request->input('data_dok_benar'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $result = $skbn;

            $skbn->update($data);

            for($i = 0;$i<count($request->jenis_dok);$i++){
                $detail = [
                    'skbn_id' => $result->id,
                    'jenis_dok' => $request->jenis_dok[$i],
                    'nomor_dok' => $request->nomor_dok[$i],
                    'nama_dok' => $request->nama_dok[$i],
                ];

                $skbnDetail = SKBNDetail::where('id',$request->skbn_id[$i])->update($detail);
            }

            $log = $this->updateNotifikasi($result->id,'skbn',$result->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skbn->id,'skbn');

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
                toastr()->success('Pengajuan Surat Keterangan Beda Nama berhasil di perbaharui','Sukses');
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
