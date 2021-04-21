<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Pekerjaan;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SkawUpdateAction;
use App\Actions\SkawAnakDeleteAction;
use App\Actions\SkawPasanganDeleteAction;
use App\Models\User;
use App\Models\SKAW;
use Auth;

class SkawUpdate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $user;
    public $surat;
    public $inputsAnak=[];
    public $inputsPasangan=[];
    public $anak_id;
    public $pasangan_id;
    public $nama_pasangan=[];
    public $tempat_lahir_pasangan=[];
    public $tgl_lahir_pasangan=[];
    public $pekerjaan_id=[];
    public $jk_pasangan=[];
    public $nama_anak=[];
    public $tempat_lahir_anak=[];
    public $tgl_lahir_anak=[];
    public $kewarganegaraan=[];
    public $alamat_anak=[];
    public $nama_alm;
    public $jk_alm;
    public $tgl_kematian;
    public $alamat;
    public $nama_saksi1;
    public $nama_saksi2;
    public $nik_saksi1;
    public $nik_saksi2;
    public $file_surat_permohonan;
    public $file_silsilah;
    public $file_akta_lahir;
    public $file_sk_kematian;
    public $file_buku_nikah;
    public $file_ktp;
    public $file_kk;
    public $file_surat_pernyataan;
    public $pasangan_id_exist=[];
    public $anak_id_exist=[];

    public function mount($surat)
    {
        $this->user = current_user('masyarakat');
        if($surat){
            $this->surat = $surat;
           $this->nama_alm=$this->surat->nama_alm;
           $this->jk_alm=$this->surat->jk_alm;
           $this->tgl_kematian=$this->surat->tgl_kematian;
           $this->alamat=$this->surat->alamat;
           $this->nama_saksi1=$this->surat->nama_saksi1;
           $this->nama_saksi2=$this->surat->nama_saksi2;
           $this->nik_saksi1=$this->surat->nik_saksi1;
           $this->nik_saksi2=$this->surat->nik_saksi2;
           $this->file_surat_permohonan=$this->surat->file_surat_permohonan;
           $this->file_silsilah=$this->surat->file_silsilah;
           $this->file_akta_lahir=$this->surat->file_akta_lahir;
           $this->file_sk_kematian=$this->surat->file_sk_kematian;
           $this->file_buku_nikah=$this->surat->file_buku_nikah;
           $this->file_ktp=$this->surat->file_ktp;
           $this->file_kk=$this->surat->file_kk;
           $this->file_surat_pernyataan=$this->surat->file_surat_pernyataan;
           $this->anak_id=count($this->surat->anak);
           $this->pasangan_id=count($this->surat->pasangan);
           foreach($this->surat->anak as $key=>$anak){
                $this->anak_id_exist[$key] = $anak->id;
                $this->nama_anak[$key]=$anak->nama;
                $this->tempat_lahir_anak[$key]=$anak->tempat_lahir;
                $this->tgl_lahir_anak[$key]=$anak->tgl_lahir;
                $this->kewarganegaraan[$key]=$anak->kewarganegaraan;
                $this->alamat_anak[$key]=$anak->alamat;
           }
           foreach($this->surat->pasangan as $key=>$pasangan){
                $this->pasangan_id_exist[$key] = $pasangan->id;
                $this->nama_pasangan[$key]=$pasangan->nama;
                $this->tempat_lahir_pasangan[$key]=$pasangan->tempat_lahir;
                $this->tgl_lahir_pasangan[$key]=$pasangan->tgl_lahir;
                $this->jk_pasangan[$key]=$pasangan->jk;
                $this->pekerjaan_id[$key]=$pasangan->pekerjaan_id;
        }
        }
    }
    
    public function addAnak($i)
    {
        $i = $i + 1;
        $this->anak_id = $i;
        array_push($this->inputsAnak ,$i);
    }

    public function removeExistingAnak($i)
    {
        $delete = (new SkawAnakDeleteAction)->run($this->surat->anak[$i]->id);
        $this->refresh();
        unset($this->surat->anak[$i]);
    }

    public function removeAnak($i)
    {
        unset($this->inputsAnak[$i]);
    }

    public function addPasangan($i)
    {
        $i = $i + 1;
        $this->pasangan_id = $i;
        array_push($this->inputsPasangan ,$i);
    }

    public function removePasangan($i)
    {
        unset($this->inputsPasangan[$i]);
    }

    public function removeExistingPasangan($i)
    {
        $delete = (new SkawPasanganDeleteAction)->run($this->surat->pasangan[$i]->id);
        $this->refresh();
        unset($this->surat->pasangan[$i]);
    }

    public function refresh()
    {
        $this->mount(SKAW::find($this->surat->id));
    }

    public function update()
    {
        $this->validate([
            'nama_alm' => 'required',
            'jk_alm' => 'required',
            'tgl_kematian' => 'required',
            'alamat' => 'required',
            'nama_saksi1' => 'required',
            'nama_saksi2' => 'required',
            'nik_saksi1' => 'required',
            'nik_saksi2' => 'required',
            'nama_anak.0' => 'required',
            'tempat_lahir_anak.0' => 'required',
            'kewarganegaraan.0' => 'required',
            'alamat_anak.0' => 'required',
            'tgl_lahir_anak.0' => 'required',
            'nama_pasangan.0' => 'required',
            'jk_pasangan.0' => 'required',
            'tgl_lahir_pasangan.0' => 'required',
            'tempat_lahir_pasangan.0' => 'required',
            'pekerjaan_id.0' => 'required',
            // 'nama_anak.'.$this->anak_id => 'required',
            // 'tempat_lahir_anak.'.$this->anak_id => 'required',
            // 'kewarganegaraan.'.$this->anak_id => 'required',
            // 'alamat_anak.'.$this->anak_id => 'required',
            // 'tgl_lahir_anak.'.$this->anak_id => 'required',
            // 'nama_pasangan.'.$this->pasangan_id => 'required',
            // 'jk_pasangan.'.$this->pasangan_id => 'required',
            // 'tgl_lahir_pasangan.'.$this->pasangan_id => 'required',
            // 'tempat_lahir_pasangan.'.$this->pasangan_id => 'required',
            // 'pekerjaan_id.'.$this->pasangan_id => 'required',
            'file_surat_permohonan' => 'required|max:1024'.(!empty($this->file_surat_permohonan))?'':'|mimes:jpeg,jpg,png',
            'file_silsilah' => 'required|max:1024'.(!empty($this->file_silsilah))?'':'|mimes:jpeg,jpg,png',
            'file_akta_lahir' => 'required|max:1024'.(!empty($this->file_akta_lahir))?'':'|mimes:pdf',
            'file_sk_kematian' => 'required|max:1024'.(!empty($this->file_sk_kematian))?'':'|mimes:jpeg,jpg,png',
            'file_buku_nikah' => 'required|max:1024'.(!empty($this->file_buku_nikah))?'':'|mimes:jpeg,jpg,png',
            'file_ktp' => 'required|max:1024'.(!empty($this->file_ktp))?'':'|mimes:pdf',
            'file_kk' => 'required|max:1024'.(!empty($this->file_kk))?'':'|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024'.(!empty($this->file_surat_pernyataan))?'':'|mimes:jpeg,jpg,png',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/ 1 mb',
            'min' => ':attribute maksimal :min karakter',
            'mimes' => ':attribute harus jpeg,png,jpg'
        ],
        [
            'nama_alm' => 'Nama',
            'jk_alm' => 'Jenis Kelamin',
            'tgl_kematian' => 'Tanggal Kematian',
            'alamat' => 'Alamat',
            'email' => 'Kirim Ke Kasi',
            'nama_saksi1' => 'Nama',
            'nama_saksi2' => 'NIK',
            'nik_saksi1' => 'Nama',
            'nik_saksi2' => 'NIK',
            'nama_anak.0' => 'Nama',
            'tempat_lahir_anak.0' => 'Tempat Lahir',
            'kewarganegaraan.0' => 'Kewarganegaraan',
            'alamat_anak.0' => 'Alamat',
            'tgl_lahir_anak.0' => 'Tanggal Lahir',
            'nama_pasangan.0' => 'Nama',
            'jk_pasangan.0' => 'Jenis Kelamin',
            'tgl_lahir_pasangan.0' => 'Tanggal Lahir',
            'tempat_lahir_pasangan.0' => 'Tempat Lahir',
            'pekerjaan_id.0' => 'Pekerjaan',
            'nama_anak.'.$this->anak_id => 'Nama',
            'tempat_lahir_anak.'.$this->anak_id => 'Tempat Lahir',
            'kewarganegaraan.'.$this->anak_id => 'Kewarganegaraan',
            'alamat_anak.'.$this->anak_id => 'Alamat',
            'tgl_lahir_anak.'.$this->anak_id => 'Tanggal Lahir',
            'nama_pasangan.'.$this->pasangan_id => 'Nama',
            'jk_pasangan.'.$this->pasangan_id => 'Jenis Kelamin',
            'tgl_lahir_pasangan.'.$this->pasangan_id => 'Tanggal Lahir',
            'tempat_lahir_pasangan.'.$this->pasangan_id => 'Tempat Lahir',
            'pekerjaan_id.'.$this->pasangan_id => 'Pekerjaan',
            'file_surat_permohonan' => 'File Surat Permohonan',
            'file_silsilah' => 'File Silsilah',
            'file_akta_lahir' => 'File Akta Lahir',
            'file_sk_kematian' => 'File SK Kematian',
            'file_buku_nikah' => 'File Buku Nikah',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File KK',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        if($this->file_surat_permohonan != $this->surat->file_surat_permohonan){
            $permohonan = \Str::uuid().'.'.$this->file_surat_permohonan->getClientOriginalExtension();
        }else{
            $permohonan = $this->file_surat_permohonan;
        }

        if($this->file_silsilah != $this->surat->file_silsilah){
            $silsilah = \Str::uuid().'.'.$this->file_silsilah->getClientOriginalExtension();
        }else{
            $silsilah = $this->file_silsilah;
        }
        if($this->file_akta_lahir != $this->surat->file_akta_lahir){
            $akta = \Str::uuid().'.'.$this->file_akta_lahir->getClientOriginalExtension();
        }else{
            $akta = $this->file_akta_lahir;
        }

        if($this->file_sk_kematian != $this->surat->file_sk_kematian){
            $kematian = \Str::uuid().'.'.$this->file_sk_kematian->getClientOriginalExtension();
        }else{
            $kematian = $this->file_sk_kematian;
        }
        if($this->file_buku_nikah != $this->surat->file_buku_nikah){
            $nikah = \Str::uuid().'.'.$this->file_buku_nikah->getClientOriginalExtension();
        }else{
            $nikah = $this->file_buku_nikah;
        }

        if($this->file_kk != $this->surat->file_kk){
            $kk = \Str::uuid().'.'.$this->file_kk->getClientOriginalExtension();
        }else{
            $kk = $this->file_kk;
        }if($this->file_ktp != $this->surat->file_ktp){
            $ktp = \Str::uuid().'.'.$this->file_ktp->getClientOriginalExtension();
        }else{
            $ktp = $this->file_ktp;
        }

        if($this->file_surat_pernyataan != $this->surat->file_surat_pernyataan){
            $sp = \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension();
        }else{
            $sp = $this->file_surat_pernyataan;
        }

        $namaFile = [
            'file_surat_permohonan' => $permohonan,
            'file_silsilah' => $silsilah,
            'file_akta_lahir' => $akta,
            'file_sk_kematian' => $kematian,
            'file_buku_nikah' => $nikah,
            'file_ktp' => $ktp,
            'file_kk' => $kk,
            'file_surat_pernyataan' => $sp,
        ];

        $data = [
            'id' => $this->surat->id,
            'desa_id' => session()->get('desa_id'),
            'kota_id' => session()->get('kota_id'),
            'kecamatan_id' => session()->get('kecamatan_id'),
            'area_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'nama_alm'=>$this->nama_alm,
            'jk_alm'=>$this->jk_alm,
            'tgl_kematian'=>$this->tgl_kematian,
            'alamat'=>$this->alamat,
            'nama_saksi1'=>$this->nama_saksi1,
            'nama_saksi2'=>$this->nama_saksi2,
            'nik_saksi1'=>$this->nik_saksi1,
            'nik_saksi2'=>$this->nik_saksi2,
            'file_surat_permohonan'=>$namaFile['file_surat_permohonan'],
            'file_silsilah'=>$namaFile['file_silsilah'],
            'file_akta_lahir'=>$namaFile['file_akta_lahir'],
            'file_sk_kematian'=>$namaFile['file_sk_kematian'],
            'file_buku_nikah'=>$namaFile['file_buku_nikah'],
            'file_ktp'=>$namaFile['file_ktp'],
            'file_kk'=>$namaFile['file_kk'],
            'file_surat_pernyataan'=>$namaFile['file_surat_pernyataan'],
        ];

        $dataAnak = [
            'id' => $this->anak_id_exist,
            'nama' => $this->nama_anak,
            'tgl_lahir' => $this->tgl_lahir_anak,
            'tempat_lahir' => $this->tempat_lahir_anak,
            'alamat' => $this->alamat_anak,
            'kewarganegaraan' => $this->kewarganegaraan,
        ];

        $dataPasangan = [
            'id' => $this->pasangan_id_exist,
            'nama' => $this->nama_pasangan,
            'tgl_lahir' => $this->tgl_lahir_pasangan,
            'tempat_lahir' => $this->tempat_lahir_pasangan,
            'jk' => $this->jk_pasangan,
            'pekerjaan_id' => $this->pekerjaan_id,
        ];

        $skaw = (new SkawUpdateAction)->run($data,$dataAnak,$dataPasangan);
        if(empty($skaw)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_surat_permohonan,$this->file_silsilah,$this->file_akta_lahir,$this->file_sk_kematian,$this->file_buku_nikah,$this->file_ktp,$this->file_kk,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Ahli Waris berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }

    }

    function storeFile($permohonan,$silsilah,$akta,$kematian,$nikah,$ktp,$kk,$sp,$namaFile)
    {
        if($permohonan != $this->surat->file_surat_permohonan){
            if(\File::exists('storage/backend/images/dokumen/skaw/surat_permohonan/'.$this->surat->file_surat_permohonan)){
                \File::delete('storage/backend/images/dokumen/skaw/surat_permohonan/'.$this->surat->file_surat_permohonan);
            }
            $permohonan->storeAs('backend/images/dokumen/skaw/surat_permohonan',$namaFile['file_surat_permohonan']);
        }
        if($silsilah != $this->surat->file_silsilah){
            if(\File::exists('storage/backend/images/dokumen/skaw/silsilah/'.$this->surat->file_silsilah)){
                \File::delete('storage/backend/images/dokumen/skaw/silsilah/'.$this->surat->file_silsilah);
            }
            $silsilah->storeAs('backend/images/dokumen/skaw/silsilah/',$namaFile['file_silsilah']);

        }
        if($akta != $this->surat->file_akta_lahir){
            if(\File::exists('storage/backend/images/dokumen/skaw/akta_lahir/'.$this->surat->file_akta_lahir)){
                \File::delete('storage/backend/images/dokumen/skaw/akta_lahir/'.$this->surat->file_akta_lahir);
            }
            $akta->storeAs('backend/images/dokumen/skaw/akta_lahir',$namaFile['file_akta_lahir']);
        }
        if($kematian != $this->surat->file_sk_kematian){
            if(\File::exists('storage/backend/images/dokumen/skaw/sk_kematian/'.$this->surat->file_sk_kematian)){
                \File::delete('storage/backend/images/dokumen/skaw/sk_kematian/'.$this->surat->file_sk_kematian);
            }
            $kematian->storeAs('backend/images/dokumen/skaw/sk_kematian/',$namaFile['file_sk_kematian']);

        }
        if($nikah != $this->surat->file_buku_nikah){
            if(\File::exists('storage/backend/images/dokumen/skaw/buku_nikah/'.$this->surat->file_buku_nikah)){
                \File::delete('storage/backend/images/dokumen/skaw/buku_nikah/'.$this->surat->file_buku_nikah);
            }
            $nikah->storeAs('backend/images/dokumen/skaw/buku_nikah',$namaFile['file_buku_nikah']);
        }
        if($ktp != $this->surat->file_ktp){
            if(\File::exists('storage/backend/images/dokumen/skaw/ktp/'.$this->surat->file_ktp)){
                \File::delete('storage/backend/images/dokumen/skaw/ktp/'.$this->surat->file_ktp);
            }
            $ktp->storeAs('backend/images/dokumen/skaw/ktp/',$namaFile['file_ktp']);

        }
        if($kk != $this->surat->file_kk){
            if(\File::exists('storage/backend/images/dokumen/skaw/kk/'.$this->surat->file_kk)){
                \File::delete('storage/backend/images/dokumen/skaw/kk/'.$this->surat->file_kk);
            }
            $kk->storeAs('backend/images/dokumen/skaw/kk',$namaFile['file_kk']);
        }
        if($sp != $this->surat->file_surat_pernyataan){
            if(\File::exists('storage/backend/images/dokumen/skaw/surat_pernyataan/'.$this->surat->file_surat_pernyataan)){
                \File::delete('storage/backend/images/dokumen/skaw/surat_pernyataan/'.$this->surat->file_surat_pernyataan);
            }
            $sp->storeAs('backend/images/dokumen/skaw/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }

    public function render()
    {
        return view('livewire.frontend.skaw-update',[
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
