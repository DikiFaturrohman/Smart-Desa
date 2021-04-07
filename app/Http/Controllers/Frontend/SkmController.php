<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKM;
use App\Models\Pekerjaan;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Admin;
use App\Mail\NotifSuket;
use Auth;
use Mail;
use Session;

class SkmController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::get();
            $data['provinsi'] = Provinsi::get();
            return view('frontend.formSurat.skm',$data);
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
                $data['provinsi'] = Provinsi::get();
                return view('webview.skm',$data);
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
                'nama_kepala_keluarga' => 'required',
                'no_kk' => 'required|min:16',
                'nik_jenazah' => 'required|min:16',
                'nama_jenazah' => 'required',
                'jk_jenazah' => 'required',
                'tgl_lahir_jenazah' => 'required',
                'tempat_lahir' => 'required',
                'agama' => 'required',
                'pekerjaan_id_jenazah' => 'required',
                'alamat_jenazah' => 'required',
                'provinsi_id_jenazah' => 'required',
                'kota_id_jenazah' => 'required',
                'kecamatan_id_jenazah' => 'required',
                'area_id_jenazah' => 'required',
                'kewarganegaraan' => 'required',
                'kebangsaan' => 'required',
                'anak_ke' => 'required',
                'tgl_kematian' => 'required',
                'pukul' => 'required',
                'sebab_kematian' => 'required',
                'tempat_kematian' => 'required',
                'yang_menerangkan' => 'required',
                'nik_ibu' => 'required|min:16',
                'nama_ibu' => 'required',
                'umur_ibu' => 'required',
                'pekerjaan_id_ibu' => 'required',
                'alamat_ibu' => 'required',
                'provinsi_id_ibu' => 'required',
                'kota_id_ibu' => 'required',
                'kecamatan_id_ibu' => 'required',
                'area_id_ibu' => 'required',
                'nik_ayah' => 'required|min:16',
                'nama_ayah' => 'required',
                'umur_ayah' => 'required',
                'pekerjaan_id_ayah' => 'required',
                'alamat_ayah' => 'required',
                'provinsi_id_ayah' => 'required',
                'kota_id_ayah' => 'required',
                'kecamatan_id_ayah' => 'required',
                'area_id_ayah' => 'required',
                'nik_pelapor' => 'required|min:16',
                'nama_pelapor' => 'required',
                'pekerjaan_id_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'umur_pelapor' => 'required',
                'hubungan' => 'required',
                'nik_saksi1' => 'required|min:16',
                'nama_saksi1' => 'required',
                'nik_saksi2' => 'required|min:16',
                'nama_saksi2' => 'required',
                'file_sk_rs' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp_pelapor' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp_alm' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ktp_saksi' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
        
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/ 1 mb',
                'min' => ':attribute maksimal :min karakter',
                'mimes' => 'format :attribute harus jpg,jpeg atau png',
            ];

            $label = [
                'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
                'no_kk' => 'No Kartu Keluarga',
                'nik_jenazah' => 'NIK Jenazah',
                'nama_jenazah' => 'Nama Jenazah',
                'jk_jenazah' => 'Jenis Kelamin Jenazah',
                'tgl_lahir_jenazah' => 'Tanggal Lahir Jenazah',
                'tempat_lahir' => 'Tempat Lahir Jenazah',
                'agama' => 'Agama Jenazah',
                'pekerjaan_id_jenazah' => 'Pekerjaan Jenazah',
                'alamat_jenazah' => 'Alamat Jenazah',
                'provinsi_id_jenazah' => 'Provinsi Jenazah',
                'kota_id_jenazah' => 'Kota Jenazah',
                'kecamatan_id_jenazah' => 'Kecamatan Jenazah',
                'area_id_jenazah' => 'Desa Jenazah',
                'kewarganegaraan' => 'Kewarganegaraan Jenazah',
                'kebangsaan' => 'Kebangsaan Jenazah',
                'anak_ke' => 'Anak Ke',
                'tgl_kematian' => 'Tanggal Kematian',
                'pukul' => 'Pukul',
                'sebab_kematian' => 'Sebab Kematian',
                'tempat_kematian' => 'Tempat Kematian',
                'yang_menerangkan' => 'Yang Menerangkan',
                'nik_ibu' => 'NIK Ibu',
                'nama_ibu' => 'Nama Ibu',
                'umur_ibu' => 'Umur Ibu',
                'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
                'alamat_ibu' => 'Alamat Ibu',
                'provinsi_id_ibu' => 'Provinsi Ibu',
                'kota_id_ibu' => 'Kota Ibu',
                'kecamatan_id_ibu' => 'Kecamatan Ibu',
                'area_id_ibu' => 'Desa Ibu',
                'nik_ayah' => 'NIK Ayah',
                'nama_ayah' => 'Nama Ayah',
                'umur_ayah' => 'Umur Ayah',
                'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
                'alamat_ayah' => 'Alamat Ayah',
                'provinsi_id_ayah' => 'Provinsi Ayah',
                'kota_id_ayah' => 'Kota Ayah',
                'kecamatan_id_ayah' => 'Kecamatan Ayah',
                'area_id_ayah' => 'Desa Ayah',
                'nik_pelapor' => 'NIK Pelapor',
                'nama_pelapor' => 'Nama Pelapor',
                'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
                'alamat_pelapor' => 'Alamat',
                'umur_pelapor' => 'Umur',
                'hubungan' => 'Hubungan',
                'nik_saksi1' => 'NIK Saksi 1',
                'nama_saksi1' => 'Nama Saksi 1',
                'nik_saksi2' => 'NIK Saksi 2',
                'nama_saksi2' => 'Nama Saksi 2',
                'file_sk_rs' => 'File SK Rumah Sakit',
                'file_ktp_pelapor' => 'File KTP Pelapor',
                'file_ktp_alm' => 'File KTP Alm',
                'file_ktp_saksi' => 'File KTP Saksi',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sk_rs')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skm/sk_rs/'.$skm->file_sk_rs)){
                        \File::delete('backend/images/dokumen/skm/sk_rs/'.$skm->file_sk_rs);
                    }
                }
                $sk_rs = $request->file('file_sk_rs');
                $destinationPathRs = public_path('backend/images/dokumen/skm/sk_rs');
                $nama_sk_rs = 'skm_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'_'.date('YmdHis').'.'.$sk_rs->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_sk_rs=$skm->file_sk_rs;
                }
            }
    
            if($request->file('file_ktp_pelapor')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skm/ktp_pelapor/'.$skm->file_ktp_pelapor)){
                        \File::delete('backend/images/dokumen/skm/ktp_pelapor/'.$skm->file_ktp_pelapor);
                    }
                }
                $ktp_pelapor = $request->file('file_ktp_pelapor');
                $destinationPathPelapor = public_path('backend/images/dokumen/skm/ktp_pelapor');
                $nama_ktp_pelapor = 'skm_pelapor_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'.'.'_'.date('YmdHis').'.'.$ktp_pelapor->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_ktp_pelapor=$skm->file_ktp_pelapor;
                }
            }
    
            if($request->file('file_ktp_alm')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skm/ktp_alm/'.$skm->file_ktp_alm)){
                        \File::delete('backend/images/dokumen/skm/ktp_alm/'.$skm->file_ktp_alm);
                    }
                }
                $ktp_alm = $request->file('file_ktp_alm');
                $destinationPathAlm = public_path('backend/images/dokumen/skm/ktp_alm');
                $nama_ktp_alm = 'skm_ktp'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'.'.'_'.date('YmdHis').'.'.$ktp_alm->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_ktp_alm=$skm->file_ktp_alm;
                }
            }
    
            if($request->file('file_ktp_saksi')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skm/ktp_saksi/'.$skm->file_ktp_saksi)){
                        \File::delete('backend/images/dokumen/skm/ktp_saksi/'.$skm->file_ktp_saksi);
                    }
                }
                $ktp_saksi = $request->file('file_ktp_saksi');
                $destinationPathSaksi = public_path('backend/images/dokumen/skm/ktp_saksi');
                $nama_ktp_saksi = 'skm_saksi_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'_'.date('YmdHis').'.'.$ktp_saksi->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_ktp_saksi=$skm->file_ktp_saksi;
                }
            }
    
            $data = [
                'id' => $this->generateAutoNumber('ds_sk_kematian'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama_kepala_keluarga' => $request->input('nama_kepala_keluarga'),
                'no_kk' => $request->input('no_kk'),
                'nama_jenazah' => $request->input('nama_jenazah'),
                'nik_jenazah' => $request->input('nik_jenazah'),
                'jk_jenazah' => $request->input('jk_jenazah'),
                'tgl_lahir_jenazah' => $request->input('tgl_lahir_jenazah'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'agama' => $request->input('agama'),
                'pekerjaan_id_jenazah' => $request->input('pekerjaan_id_jenazah'),
                'alamat_jenazah' => $request->input('alamat_jenazah'),
                'provinsi_id_jenazah' => $request->input('provinsi_id_jenazah'),
                'kota_id_jenazah' => $request->input('kota_id_jenazah'),
                'kecamatan_id_jenazah' => $request->input('kecamatan_id_jenazah'),
                'area_id_jenazah' => $request->input('area_id_jenazah'),
                'kewarganegaraan' => $request->input('kewarganegaraan'),
                'keturunan' => $request->input('keturunan'),
                'kebangsaan' => $request->input('kebangsaan'),
                'anak_ke' => $request->input('anak_ke'),
                'tgl_kematian' => $request->input('tgl_kematian'),
                'pukul' => $request->input('pukul'),
                'sebab_kematian' => $request->input('sebab_kematian'),
                'tempat_kematian' => $request->input('tempat_kematian'),
                'yang_menerangkan' => $request->input('yang_menerangkan'),
                'nik_ibu' => $request->input('nik_ibu'),
                'nama_ibu' => $request->input('nama_ibu'),
                'umur_ibu' => $request->input('umur_ibu'),
                'pekerjaan_id_ibu' => $request->input('pekerjaan_id_ibu'),
                'alamat_ibu' => $request->input('alamat_ibu'),
                'provinsi_id_ibu' => $request->input('provinsi_id_ibu'),
                'kota_id_ibu' => $request->input('kota_id_ibu'),
                'kecamatan_id_ibu' => $request->input('kecamatan_id_ibu'),
                'area_id_ibu' => $request->input('area_id_ibu'),
                'nik_ayah' => $request->input('nik_ayah'),
                'nama_ayah' => $request->input('nama_ayah'),
                'umur_ayah' => $request->input('umur_ayah'),
                'pekerjaan_id_ayah' => $request->input('pekerjaan_id_ayah'),
                'alamat_ayah' => $request->input('alamat_ayah'),
                'provinsi_id_ayah' => $request->input('provinsi_id_ayah'),
                'kota_id_ayah' => $request->input('kota_id_ayah'),
                'kecamatan_id_ayah' => $request->input('kecamatan_id_ayah'),
                'area_id_ayah' => $request->input('area_id_ayah'),
                'nik_pelapor' => $request->input('nik_pelapor'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'pekerjaan_id_pelapor' => $request->input('pekerjaan_id_pelapor'),
                'umur_pelapor' => $request->input('umur_pelapor'),
                'alamat_pelapor' => $request->input('alamat_pelapor'),
                'hubungan' => $request->input('hubungan'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'file_sk_rs' => $nama_sk_rs,
                'file_ktp_pelapor' => $nama_ktp_pelapor,
                'file_ktp_alm' => $nama_ktp_alm,
                'file_ktp_saksi' => $nama_ktp_saksi,
            ];

            $skm = SKM::create($data);

            $log = $this->suketLogNotifikasi($skm,'skm','Pengajuan','Pengajuan Surat Keterangan Kematian telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Kematian Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skm,$user->no_telpon,'Surat Keterangan Kematian');
            $generateFile = (new GenerateFileAction)->run($skm->id,'skm');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skm,'Surat Keterangan Kematian'));
            \DB::commit();

            $sk_rs->move($destinationPathRs,$nama_sk_rs);
            $ktp_pelapor->move($destinationPathPelapor,$nama_ktp_pelapor);
            $ktp_alm->move($destinationPathAlm,$nama_ktp_alm);
            $ktp_saksi->move($destinationPathSaksi,$nama_ktp_saksi);

            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Kematian berhasil di buat','Sukses');
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
                $data['skm'] = SKM::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.skmDetail',$data);
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
            $data['skm'] = SKM::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();

            $data['provinsi'] = Provinsi::all();
            $data['kotaAyah'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_ayah)->get();
            $data['kecamatanAyah'] = Kecamatan::where('kota_id',$data['skm']->kota_id_ayah)->get();
            $data['areaAyah'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_ayah)->get();

            $data['kotaIbu'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_ibu)->get();
            $data['kecamatanIbu'] = Kecamatan::where('kota_id',$data['skm']->kota_id_ibu)->get();
            $data['areaIbu'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_ibu)->get();

            $data['kotaJenazah'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_jenazah)->get();
            $data['kecamatanJenazah'] = Kecamatan::where('kota_id',$data['skm']->kota_id_jenazah)->get();
            $data['areaJenazah'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_jenazah)->get();

            return view('frontend.formSurat.skmEdit',$data);
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
                $data['skm'] = SKM::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                $data['provinsi'] = Provinsi::all();
                $data['kotaAyah'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_ayah)->get();
                $data['kecamatanAyah'] = Kecamatan::where('kota_id',$data['skm']->kota_id_ayah)->get();
                $data['areaAyah'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_ayah)->get();

                $data['kotaIbu'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_ibu)->get();
                $data['kecamatanIbu'] = Kecamatan::where('kota_id',$data['skm']->kota_id_ibu)->get();
                $data['areaIbu'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_ibu)->get();

                $data['kotaJenazah'] = Kota::where('provinsi_id',$data['skm']->provinsi_id_jenazah)->get();
                $data['kecamatanJenazah'] = Kecamatan::where('kota_id',$data['skm']->kota_id_jenazah)->get();
                $data['areaJenazah'] = Desa::where('kecamatan_id',$data['skm']->kecamatan_id_jenazah)->get();
                return view('webview.skmEdit',$data);
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
            
            $skm = SKM::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();

            $rules = [
                'nama_kepala_keluarga' => 'required',
                'no_kk' => 'required|min:16',
                'nik_jenazah' => 'required|min:16',
                'nama_jenazah' => 'required',
                'jk_jenazah' => 'required',
                'tgl_lahir_jenazah' => 'required',
                'tempat_lahir' => 'required',
                'agama' => 'required',
                'pekerjaan_id_jenazah' => 'required',
                'alamat_jenazah' => 'required',
                'provinsi_id_jenazah' => 'required',
                'kota_id_jenazah' => 'required',
                'kecamatan_id_jenazah' => 'required',
                'area_id_jenazah' => 'required',
                'kewarganegaraan' => 'required',
                'kebangsaan' => 'required',
                'anak_ke' => 'required',
                'tgl_kematian' => 'required',
                'pukul' => 'required',
                'sebab_kematian' => 'required',
                'tempat_kematian' => 'required',
                'yang_menerangkan' => 'required',
                'nik_ibu' => 'required|min:16',
                'nama_ibu' => 'required',
                'umur_ibu' => 'required',
                'pekerjaan_id_ibu' => 'required',
                'alamat_ibu' => 'required',
                'provinsi_id_ibu' => 'required',
                'kota_id_ibu' => 'required',
                'kecamatan_id_ibu' => 'required',
                'area_id_ibu' => 'required',
                'nik_ayah' => 'required|min:16',
                'nama_ayah' => 'required',
                'umur_ayah' => 'required',
                'pekerjaan_id_ayah' => 'required',
                'alamat_ayah' => 'required',
                'provinsi_id_ayah' => 'required',
                'kota_id_ayah' => 'required',
                'kecamatan_id_ayah' => 'required',
                'area_id_ayah' => 'required',
                'nik_pelapor' => 'required|min:16',
                'nama_pelapor' => 'required',
                'pekerjaan_id_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'umur_pelapor' => 'required',
                'hubungan' => 'required',
                'nik_saksi1' => 'required|min:16',
                'nama_saksi1' => 'required',
                'nik_saksi2' => 'required|min:16',
                'nama_saksi2' => 'required',
                'file_sk_rs' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp_pelapor' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp_alm' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ktp_saksi' => 'max:1024|mimes:jpeg,jpg,png',
            ];
        
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/ 1 mb',
                'min' => ':attribute maksimal :min karakter',
                'mimes' => 'format :attribute harus jpg,jpeg atau png',
            ];

            $label = [
                'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
                'no_kk' => 'No Kartu Keluarga',
                'nik_jenazah' => 'NIK Jenazah',
                'nama_jenazah' => 'Nama Jenazah',
                'jk_jenazah' => 'Jenis Kelamin Jenazah',
                'tgl_lahir_jenazah' => 'Tanggal Lahir Jenazah',
                'tempat_lahir' => 'Tempat Lahir Jenazah',
                'agama' => 'Agama Jenazah',
                'pekerjaan_id_jenazah' => 'Pekerjaan Jenazah',
                'alamat_jenazah' => 'Alamat Jenazah',
                'provinsi_id_jenazah' => 'Provinsi Jenazah',
                'kota_id_jenazah' => 'Kota Jenazah',
                'kecamatan_id_jenazah' => 'Kecamatan Jenazah',
                'area_id_jenazah' => 'Desa Jenazah',
                'kewarganegaraan' => 'Kewarganegaraan Jenazah',
                'kebangsaan' => 'Kebangsaan Jenazah',
                'anak_ke' => 'Anak Ke',
                'tgl_kematian' => 'Tanggal Kematian',
                'pukul' => 'Pukul',
                'sebab_kematian' => 'Sebab Kematian',
                'tempat_kematian' => 'Tempat Kematian',
                'yang_menerangkan' => 'Yang Menerangkan',
                'nik_ibu' => 'NIK Ibu',
                'nama_ibu' => 'Nama Ibu',
                'umur_ibu' => 'Umur Ibu',
                'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
                'alamat_ibu' => 'Alamat Ibu',
                'provinsi_id_ibu' => 'Provinsi Ibu',
                'kota_id_ibu' => 'Kota Ibu',
                'kecamatan_id_ibu' => 'Kecamatan Ibu',
                'area_id_ibu' => 'Desa Ibu',
                'nik_ayah' => 'NIK Ayah',
                'nama_ayah' => 'Nama Ayah',
                'umur_ayah' => 'Umur Ayah',
                'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
                'alamat_ayah' => 'Alamat Ayah',
                'provinsi_id_ayah' => 'Provinsi Ayah',
                'kota_id_ayah' => 'Kota Ayah',
                'kecamatan_id_ayah' => 'Kecamatan Ayah',
                'area_id_ayah' => 'Desa Ayah',
                'nik_pelapor' => 'NIK Pelapor',
                'nama_pelapor' => 'Nama Pelapor',
                'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
                'alamat_pelapor' => 'Alamat',
                'umur_pelapor' => 'Umur',
                'hubungan' => 'Hubungan',
                'nik_saksi1' => 'NIK Saksi 1',
                'nama_saksi1' => 'Nama Saksi 1',
                'nik_saksi2' => 'NIK Saksi 2',
                'nama_saksi2' => 'Nama Saksi 2',
                'file_sk_rs' => 'File SK Rumah Sakit',
                'file_ktp_pelapor' => 'File KTP Pelapor',
                'file_ktp_alm' => 'File KTP Alm',
                'file_ktp_saksi' => 'File KTP Saksi',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sk_rs')){
                    if(\File::exists('backend/images/dokumen/skm/sk_rs/'.$skm->file_sk_rs)){
                        \File::delete('backend/images/dokumen/skm/sk_rs/'.$skm->file_sk_rs);
                    }
                $sk_rs = $request->file('file_sk_rs');
                $destinationPathRs = public_path('backend/images/dokumen/skm/sk_rs');
                $nama_sk_rs = 'skm_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'_'.date('YmdHis').'.'.$sk_rs->getClientOriginalExtension();
            }else{
                    $nama_sk_rs=$skm->file_sk_rs;
            }
    
            if($request->file('file_ktp_pelapor')){
                    if(\File::exists('backend/images/dokumen/skm/ktp_pelapor/'.$skm->file_ktp_pelapor)){
                        \File::delete('backend/images/dokumen/skm/ktp_pelapor/'.$skm->file_ktp_pelapor);
                    }
                $ktp_pelapor = $request->file('file_ktp_pelapor');
                $destinationPathPelapor = public_path('backend/images/dokumen/skm/ktp_pelapor');
                $nama_ktp_pelapor = 'skm_pelapor_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'.'.'_'.date('YmdHis').'.'.$ktp_pelapor->getClientOriginalExtension();
            }else{
                    $nama_ktp_pelapor=$skm->file_ktp_pelapor;
            }
    
            if($request->file('file_ktp_alm')){
                    if(\File::exists('backend/images/dokumen/skm/ktp_alm/'.$skm->file_ktp_alm)){
                        \File::delete('backend/images/dokumen/skm/ktp_alm/'.$skm->file_ktp_alm);
                    }
                $ktp_alm = $request->file('file_ktp_alm');
                $destinationPathAlm = public_path('backend/images/dokumen/skm/ktp_alm');
                $nama_ktp_alm = 'skm_ktp'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'.'.'_'.date('YmdHis').'.'.$ktp_alm->getClientOriginalExtension();
            }else{
                    $nama_ktp_alm=$skm->file_ktp_alm;
            }
    
            if($request->file('file_ktp_saksi')){
                    if(\File::exists('backend/images/dokumen/skm/ktp_saksi/'.$skm->file_ktp_saksi)){
                        \File::delete('backend/images/dokumen/skm/ktp_saksi/'.$skm->file_ktp_saksi);
                    }
                $ktp_saksi = $request->file('file_ktp_saksi');
                $destinationPathSaksi = public_path('backend/images/dokumen/skm/ktp_saksi');
                $nama_ktp_saksi = 'skm_saksi_'.strtolower(str_replace(' ','_',$request->nama_jenazah)).'_'.date('YmdHis').'.'.$ktp_saksi->getClientOriginalExtension();
            }else{
                    $nama_ktp_saksi=$skm->file_ktp_saksi;
            }
    
            $data = [
                'status' => '1',
                'nama_kepala_keluarga' => $request->input('nama_kepala_keluarga'),
                'no_kk' => $request->input('no_kk'),
                'nama_jenazah' => $request->input('nama_jenazah'),
                'nik_jenazah' => $request->input('nik_jenazah'),
                'jk_jenazah' => $request->input('jk_jenazah'),
                'tgl_lahir_jenazah' => $request->input('tgl_lahir_jenazah'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'agama' => $request->input('agama'),
                'pekerjaan_id_jenazah' => $request->input('pekerjaan_id_jenazah'),
                'alamat_jenazah' => $request->input('alamat_jenazah'),
                'provinsi_id_jenazah' => $request->input('provinsi_id_jenazah'),
                'kota_id_jenazah' => $request->input('kota_id_jenazah'),
                'kecamatan_id_jenazah' => $request->input('kecamatan_id_jenazah'),
                'area_id_jenazah' => $request->input('area_id_jenazah'),
                'kewarganegaraan' => $request->input('kewarganegaraan'),
                'keturunan' => $request->input('keturunan'),
                'kebangsaan' => $request->input('kebangsaan'),
                'anak_ke' => $request->input('anak_ke'),
                'tgl_kematian' => $request->input('tgl_kematian'),
                'pukul' => $request->input('pukul'),
                'sebab_kematian' => $request->input('sebab_kematian'),
                'tempat_kematian' => $request->input('tempat_kematian'),
                'yang_menerangkan' => $request->input('yang_menerangkan'),
                'nik_ibu' => $request->input('nik_ibu'),
                'nama_ibu' => $request->input('nama_ibu'),
                'umur_ibu' => $request->input('umur_ibu'),
                'pekerjaan_id_ibu' => $request->input('pekerjaan_id_ibu'),
                'alamat_ibu' => $request->input('alamat_ibu'),
                'provinsi_id_ibu' => $request->input('provinsi_id_ibu'),
                'kota_id_ibu' => $request->input('kota_id_ibu'),
                'kecamatan_id_ibu' => $request->input('kecamatan_id_ibu'),
                'area_id_ibu' => $request->input('area_id_ibu'),
                'nik_ayah' => $request->input('nik_ayah'),
                'nama_ayah' => $request->input('nama_ayah'),
                'umur_ayah' => $request->input('umur_ayah'),
                'pekerjaan_id_ayah' => $request->input('pekerjaan_id_ayah'),
                'alamat_ayah' => $request->input('alamat_ayah'),
                'provinsi_id_ayah' => $request->input('provinsi_id_ayah'),
                'kota_id_ayah' => $request->input('kota_id_ayah'),
                'kecamatan_id_ayah' => $request->input('kecamatan_id_ayah'),
                'area_id_ayah' => $request->input('area_id_ayah'),
                'nik_pelapor' => $request->input('nik_pelapor'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'pekerjaan_id_pelapor' => $request->input('pekerjaan_id_pelapor'),
                'umur_pelapor' => $request->input('umur_pelapor'),
                'alamat_pelapor' => $request->input('alamat_pelapor'),
                'hubungan' => $request->input('hubungan'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'nama_saksi2' => $request->input('nama_saksi2'),  
                'file_sk_rs' => $nama_sk_rs,
                'file_ktp_pelapor' => $nama_ktp_pelapor,
                'file_ktp_alm' => $nama_ktp_alm,
                'file_ktp_saksi' => $nama_ktp_saksi,
            ];

            $skm->update($data);

            $log = $this->updateNotifikasi($skm->id,'skm',$skm->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skm->id,'skm');

            \DB::commit();
            if($request->file('file_sk_rs')){
                $sk_rs->move($destinationPathRs,$nama_sk_rs);
            }
            if($request->file('file_ktp_pelapor')){
                $ktp_pelapor->move($destinationPathPelapor,$nama_ktp_pelapor);
            }
            if($request->file('file_ktp_saksi')){
                $ktp_saksi->move($destinationPathSaksi,$nama_ktp_saksi);
            }
            if($request->file('file_ktp_alm')){
                $ktp_alm->move($destinationPathAlm,$nama_ktp_alm);
            }
            
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Kematian berhasil di perbaharui','Sukses');
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
