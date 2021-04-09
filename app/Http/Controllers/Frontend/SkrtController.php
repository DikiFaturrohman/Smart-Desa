<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKRT;
use App\Models\Pekerjaan;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkrtController extends Controller
{
    public function index()
    {
        try{
            return view('frontend.formSurat.skrt');
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
                return view('webview.skrt');
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
                'no_sertifikat' => 'required',
                'nama_pemilik' => 'required',
                'nik_pemilik' => 'required',
                'tgl_riwayat1' => 'required',
                'atas_nama1' => 'required',
                'tgl_riwayat2' => 'required',
                'atas_nama2' => 'required',
                'berdasarkan2' => 'required',
                'tgl_riwayat3' => 'required',
                'atas_nama3' => 'required',
                'berdasarkan3' => 'required',
                'tgl_riwayat4' => 'required',
                'atas_nama4' => 'required',
                'berdasarkan4' => 'required',
                'no_sppt' => 'required',
                'blok' => 'required',
                'persil' => 'required',
                'no_kihir' => 'required',
                'luas' => 'required',
                'alamat' => 'required',
                'sebelah_utara' => 'required',
                'sebelah_timur' => 'required',
                'sebelah_selatan' => 'required',
                'sebelah_barat' => 'required',
                'nama_saksi1' => 'required',
                'nik_saksi1' => 'required',
                'nama_saksi2' => 'required',
                'nik_saksi2' => 'required',
                'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_tanah' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_pajak_tanah' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 mb',
                'mimes' => 'format :attribute salah',
                'min' => ':attribute maksimal :min karakter/digit',
            ];

            $label = [
                'no_sertifikat' => 'Nomor Sertifikat',
                'nama_pemilik' => 'Nama',
                'nik_pemilik' => 'NIK',
                'tgl_riwayat1' => 'Tanggal Riwayat',
                'atas_nama1' => 'Atas Nama',
                'tgl_riwayat2' => 'Tanggal Riwayat',
                'atas_nama2' => 'Atas Nama',
                'berdasarkan2' => 'Berdasarkan',
                'tgl_riwayat3' => 'Tanggal Riwayat',
                'atas_nama3' => 'Atas Nama',
                'berdasarkan3' => 'Berdasarkan',
                'tgl_riwayat4' => 'Tanggal Riwayat',
                'atas_nama4' => 'Atas Nama',
                'berdasarkan4' => 'Berdasarkan',
                'no_sppt' => 'Nomor SPPT',
                'blok' => 'Blok',
                'persil' => 'Persil',
                'no_kihir' => 'Nomor Kihir/Kikitir/Girik',
                'luas' => 'Luas',
                'alamat' => 'Alamat',
                'sebelah_utara' => 'Sebelah Utara',
                'sebelah_timur' => 'Sebelah Timur',
                'sebelah_selatan' => 'Sebelah Selatan',
                'sebelah_barat' => 'Sebelah Barat',
                'nama_saksi1' => 'Nama',
                'nik_saksi1' => 'NIK ',
                'nama_saksi2' => 'Nama',
                'nik_saksi2' => 'NIK',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
                'file_surat_tanah' => 'File Surat Tanah',
                'file_surat_pajak_tanah' => 'File Surat Pajak Tanah',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_surat_tanah')){
                $surat_tanah = $request->file('file_surat_tanah');
                $destinationPathSt = public_path('backend/images/dokumen/skrt/surat_tanah');
                $nama_surat_tanah = 'skrt_surat_tanah'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_tanah->getClientOriginalExtension();
            }

            if($request->file('file_surat_pajak_tanah')){
                $surat_pajak_tanah = $request->file('file_surat_pajak_tanah');
                $destinationPathSpt = public_path('backend/images/dokumen/skrt/surat_pajak_tanah');
                $nama_surat_pajak_tanah = 'skrt_surat_pajak_tanah'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_pajak_tanah->getClientOriginalExtension();
            }

            if($request->file('file_sp_rtrw')){
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skrt/rtrw');
                $nama_rtrw = 'skrt_rtrw'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }

            if($request->file('file_ktp')){
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skrt/ktp');
                $nama_ktp = 'skrt_ktp_'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }

            if($request->file('file_kk')){
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skrt/kk');
                $nama_kk = 'skrt_kk_'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }

            if($request->file('file_surat_pernyataan')){
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skrt/surat_pernyataan');
                $nama_surat_pernyataan = 'skrt_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_sk_riwayat_tanah'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama_pemilik' => $request->input('nama_pemilik'),
                'nama_pemilik' => $request->input('nama_pemilik'),
                'nik_pemilik' => $request->input('nik_pemilik'),
                'no_sertifikat' => $request->input('no_sertifikat'),
                'tgl_riwayat1' => $request->input('tgl_riwayat1'),
                'atas_nama1' => $request->input('atas_nama1'),
                'atas_nama2' => $request->input('atas_nama2'),
                'atas_nama3' => $request->input('atas_nama3'),
                'atas_nama4' => $request->input('atas_nama4'),
                'tgl_riwayat2' => $request->input('tgl_riwayat2'),
                'tgl_riwayat3' => $request->input('tgl_riwayat3'),
                'tgl_riwayat4' => $request->input('tgl_riwayat4'),
                'berdasarkan2' => $request->input('berdasarkan2'),
                'berdasarkan3' => $request->input('berdasarkan3'),
                'berdasarkan4' => $request->input('berdasarkan4'),
                'no_sppt' => $request->input('no_sppt'),
                'blok' => $request->input('blok'),
                'no_kihir' => $request->input('no_kihir'),
                'persil' => $request->input('persil'),
                'luas' => $request->input('luas'),
                'alamat' => $request->input('alamat'),
                'sebelah_utara' => $request->input('sebelah_utara'),
                'sebelah_timur' => $request->input('sebelah_timur'),
                'sebelah_selatan' => $request->input('sebelah_selatan'),
                'sebelah_barat' => $request->input('sebelah_barat'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
                'file_surat_tanah' => $nama_surat_tanah,
                'file_surat_pajak_tanah' => $nama_surat_pajak_tanah,
            ];

            $skrt = SKRT::create($data);

            $log = $this->suketLogNotifikasi($skrt,'skrt','Pengajuan','Pengajuan Surat Keterangan Riwayat Tanah telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Riwayat Tanah Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skrt,$user->no_telpon,'Surat Keterangan Riwayat Tanah');
            $generateFile = (new GenerateFileAction)->run($skrt->id,'skrt');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skrt,'Surat Keterangan Riwayat Tanah'));
            \DB::commit();

            $rtrw->move($destinationPathRtrw,$nama_rtrw);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);
            $surat_tanah->move($destinationPathSt,$nama_surat_tanah);
            $surat_pajak_tanah->move($destinationPathSpt,$nama_surat_pajak_tanah);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Riwayat Tanah berhasil di buat','Sukses');
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
                $data['skrt'] = SKRT::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skrtDetail',$data);
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
            $data['skrt'] = SKRT::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skrtEdit',$data);
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
                $data['skrt'] = SKRT::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skrtEdit',$data);
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

            $skrt = SKRT::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();
            
            $rules = [
                'no_sertifikat' => 'required',
                'nama_pemilik' => 'required',
                'nik_pemilik' => 'required',
                'tgl_riwayat1' => 'required',
                'atas_nama1' => 'required',
                'tgl_riwayat2' => 'required',
                'atas_nama2' => 'required',
                'berdasarkan2' => 'required',
                'tgl_riwayat3' => 'required',
                'atas_nama3' => 'required',
                'berdasarkan3' => 'required',
                'tgl_riwayat4' => 'required',
                'atas_nama4' => 'required',
                'berdasarkan4' => 'required',
                'no_sppt' => 'required',
                'blok' => 'required',
                'persil' => 'required',
                'no_kihir' => 'required',
                'luas' => 'required',
                'alamat' => 'required',
                'sebelah_utara' => 'required',
                'sebelah_timur' => 'required',
                'sebelah_selatan' => 'required',
                'sebelah_barat' => 'required',
                'nama_saksi1' => 'required',
                'nik_saksi1' => 'required',
                'nama_saksi2' => 'required',
                'nik_saksi2' => 'required',
                'file_sp_rtrw' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_tanah' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_pajak_tanah' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/ 1 mb',
                'mimes' => 'format :attribute salah',
                'min' => ':attribute maksimal :min karakter/digit',
            ];

            $label = [
                'no_sertifikat' => 'Nomor Sertifikat',
                'nama_pemilik' => 'Nama',
                'nik_pemilik' => 'NIK',
                'tgl_riwayat1' => 'Tanggal Riwayat',
                'atas_nama1' => 'Atas Nama',
                'tgl_riwayat2' => 'Tanggal Riwayat',
                'atas_nama2' => 'Atas Nama',
                'berdasarkan2' => 'Berdasarkan',
                'tgl_riwayat3' => 'Tanggal Riwayat',
                'atas_nama3' => 'Atas Nama',
                'berdasarkan3' => 'Berdasarkan',
                'tgl_riwayat4' => 'Tanggal Riwayat',
                'atas_nama4' => 'Atas Nama',
                'berdasarkan4' => 'Berdasarkan',
                'no_sppt' => 'Nomor SPPT',
                'blok' => 'Blok',
                'persil' => 'Persil',
                'no_kihir' => 'Nomor Kihir/Kikitir/Girik',
                'luas' => 'Luas',
                'alamat' => 'Alamat',
                'sebelah_utara' => 'Sebelah Utara',
                'sebelah_timur' => 'Sebelah Timur',
                'sebelah_selatan' => 'Sebelah Selatan',
                'sebelah_barat' => 'Sebelah Barat',
                'nama_saksi1' => 'Nama',
                'nik_saksi1' => 'NIK ',
                'nama_saksi2' => 'Nama',
                'nik_saksi2' => 'NIK',
                'file_sp_rtrw' => 'File Surat Pengantar RTRW',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File Kartu Keluarga',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
                'file_surat_tanah' => 'File Surat Tanah',
                'file_surat_pajak_tanah' => 'File Surat Pajak Tanah',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_surat_tanah')){
                if(\File::exists('backend/images/dokumen/skrt/surat_tanah/'.$skrt->file_surat_tanah)){
                    \File::delete('backend/images/dokumen/skrt/surat_tanah/'.$skrt->file_surat_tanah);
                }
                $surat_tanah = $request->file('file_surat_tanah');
                $destinationPathSt = public_path('backend/images/dokumen/skrt/surat_tanah');
                $nama_surat_tanah = 'skrt_surat_tanah'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_tanah->getClientOriginalExtension();
            }else{
                $nama_surat_tanah = $skrt->file_surat_tanah;
            }

            if($request->file('file_surat_pajak_tanah')){
                if(\File::exists('backend/images/dokumen/skrt/surat_pajak_tanah/'.$skrt->file_surat_pajak_tanah)){
                    \File::delete('backend/images/dokumen/skrt/surat_pajak_tanah/'.$skrt->file_surat_pajak_tanah);
                }
                $surat_pajak_tanah = $request->file('file_surat_pajak_tanah');
                $destinationPathSpt = public_path('backend/images/dokumen/skrt/surat_pajak_tanah');
                $nama_surat_pajak_tanah = 'skrt_surat_pajak_tanah'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_pajak_tanah->getClientOriginalExtension();
            }else{
                $nama_surat_pajak_tanah = $skrt->file_surat_pajak_tanah;
            }

            if($request->file('file_sp_rtrw')){
                if(\File::exists('backend/images/dokumen/skrt/rtrw/'.$skrt->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/skrt/rtrw/'.$skrt->file_sp_rtrw);
                }
                $rtrw = $request->file('file_sp_rtrw');
                $destinationPathRtrw = public_path('backend/images/dokumen/skrt/rtrw');
                $nama_rtrw = 'skrt_rtrw'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            }else{
                $nama_rtrw = $skrt->file_sp_rtrw;
            }

            if($request->file('file_ktp')){
                if(\File::exists('backend/images/dokumen/skrt/ktp/'.$skrt->file_ktp)){
                    \File::delete('backend/images/dokumen/skrt/ktp/'.$skrt->file_ktp);
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skrt/ktp');
                $nama_ktp = 'skrt_ktp_'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp = $skrt->file_ktp;
            }

            if($request->file('file_kk')){
                if(\File::exists('backend/images/dokumen/skrt/kk/'.$skrt->file_kk)){
                    \File::delete('backend/images/dokumen/skrt/kk/'.$skrt->file_kk);
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skrt/kk');
                $nama_kk = 'skrt_kk'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk = $skrt->file_kk;
            }

            if($request->file('file_surat_pernyataan')){
                if(\File::exists('backend/images/dokumen/skrt/surat_pernyataan/'.$skrt->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/skrt/surat_pernyataan/'.$skrt->file_surat_pernyataan);
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skrt/surat_pernyataan');
                $nama_surat_pernyataan = 'skrt_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama_pemilik)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                $nama_surat_pernyataan = $skrt->file_surat_pernyataan;
            }

            $data = [
                'status' => '1',
                'nama_pemilik' => $request->input('nama_pemilik'),
                'nama_pemilik' => $request->input('nama_pemilik'),
                'nik_pemilik' => $request->input('nik_pemilik'),
                'no_sertifikat' => $request->input('no_sertifikat'),
                'tgl_riwayat1' => $request->input('tgl_riwayat1'),
                'atas_nama1' => $request->input('atas_nama1'),
                'atas_nama2' => $request->input('atas_nama2'),
                'atas_nama3' => $request->input('atas_nama3'),
                'atas_nama4' => $request->input('atas_nama4'),
                'tgl_riwayat2' => $request->input('tgl_riwayat2'),
                'tgl_riwayat3' => $request->input('tgl_riwayat3'),
                'tgl_riwayat4' => $request->input('tgl_riwayat4'),
                'berdasarkan2' => $request->input('berdasarkan2'),
                'berdasarkan3' => $request->input('berdasarkan3'),
                'berdasarkan4' => $request->input('berdasarkan4'),
                'no_sppt' => $request->input('no_sppt'),
                'blok' => $request->input('blok'),
                'no_kihir' => $request->input('no_kihir'),
                'persil' => $request->input('persil'),
                'luas' => $request->input('luas'),
                'alamat' => $request->input('alamat'),
                'sebelah_utara' => $request->input('sebelah_utara'),
                'sebelah_timur' => $request->input('sebelah_timur'),
                'sebelah_selatan' => $request->input('sebelah_selatan'),
                'sebelah_barat' => $request->input('sebelah_barat'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'file_sp_rtrw' => $nama_rtrw,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
                'file_surat_tanah' => $nama_surat_tanah,
                'file_surat_pajak_tanah' => $nama_surat_pajak_tanah,
            ];

            $skrt->update($data);

            $log = $this->updateNotifikasi($skrt->id,'skrt',$skrt->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skrt->id,'skrt');

            \DB::commit();
            if($request->file('file_sp_rtrw')){
                $rtrw->move($destinationPathRtrw,$nama_rtrw);
            }
            if($request->file('file_ktp')){
                $ktp->move($destinationPathKtp,$nama_ktp);
            }
            if($request->file('file_kk')){
                $kk->move($destinationPathKk,$nama_kk);
            }if($request->file('file_surat_pernyataan')){
                $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);
            }
            if($request->file('file_surat_tanah')){
                $surat_tanah->move($destinationPathSt,$nama_surat_tanah);
            }
            if($request->file('file_surat_pajak_tanah')){
                $surat_pajak_tanah->move($destinationPathSpt,$nama_surat_pajak_tanah);
            }
            
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Riwayat Tanah berhasil di perbaharui','Sukses');
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
