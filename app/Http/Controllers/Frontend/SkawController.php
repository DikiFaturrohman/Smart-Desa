<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKAW;
use App\Models\SKAWAnak;
use App\Models\SKAWPasangan;
use App\Models\Pekerjaan;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Mail;
use Session;
use Auth;

class SkawController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::get();
            return view('frontend.formSurat.skaw',$data);
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
                $data['pekerjaan'] = Pekerjaan::get();
                return view('webview.skaw',$data);
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
                'nama_alm' => 'required',
                'jk_alm' => 'required',
                'tgl_kematian' => 'required',
                'alamat' => 'required',
                'nama_saksi1' => 'required',
                'nama_saksi2' => 'required',
                'nik_saksi1' => 'required',
                'nik_saksi2' => 'required',
                'nama_anak' => 'required',
                'tempat_lahir_anak' => 'required',
                'kewarganegaraan' => 'required',
                'alamat_anak' => 'required',
                'tgl_lahir_anak' => 'required',
                'nama_pasangan' => 'required',
                'jk_pasangan' => 'required',
                'tgl_lahir_pasangan' => 'required',
                'tempat_lahir_pasangan' => 'required',
                'pekerjaan_id' => 'required',
                'file_surat_permohonan' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_silsilah' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_akta_lahir' => 'required|max:1024|mimes:pdf',
                'file_sk_kematian' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_buku_nikah' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'required|max:1024|mimes:pdf',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'mimes' => 'format :attribute salah',
                'min' => ':attribute maksimal :min karakter/digit',
            ];

            $label = [
                'no_surat' => 'No Surat',
                'user_id' => 'Nama Pengaju',
                'nama_alm' => 'Nama',
                'jk_alm' => 'Jenis Kelamin',
                'tgl_kematian' => 'Tanggal Kematian',
                'alamat' => 'Alamat',
                'email' => 'Kirim Ke Kasi',
                'nama_saksi1' => 'Nama',
                'nama_saksi2' => 'NIK',
                'nik_saksi1' => 'Nama',
                'nik_saksi2' => 'NIK',
                'nama_anak' => 'Nama',
                'tempat_lahir_anak' => 'Tempat Lahir',
                'kewarganegaraan' => 'Kewarganegaraan',
                'alamat_anak' => 'Alamat',
                'tgl_lahir_anak' => 'Tanggal Lahir',
                'nama_pasangan' => 'Nama',
                'jk_pasangan' => 'Jenis Kelamin',
                'tgl_lahir_pasangan' => 'Tanggal Lahir',
                'tempat_lahir_pasangan' => 'Tempat Lahir',
                'pekerjaan_id' => 'Pekerjaan',
                'file_surat_permohonan' => 'File Surat Permohonan',
                'file_silsilah' => 'File Silsilah',
                'file_akta_lahir' => 'File Akta Lahir',
                'file_sk_kematian' => 'File SK Kematian',
                'file_buku_nikah' => 'File Buku Nikah',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File KK',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_surat_permohonan')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/surat_permohonan/'.$skaw->file_surat_permohonan)){
                        \File::delete('backend/images/dokumen/skaw/surat_permohonan/'.$skaw->file_surat_permohonan);
                    }
                }
                $surat_permohonan = $request->file('file_surat_permohonan');
                $destinationPathSm = public_path('backend/images/dokumen/skaw/surat_permohonan');
                $nama_surat_permohonan = 'skaw_surat_permohonan_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$surat_permohonan->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_surat_permohonan=$skaw->file_surat_permohonan;
                }
            }
    
            if($request->file('file_buku_nikah')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/buku_nikah/'.$skaw->file_buku_nikah)){
                        \File::delete('backend/images/dokumen/skaw/buku_nikah/'.$skaw->file_buku_nikah);
                    }
                }
                $buku_nikah = $request->file('file_buku_nikah');
                $destinationPathBn = public_path('backend/images/dokumen/skaw/buku_nikah');
                $nama_buku_nikah = 'skaw_buku_nikah_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$buku_nikah->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_buku_nikah=$skaw->file_buku_nikah;
                }
            }
    
            if($request->file('file_sk_kematian')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/sk_kematian/'.$skaw->file_sk_kematian)){
                        \File::delete('backend/images/dokumen/skaw/sk_kematian/'.$skaw->file_sk_kematian);
                    }
                }
                $sk_kematian = $request->file('file_sk_kematian');
                $destinationPathSkm = public_path('backend/images/dokumen/skaw/sk_kematian');
                $nama_sk_kematian = 'skaw_sk_kematian_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$sk_kematian->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_sk_kematian=$skaw->file_sk_kematian;
                }
            }
    
            if($request->file('file_akta_lahir')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/akta_lahir/'.$skaw->file_akta_lahir)){
                        \File::delete('backend/images/dokumen/skaw/akta_lahir/'.$skaw->file_akta_lahir);
                    }
                }
                $akta_lahir = $request->file('file_akta_lahir');
                $destinationPathAl = public_path('backend/images/dokumen/skaw/akta_lahir');
                $nama_akta_lahir = 'skaw_akta_lahir_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$akta_lahir->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_akta_lahir=$skaw->file_akta_lahir;
                }
            }
    
            if($request->file('file_silsilah')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/silsilah/'.$skaw->file_silsilah)){
                        \File::delete('backend/images/dokumen/skaw/silsilah/'.$skaw->file_silsilah);
                    }
                }
                $silsilah = $request->file('file_silsilah');
                $destinationPathSil = public_path('backend/images/dokumen/skaw/silsilah');
                $nama_silsilah = 'skaw_silsilah_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$silsilah->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_silsilah=$skaw->file_silsilah;
                }
            }
            
            if($request->file('file_ktp')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/ktp/'.$skaw->file_ktp)){
                        \File::delete('backend/images/dokumen/skaw/ktp/'.$skaw->file_ktp);
                    }
                }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skaw/ktp');
                $nama_ktp = 'skaw_ktp_'.strtolower(str_replace(' ','_',$request->nama_alm)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_ktp=$skaw->file_ktp;
                }
            }
    
            if($request->file('file_kk')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/kk/'.$skaw->file_kk)){
                        \File::delete('backend/images/dokumen/skaw/kk/'.$skaw->file_kk);
                    }
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skaw/kk');
                $nama_kk = 'skaw_kk_'.strtolower(str_replace(' ','_',$request->nama_alm)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_kk=$skaw->file_kk;
                }
            }
    
            if($request->file('file_surat_pernyataan')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skaw/surat_pernyataan/'.$skaw->file_surat_pernyataan)){
                        \File::delete('backend/images/dokumen/skaw/surat_pernyataan/'.$skaw->file_surat_pernyataan);
                    }
                }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skaw/surat_pernyataan');
                $nama_surat_pernyataan = 'skaw_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_surat_pernyataan=$skaw->file_surat_pernyataan;
                }
            }
    
            $data = [
                'id' => $this->generateAutoNumber('ds_sk_ahli_waris'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama_alm' => $request->input('nama_alm'),
                'jk_alm' => $request->input('jk_alm'),
                'tgl_kematian' => $request->input('tgl_kematian'),
                'alamat' => $request->input('alamat'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'file_surat_permohonan' => $nama_surat_permohonan,
                'file_akta_lahir' => $nama_akta_lahir,
                'file_silsilah' => $nama_silsilah,
                'file_sk_kematian' => $nama_sk_kematian,
                'file_buku_nikah' => $nama_buku_nikah,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];

            $skaw = SKAW::create($data);

            $this->insertMultipleAnak($skaw,$request);
            $this->insertMultiplePasangan($skaw,$request);

            $log = $this->suketLogNotifikasi($skaw,'skaw','Pengajuan','Pengajuan Surat Keterangan Ahli Waris telah berhasil dibuat oleh user','user','terima');
            
            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Ahli Waris Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skaw,$user->no_telpon,'Surat Keterangan Ahli Waris');
            $generateFile = (new GenerateFileAction)->run($skaw->id,'skaw');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skaw,'Surat Keterangan Ahli Waris'));
            \DB::commit();

            $sk_kematian->move($destinationPathSkm,$nama_sk_kematian);
            $surat_permohonan->move($destinationPathSm,$nama_surat_permohonan);
            $buku_nikah->move($destinationPathBn,$nama_buku_nikah);
            $akta_lahir->move($destinationPathAl,$nama_akta_lahir);
            $silsilah->move($destinationPathSil,$nama_silsilah);
            $ktp->move($destinationPathKtp,$nama_ktp);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_pernyataan->move($destinationPathSp,$nama_surat_pernyataan);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Ahli Waris berhasil di buat','Sukses');
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
                $data['skaw'] = SKAW::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skawDetail',$data);
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
            $data['skaw'] = SKAW::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            return view('frontend.formSurat.skawEdit',$data);
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
                $data['skaw'] = SKAW::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skawEdit',$data);
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
            
            $skaw = SKAW::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'nama_alm' => 'required',
                'jk_alm' => 'required',
                'tgl_kematian' => 'required',
                'alamat' => 'required',
                'nama_saksi1' => 'required',
                'nama_saksi2' => 'required',
                'nik_saksi1' => 'required',
                'nik_saksi2' => 'required',
                'nama_anak' => 'required',
                'tempat_lahir_anak' => 'required',
                'kewarganegaraan' => 'required',
                'alamat_anak' => 'required',
                'tgl_lahir_anak' => 'required',
                'nama_pasangan' => 'required',
                'jk_pasangan' => 'required',
                'tgl_lahir_pasangan' => 'required',
                'tempat_lahir_pasangan' => 'required',
                'pekerjaan_id' => 'required',
                'file_surat_permohonan' => 'max:1024|mimes:jpeg,jpg,png',
                'file_silsilah' => 'max:1024|mimes:jpeg,jpg,png',
                'file_akta_lahir' => 'max:1024|mimes:pdf',
                'file_sk_kematian' => 'max:1024|mimes:jpeg,jpg,png',
                'file_buku_nikah' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp' => 'max:1024|mimes:pdf',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'mimes' => 'format :attribute salah',
                'min' => ':attribute maksimal :min karakter/digit',
            ];

            $label = [
                'no_surat' => 'No Surat',
                'user_id' => 'Nama Pengaju',
                'nama_alm' => 'Nama',
                'jk_alm' => 'Jenis Kelamin',
                'tgl_kematian' => 'Tanggal Kematian',
                'alamat' => 'Alamat',
                'email' => 'Kirim Ke Kasi',
                'nama_saksi1' => 'Nama',
                'nama_saksi2' => 'NIK',
                'nik_saksi1' => 'Nama',
                'nik_saksi2' => 'NIK',
                'nama_anak' => 'Nama',
                'tempat_lahir_anak' => 'Tempat Lahir',
                'kewarganegaraan' => 'Kewarganegaraan',
                'alamat_anak' => 'Alamat',
                'tgl_lahir_anak' => 'Tanggal Lahir',
                'nama_pasangan' => 'Nama',
                'jk_pasangan' => 'Jenis Kelamin',
                'tgl_lahir_pasangan' => 'Tanggal Lahir',
                'tempat_lahir_pasangan' => 'Tempat Lahir',
                'pekerjaan_id' => 'Pekerjaan',
                'file_surat_permohonan' => 'File Surat Permohonan',
                'file_silsilah' => 'File Silsilah',
                'file_akta_lahir' => 'File Akta Lahir',
                'file_sk_kematian' => 'File SK Kematian',
                'file_buku_nikah' => 'File Buku Nikah',
                'file_ktp' => 'File KTP',
                'file_kk' => 'File KK',
                'file_surat_pernyataan' => 'File Surat Pernyataan',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_surat_permohonan')){
                    if(\File::exists('backend/images/dokumen/skaw/surat_permohonan/'.$skaw->file_surat_permohonan)){
                        \File::delete('backend/images/dokumen/skaw/surat_permohonan/'.$skaw->file_surat_permohonan);
                    }
                $surat_permohonan = $request->file('file_surat_permohonan');
                $destinationPathSm = public_path('backend/images/dokumen/skaw/surat_permohonan');
                $nama_surat_permohonan = 'skaw_surat_permohonan_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$surat_permohonan->getClientOriginalExtension();
            }else{
                $nama_surat_permohonan=$skaw->file_surat_permohonan;
            }
    
            if($request->file('file_buku_nikah')){
                    if(\File::exists('backend/images/dokumen/skaw/buku_nikah/'.$skaw->file_buku_nikah)){
                        \File::delete('backend/images/dokumen/skaw/buku_nikah/'.$skaw->file_buku_nikah);
                    }
                $buku_nikah = $request->file('file_buku_nikah');
                $destinationPathBn = public_path('backend/images/dokumen/skaw/buku_nikah');
                $nama_buku_nikah = 'skaw_buku_nikah_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$buku_nikah->getClientOriginalExtension();
            }else{
                $nama_buku_nikah=$skaw->file_buku_nikah;
            }
    
            if($request->file('file_sk_kematian')){
                    if(\File::exists('backend/images/dokumen/skaw/sk_kematian/'.$skaw->file_sk_kematian)){
                        \File::delete('backend/images/dokumen/skaw/sk_kematian/'.$skaw->file_sk_kematian);
                    }
                $sk_kematian = $request->file('file_sk_kematian');
                $destinationPathSkm = public_path('backend/images/dokumen/skaw/sk_kematian');
                $nama_sk_kematian = 'skaw_sk_kematian_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$sk_kematian->getClientOriginalExtension();
            }else{
                $nama_sk_kematian=$skaw->file_sk_kematian;
                
            }
    
            if($request->file('file_akta_lahir')){
                    if(\File::exists('backend/images/dokumen/skaw/akta_lahir/'.$skaw->file_akta_lahir)){
                        \File::delete('backend/images/dokumen/skaw/akta_lahir/'.$skaw->file_akta_lahir);
                    }
                $akta_lahir = $request->file('file_akta_lahir');
                $destinationPathAl = public_path('backend/images/dokumen/skaw/akta_lahir');
                $nama_akta_lahir = 'skaw_akta_lahir_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$akta_lahir->getClientOriginalExtension();
            }else{
                $nama_akta_lahir=$skaw->file_akta_lahir;
            }
    
            if($request->file('file_silsilah')){
                    if(\File::exists('backend/images/dokumen/skaw/silsilah/'.$skaw->file_silsilah)){
                        \File::delete('backend/images/dokumen/skaw/silsilah/'.$skaw->file_silsilah);
                    }
                $silsilah = $request->file('file_silsilah');
                $destinationPathSil = public_path('backend/images/dokumen/skaw/silsilah');
                $nama_silsilah = 'skaw_silsilah_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$silsilah->getClientOriginalExtension();
            }else{
                    $nama_silsilah=$skaw->file_silsilah;
            }
            
            if($request->file('file_ktp')){
                    if(\File::exists('backend/images/dokumen/skaw/ktp/'.$skaw->file_ktp)){
                        \File::delete('backend/images/dokumen/skaw/ktp/'.$skaw->file_ktp);
                    }
                $ktp = $request->file('file_ktp');
                $destinationPathKtp = public_path('backend/images/dokumen/skaw/ktp');
                $nama_ktp = 'skaw_ktp_'.strtolower(str_replace(' ','_',$request->nama_alm)).'.'.'_'.date('YmdHis').'.'.$ktp->getClientOriginalExtension();
            }else{
                $nama_ktp=$skaw->file_ktp;
            }
    
            if($request->file('file_kk')){
                    if(\File::exists('backend/images/dokumen/skaw/kk/'.$skaw->file_kk)){
                        \File::delete('backend/images/dokumen/skaw/kk/'.$skaw->file_kk);
                    }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skaw/kk');
                $nama_kk = 'skaw_kk_'.strtolower(str_replace(' ','_',$request->nama_alm)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                $nama_kk=$skaw->file_kk;
            }
    
            if($request->file('file_surat_pernyataan')){
                    if(\File::exists('backend/images/dokumen/skaw/surat_pernyataan/'.$skaw->file_surat_pernyataan)){
                        \File::delete('backend/images/dokumen/skaw/surat_pernyataan/'.$skaw->file_surat_pernyataan);
                    }
                $surat_pernyataan = $request->file('file_surat_pernyataan');
                $destinationPathSp = public_path('backend/images/dokumen/skaw/surat_pernyataan');
                $nama_surat_pernyataan = 'skaw_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama_alm)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            }else{
                    $nama_surat_pernyataan=$skaw->file_surat_pernyataan;
            }
    
            $data = [
                'status' => '1',
                'nama_alm' => $request->input('nama_alm'),
                'jk_alm' => $request->input('jk_alm'),
                'tgl_kematian' => $request->input('tgl_kematian'),
                'alamat' => $request->input('alamat'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'kota_id' => Session::get('kota_id'),
                'kecamatan_id' => Session::get('kecamatan_id'),
                'area_id' => Session::get('desa_id'),
                'file_surat_permohonan' => $nama_surat_permohonan,
                'file_akta_lahir' => $nama_akta_lahir,
                'file_silsilah' => $nama_silsilah,
                'file_sk_kematian' => $nama_sk_kematian,
                'file_buku_nikah' => $nama_buku_nikah,
                'file_ktp' => $nama_ktp,
                'file_kk' => $nama_kk,
                'file_surat_pernyataan' => $nama_surat_pernyataan,
            ];
            
            $skaw->update($data);

            $log = $this->updateNotifikasi($skaw->id,'skaw',$skaw->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            \DB::commit();
            $generateFile = (new GenerateFileAction)->run($skaw->id,'skaw');

            if($request->file('file_sk_kematian')){
                $sk_kematian->move($destinationPathSkm,$nama_sk_kematian);
            }
            if($request->file('file_surat_permohonan')){
                $surat_permohonan->move($destinationPathSm,$nama_surat_permohonan);
            }
            if($request->file('file_buku_nikah')){
                $buku_nikah->move($destinationPathBn,$nama_buku_nikah);
            }
            if($request->file('file_akta_lahir')){
                $akta_lahir->move($destinationPathAl,$nama_akta_lahir);
            }
            if($request->file('file_silsilah')){
                $silsilah->move($destinationPathSil,$nama_silsilah);
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
                toastr()->success('Pengajuan Surat Keterangan Ahli Waris berhasil di perbaharui','Sukses');
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

    public function insertMultipleAnak($skaw,$anak)
    {
        try{
            $id = $anak->anak_id;
            $deleteExits = SKAWAnak::where('skaw_id',$skaw->id)->delete();
            for($i=0;$i<count($id);$i++){
                if($anak->nama_anak[$i] != null){
                    $data = [
                        'id' => $this->generateAutoNumber('ds_skaw_anak'),
                        'skaw_id' => $skaw->id,
                        'nama' => $anak->nama_anak[$i], 
                        'tempat_lahir' => $anak->tempat_lahir_anak[$i], 
                        'tgl_lahir' => $anak->tgl_lahir_anak[$i], 
                        'kewarganegaraan' => $anak->kewarganegaraan[$i], 
                        'alamat' => $anak->alamat_anak[$i], 
                    ];
    
                    $result = SKAWAnak::create($data);
                }
            }

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function insertMultiplePasangan($skaw,$pasangan)
    {
        try{
            $id = $pasangan->pasangan_id;
            $deleteExits = SKAWPasangan::where('skaw_id',$skaw->id)->delete();
            for($i=0;$i<count($id);$i++){
                if($pasangan->nama_pasangan[$i] != null){
                $data = [
                    'id' => $this->generateAutoNumber('ds_skaw_pasangan'),
                    'skaw_id' => $skaw->id,
                    'nama' => $pasangan->nama_pasangan[$i], 
                    'tempat_lahir' => $pasangan->tempat_lahir_pasangan[$i], 
                    'tgl_lahir' => $pasangan->tgl_lahir_pasangan[$i], 
                    'pekerjaan_id' => $pasangan->pekerjaan_id[$i], 
                    'jk' => $pasangan->jk_pasangan[$i], 
                ];

                $result = SKAWPasangan::create($data);
                }
            }

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
