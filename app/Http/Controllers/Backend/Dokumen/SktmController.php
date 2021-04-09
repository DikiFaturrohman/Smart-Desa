<?php

namespace App\Http\Controllers\Backend\Dokumen;

use App\Http\Controllers\Controller;
use App\Actions\GenerateFileAction;
use App\Actions\SignDokumenAction;
use Illuminate\Http\Request;
use App\Models\SKTM;
use App\Models\User;
use App\Models\Admin;
use App\Models\ProfilDesa;
use App\Models\LogSuket;
use App\Mail\SuketMail;
use Str;
use Auth;
use PDF;
use Mail;
use Validator;
use Session;
use App\Actions\PassphraseLogAction;

class SktmController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:sktm');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['sktm'] =SKTM::orderBy('created_at','asc')->orderBy('status','asc')->get();
            }else{
                $data['sktm'] =SKTM::where('desa_id',Auth::user()->desa_id)->orderBy('status','asc')->orderBy('created_at','asc')->get();
            }
            return view('backend.dokumen.sktm.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            $data['users'] = User::where('desa_id',Session::get('desa_id'))->get();
            $data['kasi'] = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','kasi')->where('desa_id',Session::get('desa_id'))->get();
            return view('backend.dokumen.sktm.create',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function createProccess(Request $request)
    {
        try{
            $this->validasiForm($request);
            $data = $this->bindData($request);
            $data['id'] = $this->generateAutoNumber('ds_sktm');
            $data['status'] = '1';
            $data['desa_id'] = empty(Auth::user()->desa_id)?Session::get('desa_id'):Auth::user()->desa_id;
            $sktm =SKTM::create($data);
           
            $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Operator Desa','operator','terima');
            $logAdmin = $this->logNotifikasiAdmin($request->kasi_id,'Verifikasi','Verifikasi Surat Keterangan Tidak Mampu disetujui oleh operator desa');
            // $admin = Admin::where('email',$request->email)->first();
            // Mail::to($admin->email)->send(new SuketMail($admin,$sktm,'sktm'));

            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.dokumen.sktm.detail',['id'=>$sktm->encodeHash($sktm->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['users'] = User::where('desa_id',Session::get('desa_id'))->get();
            $data['sktm'] = SKTM::find($id);
            $data['kasi'] = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','kasi')->where('desa_id',Session::get('desa_id'))->get();
            return view('backend.dokumen.sktm.edit',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function editProccess(Request $request,$id)
    {
        try{
            $id = $this->decodeHash($id);
            $request['id'] = $id;
            $this->validasiForm($request);
            $data = $this->bindData($request);
            $sktm = SKTM::find($id);
            $sktm->update($data);
           
            $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Operator Desa','operator','terima');

            // $admin = Admin::where('email',$request->email)->first();
            // Mail::to($admin->email)->send(new SuketMail($admin,$sktm,'sktm'));
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.dokumen.sktm.detail',['id'=>$sktm->encodeHash($sktm->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['sktm'] =SKTM::find($id);
            $data['kasi'] = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','kasi')->where('desa_id',Session::get('desa_id'))->get();
            return view('backend.dokumen.sktm.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    // public function active(Request $request)
    // {
    //     try{
    //         $id = $this->decodeHash($request->id);
    //         $sktm =SKTM::find($id);
    //         $sktm->update(['status' => 'show']);
    //         toastr()->success('Data Berhasil diaktifkan','Sukses');
    //         return redirect()->route('backend.dokumen.sktm');
    //     }catch(\QueryBuilder $e){
    //         toastr()->error($e->getMessage(),'Gagal');
    //         return back();
    //     }
    // }

    // public function inactive(Request $request)
    // {
    //     try{
    //         $id = $this->decodeHash($request->id);
    //         $sktm =SKTM::find($id);
    //         $sktm->update(['status' => 'hide']);
    //         toastr()->success('Data Berhasil dinonaktifkan','Sukses');
    //         return redirect()->route('backend.dokumen.sktm');
    //     }catch(\QueryBuilder $e){
    //         toastr()->error($e->getMessage(),'Gagal');
    //         return back();
    //     }
    // }

    private function validasiForm($request)
    {
        $sktm = SKTM::find($request->id);
        if(!empty($sktm->file_sp_rtrw)){
            $rules = [
                'no_surat' => 'required|max:150',
                'user_id' => 'required',
                'nama' => 'required|max:150',
                'nik' => 'required|max:16',
                'tempat_lahir' => 'required|max:150',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'warga_negara' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                // 'kota_id' => 'required',
                // 'kecamatan_id' => 'required',
                // 'area_id' => 'required',
                'nama_ayah' => 'required|max:150',
                'nama_ibu' => 'required|max:150',
                'alamat_orangtua' => 'required|min:6',
                // 'kota_id_orangtua' => 'required',
                // 'kecamatan_id_orangtua' => 'required',
                // 'area_id_orangtua' => 'required',
                'kasi_id' => 'required',
                'rtrw' => 'max:1024|mimes:jpeg,jpg,png',
                'ktp' => 'max:1024|mimes:jpeg,jpg,png',
                'kk' => 'max:1024|mimes:jpeg,jpg,png',
                'surat_pernyataan' => 'max:1024|mimes:jpeg,jpg,png',
            ];
        }else{
            $rules = [
                'no_surat' => 'required|max:150',
                'user_id' => 'required',
                'nama' => 'required|max:150',
                'nik' => 'required|max:16',
                'tempat_lahir' => 'required|max:150',
                'tgl_lahir' => 'required',
                'jk' => 'required',
                'warga_negara' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                // 'kota_id' => 'required',
                // 'kecamatan_id' => 'required',
                // 'area_id' => 'required',
                'nama_ayah' => 'required|max:150',
                'nama_ibu' => 'required|max:150',
                'alamat_orangtua' => 'required|min:6',
                // 'kota_id_orangtua' => 'required',
                // 'kecamatan_id_orangtua' => 'required',
                // 'area_id_orangtua' => 'required',
                'kasi_id' => 'required',
                'rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
                'ktp' => 'required|max:1024|mimes:jpeg,jpg,png',
                'kk' => 'required|max:1024|mimes:jpeg,jpg,png',
                'surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
            ];
        }

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max karakter/digit',
            'mimes' => 'format :attribute salah',
            'min' => ':attribute maksimal :min karakter/digit',
        ];

        $label = [
            'no_surat' => 'Nomor Surat',
            'user_id' => 'Nama Pengaju',
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'warga_negara' => 'Warga Negara',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'kota_id' => 'Kota',
            'kecamatan_id' => 'Kecamatan',
            'area_id' => 'Desa',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'alamat_orangtua' => 'Alamat Orangtua',
            'kota_id_orangtua' => 'Kota',
            'kecamatan_id_orangtua' => 'Kecamatan',
            'area_id_orangtua' => 'Desa',
            'kasi_id' => 'Kirim Ke Kasi',
            'rtrw' => 'File Surat Pengantar RTRW',
            'ktp' => 'File KTP',
            'kk' => 'File Kartu Keluarga',
            'surat_pernyataan' => 'File Surat Pernyataan',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $sktm = SKTM::find($request->id);
        }

        if($request->file('rtrw')){
            if(!empty($request->id)){
                if(\File::exists('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw)){
                    \File::delete('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw);
                }
            }
            $rtrw = $request->file('rtrw');
            $destinationPath = public_path('backend/images/dokumen/sktm/rtrw');
            $nama_rtrw = 'sktm_rtrw_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$rtrw->getClientOriginalExtension();
            $rtrw->move($destinationPath,$nama_rtrw);
        }else{
            if($request->id){
                $nama_rtrw=$sktm->file_sp_rtrw;
            }
        }

        if($request->file('ktp')){
            if(!empty($request->id)){
                if(\File::exists('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp)){
                    \File::delete('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp);
                }
            }
            $ktp = $request->file('ktp');
            $destinationPath = public_path('backend/images/dokumen/sktm/ktp');
            $nama_ktp = 'sktm_ktp_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').$ktp->getClientOriginalExtension();
            $ktp->move($destinationPath,$nama_ktp);
        }else{
            if($request->id){
                $nama_ktp=$sktm->file_ktp;
            }
        }

        if($request->file('kk')){
            if(!empty($request->id)){
                if(\File::exists('backend/images/dokumen/sktm/kk/'.$sktm->file_kk)){
                    \File::delete('backend/images/dokumen/sktm/kk/'.$sktm->file_kk);
                }
            }
            $kk = $request->file('kk');
            $destinationPath = public_path('backend/images/dokumen/sktm/kk');
            $nama_kk = 'sktm_kk_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').$kk->getClientOriginalExtension();
            $kk->move($destinationPath,$nama_kk);
        }else{
            if($request->id){
                $nama_kk=$sktm->file_kk;
            }
        }

        if($request->file('surat_pernyataan')){
            if(!empty($request->id)){
                if(\File::exists('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan)){
                    \File::delete('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan);
                }
            }
            $surat_pernyataan = $request->file('surat_pernyataan');
            $destinationPath = public_path('backend/images/dokumen/sktm/surat_pernyataan');
            $nama_surat_pernyataan = 'sktm_surat_pernyataan_'.strtolower(str_replace(' ','_',$request->nama)).'_'.date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
            $surat_pernyataan->move($destinationPath,$nama_surat_pernyataan);
        }else{
            if($request->id){
                $nama_surat_pernyataan=$sktm->file_surat_pernyataan;
            }
        }

        $data = [
            'kasi_id' => $request->input('kasi_id'),
            'no_surat' => $request->input('no_surat'),
            'user_id' => $request->input('user_id'),
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

        return $data;
    }

    public function print(Request $request)
    {
        try{
            // set_time_limit(500);
            $id = $this->decodeHash($request->id);
            $dokumen = \App\Models\Dokumen::where('suket_id',$id)->where('jenis','sktm')->first();
            if(!$dokumen){
                toastr()->error('Surat tidak ditemukan','error');
                return redirect()->back();
            }

            $namaFile = $dokumen->dokumen;

            return response()->download(public_path('storage/surat/sktm/'.$namaFile));

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return redirect()->route('backend.dokumen.sktm');
        }
    }

    public function verifikasiKades(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);

            $rules = [
                'passphrase' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max karakter',
                'min' => ':attribute minimal :min karakter',
            ];

            $label = [
                'passphrase' => 'Passphrase',
            ];

            $this->validate($request,$rules,$messages,$label);

            $generateFile = (new GenerateFileAction)->run($sktm->id,'sktm');
            $signDokumen = (new SignDokumenAction)->run($id,'sktm',Auth::guard('admin')->user()->nik,$request->passphrase);

            if($signDokumen == 'berhasil'){
                $sktm->update(['verifikasi_kades' => '1','status' => '0','finished_date' => \Carbon\Carbon::now()]);

                $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Kepala Desa','kades','terima');
                $admin = $this->getAdmin('operator',Session::get('desa_id'));
                $logAdmin = $this->logNotifikasiAdmin($admin,'Verifikasi','Verifikasi Surat Keterangan Tidak Mampu disetujui oleh kepala desa');
                // $admin = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','operator')->where('desa_id',Session::get('desa_id'))->first();
                // Mail::to($admin->email)->send(new SuketMail($admin,$sktm,'sktm'));

                toastr()->success('Data Berhasil diverifikasi','Sukses');
                return redirect()->route('backend.dokumen.sktm');
            }else{
                (new PassphraseLogAction)->run(Auth::guard('admin')->user()->id,$signDokumen);
                return redirect()->route('backend.dokumen.sktm.detail',['id'=>$sktm->encodeHash($sktm->id)])->with('error',$signDokumen);
            }
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function verifikasiSekdes(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);
            $sktm->update(['verifikasi_sekdes' => 1]);

            $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Sekretaris Desa','sekdes','terima');
            $admin = $this->getAdmin('kepala_desa',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Verifikasi','Verifikasi Surat Keterangan Tidak Mampu disetujui oleh sekretaris desa');
            // $admin = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','sekretaris_desa')->where('desa_id',Session::get('desa_id'))->first();
            // Mail::to($admin->email)->send(new SuketMail($admin,$sktm,'sktm'));

            toastr()->success('Data Berhasil diverifikasi','Sukses');
            return redirect()->route('backend.dokumen.sktm');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function verifikasiKasi(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);
            $sktm->update(['verifikasi_kasi' => 1]);

            $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Kasi Desa','kasi','terima');
            $admin = $this->getAdmin('sekretaris_desa',Session::get('desa_id'));
            $logAdmin = $this->logNotifikasiAdmin($admin,'Verifikasi','Verifikasi Surat Keterangan Tidak Mampu disetujui oleh kasi desa');
            // $admin = Admin::join('ds_admin_roles','ds_admins.id','=','ds_admin_roles.admin_id')->where('ds_admin_roles.role_id','sekretaris_desa')->where('desa_id',Session::get('desa_id'))->first();
            // Mail::to($admin->email)->send(new SuketMail($admin,$sktm,'sktm'));

            toastr()->success('Data Berhasil diverifikasi','Sukses');
            return redirect()->route('backend.dokumen.sktm');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function delete(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);

            if(\File::exists('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw)){
                \File::delete('backend/images/dokumen/sktm/rtrw/'.$sktm->file_sp_rtrw);
            }

            if(\File::exists('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp)){
                \File::delete('backend/images/dokumen/sktm/ktp/'.$sktm->file_ktp);
            }

            if(\File::exists('backend/images/dokumen/sktm/kk/'.$sktm->file_kk)){
                \File::delete('backend/images/dokumen/sktm/kk/'.$sktm->file_kk);
            }
            if(\File::exists('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan)){
                \File::delete('backend/images/dokumen/sktm/surat_pernyataan/'.$sktm->file_surat_pernyataan);
            }

            $sktm->delete();

            toastr()->success('Data Berhasil Dihapus','Sukses');
            return redirect()->route('backend.dokumen.sktm');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function rejected(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);

            $rules = [
                'pesan' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong',
            ];

            $label = [
                'pesan' => 'Pesan',
            ];

            $this->validate($request,$rules,$messages,$label);

            $log = $this->suketLogNotifikasi($sktm,'sktm','Penolakan',$request->pesan,'operator','tolak');
            toastr()->success('Data Berhasil Ditolak','Sukses');
            return redirect()->route('backend.dokumen.sktm');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function accepted(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $sktm = SKTM::find($id);
            $rules = [
                'no_surat' => 'required|unique:ds_sktm,no_surat,'.$sktm->id,
                'kasi_id' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max karakter/digit',
                'min' => ':attribute maksimal :min karakter',
                'unique' => ':attribute sudah digunakan',
            ];

            $label = [
                'no_surat' => 'Nomor Surat',
                'kasi_id' => 'Nama Kasi',
            ];

            $this->validate($request,$rules,$messages,$label);

            $sktm->update(['no_surat'=>$request->no_surat,'kasi_id' => $request->kasi_id]);
            $log = $this->suketLogNotifikasi($sktm,'sktm','Verifikasi','Pengajuan Surat Keterangan Tidak Mampu telah di verifikasi Oleh Operator Desa','operator','terima');
            $logAdmin = $this->logNotifikasiAdmin($request->kasi_id,'Verifikasi','Verifikasi Surat Keterangan Tidak Mampu disetujui oleh operator desa');
            toastr()->success('Data Berhasil Diverifikasi','Sukses');
            return redirect()->route('backend.dokumen.sktm');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
