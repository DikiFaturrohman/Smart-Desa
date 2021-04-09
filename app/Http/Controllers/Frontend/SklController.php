<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LogSuket;
use App\Models\SKK;
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

class SklController extends Controller
{
    public function index()
    {
        try{
            $data['pekerjaan'] = Pekerjaan::get();
            $data['provinsi'] = Provinsi::get();
            return view('frontend.formSurat.skl',$data);
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
                return view('webview.skl',$data);
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
                'nama_bayi' => 'required',
                'tempat_dilahirkan' => 'required|',
                'tempat_lahir' => 'required',
                'jk_bayi' => 'required',
                'hari' => 'required',
                'tgl_lahir_bayi' => 'required',
                'pukul' => 'required',
                'jenis_kelahiran' => 'required',
                'kelahiran_ke' => 'required',
                'penolong_kelahiran' => 'required',
                'panjang_bayi' => 'required',
                'berat_bayi' => 'required',
                'nik_ibu' => 'required|max:16|min:16',
                'nama_ibu' => 'required',
                'tgl_lahir_ibu' => 'required',
                'pekerjaan_id_ibu' => 'required',
                'alamat_ibu' => 'required',
                'provinsi_id_ibu' => 'required',
                'kota_id_ibu' => 'required',
                'kecamatan_id_ibu' => 'required',
                'area_id_ibu' => 'required',
                'kewarganegaraan_ibu' => 'required',
                'kebangsaan_ibu' => 'required',
                'tgl_pencatatan_perkawinan' => 'required',
                'nik_ayah' => 'required|min:16',
                'nama_ayah' => 'required',
                'tgl_lahir_ayah' => 'required',
                'pekerjaan_id_ayah' => 'required',
                'alamat_ayah' => 'required',
                'provinsi_id_ayah' => 'required',
                'kota_id_ayah' => 'required',
                'kecamatan_id_ayah' => 'required',
                'area_id_ayah' => 'required',
                'kewarganegaraan_ayah' => 'required',
                'kebangsaan_ayah' => 'required',
                'nik_pelapor' => 'required|min:16',
                'nama_pelapor' => 'required',
                'umur_pelapor' => 'required',
                'jk_pelapor' => 'required',
                'pekerjaan_id_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'provinsi_id_pelapor' => 'required',
                'kota_id_pelapor' => 'required',
                'kecamatan_id_pelapor' => 'required',
                'area_id_pelapor' => 'required',
                'nik_saksi1' => 'required|min:16',
                'nama_saksi1' => 'required',
                'umur_saksi1' => 'required',
                'jk_saksi1' => 'required',
                'pekerjaan_id_saksi1' => 'required',
                'alamat_saksi1' => 'required',
                'provinsi_id_saksi1' => 'required',
                'kota_id_saksi1' => 'required',
                'kecamatan_id_saksi1' => 'required',
                'area_id_saksi1' => 'required',
                'nik_saksi2' => 'required|min:16',
                'nama_saksi2' => 'required',
                'umur_saksi2' => 'required',
                'jk_saksi2' => 'required',
                'pekerjaan_id_saksi2' => 'required',
                'alamat_saksi2' => 'required',
                'provinsi_id_saksi2' => 'required',
                'kota_id_saksi2' => 'required',
                'kecamatan_id_saksi2' => 'required',
                'area_id_saksi2' => 'required',
                'file_sk_kelahiran' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_surat_nikah' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ayah' => 'required|max:1024|mimes:jpeg,jpg,png',
                'file_ibu' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
        
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
                'no_kk' => 'No Kartu Keluarga',
                'nama_bayi' => 'Nama Bayi',
                'tempat_dilahirkan' => 'Tempat Dilahirkan',
                'tempat_lahir' => 'Tempat Lahir',
                'jk_bayi' => 'Jenis Kelamin Bayi',
                'hari' => 'Hari',
                'tgl_lahir_bayi' => 'Tanggal Lahir Bayi',
                'pukul' => 'Pukul',
                'jenis_kelahiran' => 'Jenis Kelamin',
                'kelahiran_ke' => 'Kelahiran Ke',
                'penolong_kelahiran' => 'Panjang Bayi',
                'panjang_bayi' => 'Panjang Bayi',
                'berat_bayi' => 'Berat Bayi',
                'nik_ibu' => 'NIK Ibu',
                'nama_ibu' => 'Nama Ibu',
                'tgl_lahir_ibu' => 'Tanggal Lahir Ibu',
                'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
                'alamat_ibu' => 'Alamat Ibu',
                'provinsi_id_ibu' => 'Provinsi',
                'kota_id_ibu' => 'Kota',
                'kecamatan_id_ibu' => 'Kecamatan',
                'area_id_ibu' => 'Desa',
                'kewarganegaraan_ibu' => 'Kewarganegaraan',
                'kebangsaan_ibu' => 'Kebangsaan',
                'tgl_pencatatan_perkawinan' => 'Tanggal Pencatatan Perkawinan',
                'nik_ayah' => 'NIK Ayah',
                'nama_ayah' => 'Nama Ayah',
                'tgl_lahir_ayah' => 'Tanggal Lahir Ayah',
                'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
                'alamat_ayah' => 'Alamat Ayah',
                'provinsi_id_ayah' => 'Provinsi',
                'kota_id_ayah' => 'Kota',
                'kecamatan_id_ayah' => 'Kecamatan',
                'area_id_ayah' => 'Desa',
                'kewarganegaraan_ayah' => 'Kewarganegaraan',
                'kebangsaan_ayah' => 'Kebangsaan',
                'nik_pelapor' => 'NIK Pelapor',
                'nama_pelapor' => 'Nama Pelapor',
                'umur_pelapor' => 'Umur Pelapor',
                'jk_pelapor' => 'Jenis Kelamin Pelapor',
                'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
                'alamat_pelapor' => 'Alamat Pelapor',
                'provinsi_id_pelapor' => 'Provinsi Pelapor',
                'kota_id_pelapor' => 'Kota',
                'kecamatan_id_pelapor' => ' Kecamatan',
                'area_id_pelapor' => 'Desa',
                'nik_saksi1' => 'NIK Saksi 1',
                'nama_saksi1' => 'Nama Saksi 1',
                'umur_saksi1' => 'Umur Saksi 1',
                'jk_saksi1' => 'Jenis Kelamin Saksi 1',
                'pekerjaan_id_saksi1' => 'Pekerjaan Saksi 1',
                'alamat_saksi1' => 'Alamat Saksi 1',
                'provinsi_id_saksi1' => 'Provinsi',
                'kota_id_saksi1' => 'Kota',
                'kecamatan_id_saksi1' => 'Kecamatan',
                'area_id_saksi1' => 'Desa',
                'nik_saksi2' => 'NIK Saksi 2',
                'nama_saksi2' => 'Nama Saksi 2',
                'jk_saksi2' => 'Jenis Kelamin Saksi 2',
                'umur_saksi2' => 'Umur Saksi 2',
                'pekerjaan_id_saksi2' => 'Pekerjaan Saksi 2',
                'alamat_saksi2' => 'Alamat Saksi 2',
                'provinsi_id_saksi2' => 'Provinsi',
                'kota_id_saksi2' => 'Kota',
                'kecamatan_id_saksi2' => 'Kecamatan',
                'area_id_saksi2' => 'Desa',
                'file_sk_kelahiran' => 'File SK Kelahiran',
                'file_surat_nikah' => 'File Surat Nikah',
                'file_kk' => 'File KK',
                'file_ayah' => 'File KTP Ayah',
                'file_ibu' => 'File KTP Ibu',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sk_kelahiran')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skk/sk_kelahiran/'.$skk->file_sk_kelahiran)){
                        \File::delete('backend/images/dokumen/skk/sk_kelahiran/'.$skk->file_sk_kelahiran);
                    }
                }
                $sk_kelahiran = $request->file('file_sk_kelahiran');
                $destinationPathKelahiran = public_path('backend/images/dokumen/skk/sk_kelahiran');
                $nama_sk_kelahiran = 'skk_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$sk_kelahiran->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_sk_kelahiran=$skk->file_sk_kelahiran;
                }
            }
    
            if($request->file('file_surat_nikah')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skk/surat_nikah/'.$skk->file_surat_nikah)){
                        \File::delete('backend/images/dokumen/skk/surat_nikah/'.$skk->file_surat_nikah);
                    }
                }
                $surat_nikah = $request->file('file_surat_nikah');
                $destinationPathSn = public_path('backend/images/dokumen/skk/surat_nikah');
                $nama_surat_nikah = 'skk_nikah_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'.'.'_'.date('YmdHis').'.'.$surat_nikah->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_surat_nikah=$skk->file_surat_nikah;
                }
            }
    
            if($request->file('file_kk')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skk/kk/'.$skk->file_kk)){
                        \File::delete('backend/images/dokumen/skk/kk/'.$skk->file_kk);
                    }
                }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skk/kk');
                $nama_kk = 'skk_kk'.strtolower(str_replace(' ','_',$request->nama_bayi)).'.'.'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_kk=$skk->file_kk;
                }
            }
    
            if($request->file('file_ayah')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skk/file_ayah/'.$skk->file_ayah)){
                        \File::delete('backend/images/dokumen/skk/file_ayah/'.$skk->file_ayah);
                    }
                }
                $file_ayah = $request->file('file_ayah');
                $destinationPathAyah = public_path('backend/images/dokumen/skk/file_ayah');
                $nama_file_ayah = 'skk_file_ayah_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$file_ayah->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_file_ayah=$skk->file_ayah;
                }
            }
    
            if($request->file('file_ibu')){
                if(!empty($request->id)){
                    if(\File::exists('backend/images/dokumen/skk/file_ibu/'.$skk->file_ibu)){
                        \File::delete('backend/images/dokumen/skk/file_ibu/'.$skk->file_ibu);
                    }
                }
                $file_ibu = $request->file('file_ibu');
                $destinationPathIbu = public_path('backend/images/dokumen/skk/file_ibu');
                $nama_file_ibu = 'skk_file_ibu_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$file_ibu->getClientOriginalExtension();
            }else{
                if($request->id){
                    $nama_file_ibu=$skk->file_ibu;
                }
            }
    
            $data = [
                'id' => $this->generateAutoNumber('ds_sk_kelahiran'),
                'desa_id' => Session::get('desa_id'),
                'user_id' => $user->id,
                'status' => '1',
                'nama_kepala_keluarga' => $request->input('nama_kepala_keluarga'),
                'no_kk' => $request->input('no_kk'),
                'nama_bayi' => $request->input('nama_bayi'),
                'jk_bayi' => $request->input('jk_bayi'),
                'tempat_dilahirkan' => $request->input('tempat_dilahirkan'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'hari' => $request->input('hari'),
                'tgl_lahir_bayi' => $request->input('tgl_lahir_bayi'),
                'pukul' => $request->input('pukul'),
                'jenis_kelahiran' => $request->input('jenis_kelahiran'),
                'kelahiran_ke' => $request->input('kelahiran_ke'),'penolong_kelahiran' => $request->input('penolong_kelahiran'),
                'berat_bayi' => $request->input('berat_bayi'),
                'panjang_bayi' => $request->input('panjang_bayi'),
                'nik_ibu' => $request->input('nik_ibu'),
                'nama_ibu' => $request->input('nama_ibu'),
                'tgl_lahir_ibu' => $request->input('tgl_lahir_ibu'),
                'pekerjaan_id_ibu' => $request->input('pekerjaan_id_ibu'),
                'alamat_ibu' => $request->input('alamat_ibu'),
                'provinsi_id_ibu' => $request->input('provinsi_id_ibu'),
                'kota_id_ibu' => $request->input('kota_id_ibu'),'kecamatan_id_ibu' => $request->input('kecamatan_id_ibu'),
                'area_id_ibu' => $request->input('area_id_ibu'),
                'kewarganegaraan_ibu' => $request->input('kewarganegaraan_ibu'),
                'kebangsaan_ibu' => $request->input('kebangsaan_ibu'),
                'tgl_pencatatan_perkawinan' => $request->input('tgl_pencatatan_perkawinan'),
                'nik_ayah' => $request->input('nik_ayah'),
                'nama_ayah' => $request->input('nama_ayah'),
                'tgl_lahir_ayah' => $request->input('tgl_lahir_ayah'),
                'pekerjaan_id_ayah' => $request->input('pekerjaan_id_ayah'),
                'alamat_ayah' => $request->input('alamat_ayah'),
                'provinsi_id_ayah' => $request->input('provinsi_id_ayah'),
                'kota_id_ayah' => $request->input('kota_id_ayah'),
                'kecamatan_id_ayah' => $request->input('kecamatan_id_ayah'),
                'area_id_ayah' => $request->input('area_id_ayah'),
                'kewarganegaraan_ayah' => $request->input('kewarganegaraan_ayah'),
                'kebangsaan_ayah' => $request->input('kebangsaan_ayah'),
                'nik_pelapor' => $request->input('nik_pelapor'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'umur_pelapor' => $request->input('umur_pelapor'),
                'jk_pelapor' => $request->input('jk_pelapor'),
                'pekerjaan_id_pelapor' => $request->input('pekerjaan_id_pelapor'),
                'alamat_pelapor' => $request->input('alamat_pelapor'),
                'provinsi_id_pelapor' => $request->input('provinsi_id_pelapor'),
                'kota_id_pelapor' => $request->input('kota_id_pelapor'),
                'kecamatan_id_pelapor' => $request->input('kecamatan_id_pelapor'),
                'area_id_pelapor' => $request->input('area_id_pelapor'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'umur_saksi1' => $request->input('umur_saksi1'),
                'jk_saksi1' => $request->input('jk_saksi1'),
                'pekerjaan_id_saksi1' => $request->input('pekerjaan_id_saksi1'),
                'alamat_saksi1' => $request->input('alamat_saksi1'),
                'provinsi_id_saksi1' => $request->input('provinsi_id_saksi1'),
                'kota_id_saksi1' => $request->input('kota_id_saksi1'),
                'kecamatan_id_saksi1' => $request->input('kecamatan_id_saksi1'),
                'area_id_saksi1' => $request->input('area_id_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'umur_saksi2' => $request->input('umur_saksi2'),
                'jk_saksi2' => $request->input('jk_saksi2'),
                'pekerjaan_id_saksi2' => $request->input('pekerjaan_id_saksi2'),
                'alamat_saksi2' => $request->input('alamat_saksi2'),
                'provinsi_id_saksi2' => $request->input('provinsi_id_saksi2'),
                'kota_id_saksi2' => $request->input('kota_id_saksi2'),
                'kecamatan_id_saksi2' => $request->input('kecamatan_id_saksi2'),
                'area_id_saksi2' => $request->input('area_id_saksi2'),
                'file_sk_kelahiran' => $nama_sk_kelahiran,
                'file_surat_nikah' => $nama_surat_nikah,
                'file_kk' => $nama_kk,
                'file_ibu' => $nama_file_ibu,
                'file_ayah' => $nama_file_ayah,
            ];

            $skk = SKK::create($data);

            $log = $this->suketLogNotifikasi($skk,'skk','Pengajuan','Pengajuan Surat Keterangan Kelahiran telah berhasil dibuat oleh user','user','terima');

            $admin = $this->getAdmin('operator',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Pengajuan','Pengajuan Surat Keterangan Kelahiran Baru oleh '.$user->nama_lengkap);

            $kirimSms = $this->kirimSms($skk,$user->no_telpon,'Surat Keterangan Kematian');
            $generateFile = (new GenerateFileAction)->run($skk->id,'skk');
            
            // $sendMail = Mail::to($user->email)->send(new NotifSuket($user,$skk,'Surat Keterangan Kelahiran'));
            \DB::commit();

            $sk_kelahiran->move($destinationPathKelahiran,$nama_sk_kelahiran);
            $file_ayah->move($destinationPathAyah,$nama_file_ayah);
            $file_ibu->move($destinationPathIbu,$nama_file_ibu);
            $kk->move($destinationPathKk,$nama_kk);
            $surat_nikah->move($destinationPathSn,$nama_surat_nikah);

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
                $data['skk'] = SKK::where('id',$request->id)->where('desa_id',Session::get('desa_id'))->first();
                return view('webview.sklDetail',$data);
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
            $data['skl'] = SKK::where('id',$id)->where('user_id',Auth::guard('masyarakat')->user()->id)->where('desa_id',Session::get('desa_id'))->first();
            $data['provinsi'] = Provinsi::all();
            $data['kotaAyah'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_ayah)->get();
            $data['kecamatanAyah'] = Kecamatan::where('kota_id',$data['skl']->kota_id_ayah)->get();
            $data['areaAyah'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_ayah)->get();
            
            $data['kotaIbu'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_ibu)->get();
            $data['kecamatanIbu'] = Kecamatan::where('kota_id',$data['skl']->kota_id_ibu)->get();
            $data['areaIbu'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_ibu)->get();
            
            $data['kotaPelapor'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_pelapor)->get();
            $data['kecamatanPelapor'] = Kecamatan::where('kota_id',$data['skl']->kota_id_pelapor)->get();
            $data['areaPelapor'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_pelapor)->get();

            $data['kotaSaksi1'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_saksi1)->get();
            $data['kecamatanSaksi1'] = Kecamatan::where('kota_id',$data['skl']->kota_id_saksi1)->get();
            $data['areaSaksi1'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_saksi1)->get();

            $data['kotaSaksi2'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_saksi2)->get();
            $data['kecamatanSaksi2'] = Kecamatan::where('kota_id',$data['skl']->kota_id_saksi2)->get();
            $data['areaSaksi2'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_saksi2)->get();
            return view('frontend.formSurat.sklEdit',$data);
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
                $data['skl'] = SKK::where('id',$request->suket_id)->where('user_id',$user->id)->where('desa_id',Session::get('desa_id'))->first();
                $data['provinsi'] = Provinsi::all();
                $data['kotaAyah'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_ayah)->get();
                $data['kecamatanAyah'] = Kecamatan::where('kota_id',$data['skl']->kota_id_ayah)->get();
                $data['areaAyah'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_ayah)->get();
                
                $data['kotaIbu'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_ibu)->get();
                $data['kecamatanIbu'] = Kecamatan::where('kota_id',$data['skl']->kota_id_ibu)->get();
                $data['areaIbu'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_ibu)->get();
                
                $data['kotaPelapor'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_pelapor)->get();
                $data['kecamatanPelapor'] = Kecamatan::where('kota_id',$data['skl']->kota_id_pelapor)->get();
                $data['areaPelapor'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_pelapor)->get();

                $data['kotaSaksi1'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_saksi1)->get();
                $data['kecamatanSaksi1'] = Kecamatan::where('kota_id',$data['skl']->kota_id_saksi1)->get();
                $data['areaSaksi1'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_saksi1)->get();

                $data['kotaSaksi2'] = Kota::where('provinsi_id',$data['skl']->provinsi_id_saksi2)->get();
                $data['kecamatanSaksi2'] = Kecamatan::where('kota_id',$data['skl']->kota_id_saksi2)->get();
                $data['areaSaksi2'] = Desa::where('kecamatan_id',$data['skl']->kecamatan_id_saksi2)->get();
                return view('webview.sklEdit',$data);
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

            $skk = SKK::where('id',$request->suket_id)->where('desa_id',Session::get('desa_id'))->where('no_surat',null)->first();
            
            $rules = [
                'nama_kepala_keluarga' => 'required',
                'no_kk' => 'required|min:16',
                'nama_bayi' => 'required',
                'tempat_dilahirkan' => 'required',
                'tempat_lahir' => 'required',
                'jk_bayi' => 'required',
                'hari' => 'required',
                'tgl_lahir_bayi' => 'required',
                'pukul' => 'required',
                'jenis_kelahiran' => 'required',
                'kelahiran_ke' => 'required',
                'penolong_kelahiran' => 'required',
                'panjang_bayi' => 'required',
                'berat_bayi' => 'required',
                'nik_ibu' => 'required|min:16',
                'nama_ibu' => 'required',
                'tgl_lahir_ibu' => 'required',
                'pekerjaan_id_ibu' => 'required',
                'alamat_ibu' => 'required',
                'provinsi_id_ibu' => 'required',
                'kota_id_ibu' => 'required',
                'kecamatan_id_ibu' => 'required',
                'area_id_ibu' => 'required',
                'kewarganegaraan_ibu' => 'required',
                'kebangsaan_ibu' => 'required',
                'tgl_pencatatan_perkawinan' => 'required',
                'nik_ayah' => 'required|min:16',
                'nama_ayah' => 'required',
                'tgl_lahir_ayah' => 'required',
                'pekerjaan_id_ayah' => 'required',
                'alamat_ayah' => 'required',
                'provinsi_id_ayah' => 'required',
                'kota_id_ayah' => 'required',
                'kecamatan_id_ayah' => 'required',
                'area_id_ayah' => 'required',
                'kewarganegaraan_ayah' => 'required',
                'kebangsaan_ayah' => 'required',
                'nik_pelapor' => 'required|min:16',
                'nama_pelapor' => 'required',
                'umur_pelapor' => 'required',
                'jk_pelapor' => 'required',
                'pekerjaan_id_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'provinsi_id_pelapor' => 'required',
                'kota_id_pelapor' => 'required',
                'kecamatan_id_pelapor' => 'required',
                'area_id_pelapor' => 'required',
                'nik_saksi1' => 'required|min:16',
                'nama_saksi1' => 'required',
                'umur_saksi1' => 'required',
                'jk_saksi1' => 'required',
                'pekerjaan_id_saksi1' => 'required',
                'alamat_saksi1' => 'required',
                'provinsi_id_saksi1' => 'required',
                'kota_id_saksi1' => 'required',
                'kecamatan_id_saksi1' => 'required',
                'area_id_saksi1' => 'required',
                'nik_saksi2' => 'required|min:16',
                'nama_saksi2' => 'required',
                'umur_saksi2' => 'required',
                'jk_saksi2' => 'required',
                'pekerjaan_id_saksi2' => 'required',
                'alamat_saksi2' => 'required',
                'provinsi_id_saksi2' => 'required',
                'kota_id_saksi2' => 'required',
                'kecamatan_id_saksi2' => 'required',
                'area_id_saksi2' => 'required',
                'file_sk_kelahiran' => 'max:1024|mimes:jpeg,jpg,png',
                'file_surat_nikah' => 'max:1024|mimes:jpeg,jpg,png',
                'file_kk' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ayah' => 'max:1024|mimes:jpeg,jpg,png',
                'file_ibu' => 'max:1024|mimes:jpeg,jpg,png',
            ];
        
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max kb/1 MB',
                'min' => ':attribute maksimal :min karakter',
            ];

            $label = [
                'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
                'no_kk' => 'No Kartu Keluarga',
                'nama_bayi' => 'Nama Bayi',
                'tempat_dilahirkan' => 'Tempat Dilahirkan',
                'tempat_lahir' => 'Tempat Lahir',
                'jk_bayi' => 'Jenis Kelamin Bayi',
                'hari' => 'Hari',
                'tgl_lahir_bayi' => 'Tanggal Lahir Bayi',
                'pukul' => 'Pukul',
                'jenis_kelahiran' => 'Jenis Kelamin',
                'kelahiran_ke' => 'Kelahiran Ke',
                'penolong_kelahiran' => 'Panjang Bayi',
                'panjang_bayi' => 'Panjang Bayi',
                'berat_bayi' => 'Berat Bayi',
                'nik_ibu' => 'NIK Ibu',
                'nama_ibu' => 'Nama Ibu',
                'tgl_lahir_ibu' => 'Tanggal Lahir Ibu',
                'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
                'alamat_ibu' => 'Alamat Ibu',
                'provinsi_id_ibu' => 'Provinsi',
                'kota_id_ibu' => 'Kota',
                'kecamatan_id_ibu' => 'Kecamatan',
                'area_id_ibu' => 'Desa',
                'kewarganegaraan_ibu' => 'Kewarganegaraan',
                'kebangsaan_ibu' => 'Kebangsaan',
                'tgl_pencatatan_perkawinan' => 'Tanggal Pencatatan Perkawinan',
                'nik_ayah' => 'NIK Ayah',
                'nama_ayah' => 'Nama Ayah',
                'tgl_lahir_ayah' => 'Tanggal Lahir Ayah',
                'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
                'alamat_ayah' => 'Alamat Ayah',
                'provinsi_id_ayah' => 'Provinsi',
                'kota_id_ayah' => 'Kota',
                'kecamatan_id_ayah' => 'Kecamatan',
                'area_id_ayah' => 'Desa',
                'kewarganegaraan_ayah' => 'Kewarganegaraan',
                'kebangsaan_ayah' => 'Kebangsaan',
                'nik_pelapor' => 'NIK Pelapor',
                'nama_pelapor' => 'Nama Pelapor',
                'umur_pelapor' => 'Umur Pelapor',
                'jk_pelapor' => 'Jenis Kelamin Pelapor',
                'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
                'alamat_pelapor' => 'Alamat Pelapor',
                'provinsi_id_pelapor' => 'Provinsi Pelapor',
                'kota_id_pelapor' => 'Kota',
                'kecamatan_id_pelapor' => ' Kecamatan',
                'area_id_pelapor' => 'Desa',
                'nik_saksi1' => 'NIK Saksi 1',
                'nama_saksi1' => 'Nama Saksi 1',
                'umur_saksi1' => 'Umur Saksi 1',
                'jk_saksi1' => 'Jenis Kelamin Saksi 1',
                'pekerjaan_id_saksi1' => 'Pekerjaan Saksi 1',
                'alamat_saksi1' => 'Alamat Saksi 1',
                'provinsi_id_saksi1' => 'Provinsi',
                'kota_id_saksi1' => 'Kota',
                'kecamatan_id_saksi1' => 'Kecamatan',
                'area_id_saksi1' => 'Desa',
                'nik_saksi2' => 'NIK Saksi 2',
                'nama_saksi2' => 'Nama Saksi 2',
                'jk_saksi2' => 'Jenis Kelamin Saksi 2',
                'umur_saksi2' => 'Umur Saksi 2',
                'pekerjaan_id_saksi2' => 'Pekerjaan Saksi 2',
                'alamat_saksi2' => 'Alamat Saksi 2',
                'provinsi_id_saksi2' => 'Provinsi',
                'kota_id_saksi2' => 'Kota',
                'kecamatan_id_saksi2' => 'Kecamatan',
                'area_id_saksi2' => 'Desa',
                'file_sk_kelahiran' => 'File SK Kelahiran',
                'file_surat_nikah' => 'File Surat Nikah',
                'file_kk' => 'File KK',
                'file_ayah' => 'File KTP Ayah',
                'file_ibu' => 'File KTP Ibu',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('file_sk_kelahiran')){
                    if(\File::exists('backend/images/dokumen/skk/sk_kelahiran/'.$skk->file_sk_kelahiran)){
                        \File::delete('backend/images/dokumen/skk/sk_kelahiran/'.$skk->file_sk_kelahiran);
                    }
                $sk_kelahiran = $request->file('file_sk_kelahiran');
                $destinationPathKelahiran = public_path('backend/images/dokumen/skk/sk_kelahiran');
                $nama_sk_kelahiran = 'skk_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$sk_kelahiran->getClientOriginalExtension();
            }else{
                    $nama_sk_kelahiran=$skk->file_sk_kelahiran;
            }
    
            if($request->file('file_surat_nikah')){
                    if(\File::exists('backend/images/dokumen/skk/surat_nikah/'.$skk->file_surat_nikah)){
                        \File::delete('backend/images/dokumen/skk/surat_nikah/'.$skk->file_surat_nikah);
                    }
                $surat_nikah = $request->file('file_surat_nikah');
                $destinationPathSn = public_path('backend/images/dokumen/skk/surat_nikah');
                $nama_surat_nikah = 'skk_nikah_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$surat_nikah->getClientOriginalExtension();
            }else{
                    $nama_surat_nikah=$skk->file_surat_nikah;
            }
    
            if($request->file('file_kk')){
                    if(\File::exists('backend/images/dokumen/skk/kk/'.$skk->file_kk)){
                        \File::delete('backend/images/dokumen/skk/kk/'.$skk->file_kk);
                    }
                $kk = $request->file('file_kk');
                $destinationPathKk = public_path('backend/images/dokumen/skk/kk');
                $nama_kk = 'skk_kk'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$kk->getClientOriginalExtension();
            }else{
                    $nama_kk=$skk->file_kk;
            }
    
            if($request->file('file_ayah')){
                    if(\File::exists('backend/images/dokumen/skk/file_ayah/'.$skk->file_ayah)){
                        \File::delete('backend/images/dokumen/skk/file_ayah/'.$skk->file_ayah);
                    }
                $file_ayah = $request->file('file_ayah');
                $destinationPathAyah = public_path('backend/images/dokumen/skk/file_ayah');
                $nama_file_ayah = 'skk_file_ayah_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$file_ayah->getClientOriginalExtension();
            }else{
                    $nama_file_ayah=$skk->file_ayah;
            }
    
            if($request->file('file_ibu')){
                    if(\File::exists('backend/images/dokumen/skk/file_ibu/'.$skk->file_ibu)){
                        \File::delete('backend/images/dokumen/skk/file_ibu/'.$skk->file_ibu);
                    }
                $file_ibu = $request->file('file_ibu');
                $destinationPathIbu = public_path('backend/images/dokumen/skk/file_ibu');
                $nama_file_ibu = 'skk_file_ibu_'.strtolower(str_replace(' ','_',$request->nama_bayi)).'_'.date('YmdHis').'.'.$file_ibu->getClientOriginalExtension();
            }else{
                    $nama_file_ibu=$skk->file_ibu;
            }
    
            $data = [
                'status' => '1',
                'nama_kepala_keluarga' => $request->input('nama_kepala_keluarga'),
                'no_kk' => $request->input('no_kk'),
                'nama_bayi' => $request->input('nama_bayi'),
                'jk_bayi' => $request->input('jk_bayi'),
                'tempat_dilahirkan' => $request->input('tempat_dilahirkan'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'hari' => $request->input('hari'),
                'tgl_lahir_bayi' => $request->input('tgl_lahir_bayi'),
                'pukul' => $request->input('pukul'),
                'jenis_kelahiran' => $request->input('jenis_kelahiran'),
                'kelahiran_ke' => $request->input('kelahiran_ke'),'penolong_kelahiran' => $request->input('penolong_kelahiran'),
                'berat_bayi' => $request->input('berat_bayi'),
                'panjang_bayi' => $request->input('panjang_bayi'),
                'nik_ibu' => $request->input('nik_ibu'),
                'nama_ibu' => $request->input('nama_ibu'),
                'tgl_lahir_ibu' => $request->input('tgl_lahir_ibu'),
                'pekerjaan_id_ibu' => $request->input('pekerjaan_id_ibu'),
                'alamat_ibu' => $request->input('alamat_ibu'),
                'provinsi_id_ibu' => $request->input('provinsi_id_ibu'),
                'kota_id_ibu' => $request->input('kota_id_ibu'),'kecamatan_id_ibu' => $request->input('kecamatan_id_ibu'),
                'area_id_ibu' => $request->input('area_id_ibu'),
                'kewarganegaraan_ibu' => $request->input('kewarganegaraan_ibu'),
                'kebangsaan_ibu' => $request->input('kebangsaan_ibu'),
                'tgl_pencatatan_perkawinan' => $request->input('tgl_pencatatan_perkawinan'),
                'nik_ayah' => $request->input('nik_ayah'),
                'nama_ayah' => $request->input('nama_ayah'),
                'tgl_lahir_ayah' => $request->input('tgl_lahir_ayah'),
                'pekerjaan_id_ayah' => $request->input('pekerjaan_id_ayah'),
                'alamat_ayah' => $request->input('alamat_ayah'),
                'provinsi_id_ayah' => $request->input('provinsi_id_ayah'),
                'kota_id_ayah' => $request->input('kota_id_ayah'),
                'kecamatan_id_ayah' => $request->input('kecamatan_id_ayah'),
                'area_id_ayah' => $request->input('area_id_ayah'),
                'kewarganegaraan_ayah' => $request->input('kewarganegaraan_ayah'),
                'kebangsaan_ayah' => $request->input('kebangsaan_ayah'),
                'nik_pelapor' => $request->input('nik_pelapor'),
                'nama_pelapor' => $request->input('nama_pelapor'),
                'umur_pelapor' => $request->input('umur_pelapor'),
                'jk_pelapor' => $request->input('jk_pelapor'),
                'pekerjaan_id_pelapor' => $request->input('pekerjaan_id_pelapor'),
                'alamat_pelapor' => $request->input('alamat_pelapor'),
                'provinsi_id_pelapor' => $request->input('provinsi_id_pelapor'),
                'kota_id_pelapor' => $request->input('kota_id_pelapor'),
                'kecamatan_id_pelapor' => $request->input('kecamatan_id_pelapor'),
                'area_id_pelapor' => $request->input('area_id_pelapor'),
                'nik_saksi1' => $request->input('nik_saksi1'),
                'nama_saksi1' => $request->input('nama_saksi1'),
                'umur_saksi1' => $request->input('umur_saksi1'),
                'jk_saksi1' => $request->input('jk_saksi1'),
                'pekerjaan_id_saksi1' => $request->input('pekerjaan_id_saksi1'),
                'alamat_saksi1' => $request->input('alamat_saksi1'),
                'provinsi_id_saksi1' => $request->input('provinsi_id_saksi1'),
                'kota_id_saksi1' => $request->input('kota_id_saksi1'),
                'kecamatan_id_saksi1' => $request->input('kecamatan_id_saksi1'),
                'area_id_saksi1' => $request->input('area_id_saksi1'),
                'nik_saksi2' => $request->input('nik_saksi2'),
                'nama_saksi2' => $request->input('nama_saksi2'),
                'umur_saksi2' => $request->input('umur_saksi2'),
                'jk_saksi2' => $request->input('jk_saksi2'),
                'pekerjaan_id_saksi2' => $request->input('pekerjaan_id_saksi2'),
                'alamat_saksi2' => $request->input('alamat_saksi2'),
                'provinsi_id_saksi2' => $request->input('provinsi_id_saksi2'),
                'kota_id_saksi2' => $request->input('kota_id_saksi2'),
                'kecamatan_id_saksi2' => $request->input('kecamatan_id_saksi2'),
                'area_id_saksi2' => $request->input('area_id_saksi2'),
                'file_sk_kelahiran' => $nama_sk_kelahiran,
                'file_surat_nikah' => $nama_surat_nikah,
                'file_kk' => $nama_kk,
                'file_ibu' => $nama_file_ibu,
                'file_ayah' => $nama_file_ayah,
            ];

            $skk->update($data);

            $log = $this->updateNotifikasi($skk->id,'skk',$skk->user->nama_lengkap.' telah memperbaharui surat yang diajukan',Session::get('desa_id'));
            $generateFile = (new GenerateFileAction)->run($skk->id,'skk');

            \DB::commit();
            if($request->file('file_sk_kelahiran')){
                $sk_kelahiran->move($destinationPathKelahiran,$nama_sk_kelahiran);
            }
            if($request->file('file_ayah')){
                $file_ayah->move($destinationPathAyah,$nama_file_ayah);
            }
            if($request->file('file_ibu')){
                $file_ibu->move($destinationPathIbu,$nama_file_ibu);
            }
            if($request->file('file_kk')){
                $kk->move($destinationPathKk,$nama_kk);
            }
            if($request->file('file_surat_nikah')){
                $surat_nikah->move($destinationPathSn,$nama_surat_nikah);
            }
            if(Auth::guard('masyarakat')->check()){
                toastr()->success('Pengajuan Surat Keterangan Kematian berhasil di perbaharui','Sukses');
                return redirect()->route('frontend.listprogress');
            }else{
                return view('webview.sukses');
            }
        }catch(\QueryBuilder $e){
            \DB::beginTransaction();
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
