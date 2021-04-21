<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SktmUpdateAction;
use App\Models\User;
use Auth;

class SktmUpdate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_kk;
    public $file_surat_pernyataan;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jk;
    public $agama;
    public $alamat;
    public $warga_negara;
    public $nama_ayah;
    public $nama_ibu;
    public $alamat_orangtua;
    public $surat;
    public $user;

    public function mount($surat)
    {
        $this->user = current_user('masyarakat');
        if($surat){
            $this->surat = $surat;
            $this->file_sp_rtrw = $surat->file_sp_rtrw;
            $this->file_ktp = $surat->file_ktp;
            $this->file_kk = $surat->file_kk;
            $this->file_surat_pernyataan = $surat->file_surat_pernyataan;
            $this->nik = $surat->nik;
            $this->nama = $surat->nama;
            $this->tgl_lahir = $surat->tgl_lahir;
            $this->jk = $surat->jk;
            $this->alamat = $surat->alamat;
            $this->warga_negara = $surat->warga_negara;
            $this->tempat_lahir = $surat->tempat_lahir;
            $this->agama = $surat->agama;
            $this->nama_ayah = $surat->nama_ayah;
            $this->nama_ibu = $surat->nama_ibu;
            $this->alamat_orangtua = $surat->alamat_orangtua;
            $this->agama = $surat->agama;
        }
        
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'warga_negara' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_orangtua' => 'required|min:6',
            'file_sp_rtrw' => 'required|max:1024'.(!empty($this->file_sp_rtrw))?'':'|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024'.(!empty($this->file_surat_pernyataan))?'':'|mimes:jpeg,jpg,png',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/ 1 mb',
            'min' => ':attribute maksimal :min karakter',
            'mimes' => ':attribute harus jpeg,png,jpg'
        ],
        [
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'pekerjaan_id' => 'Pekerjaan',
            'warga_negara' => 'Warga Negara',
            'alamat' => 'Alamat',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File Kartu Keluarga',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        if($this->file_sp_rtrw != $this->surat->file_sp_rtrw){
            $rtrw = \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension();
        }else{
            $rtrw = $this->file_sp_rtrw;
        }

        if($this->file_surat_pernyataan != $this->surat->file_surat_pernyataan){
            $sp = \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension();
        }else{
            $sp = $this->file_surat_pernyataan;
        }


        $namaFile = [
            'file_sp_rtrw' => $rtrw,
            'file_surat_pernyataan' => $sp,
        ];

        $data = [
            'id' => $this->surat->id,
            'desa_id' => $this->surat->desa_id,
            'user_id' => $this->surat->user_id,
            'status' => '1',
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
            'warga_negara' => $this->warga_negara,
            'jk' => $this->jk,
            'kota_id' => session()->get('kota_id'),
            'kecamatan_id' => session()->get('kecamatan_id'),
            'area_id' => session()->get('desa_id'),
            'nama_ayah' => $this->nama_ayah,
            'nama_ibu' => $this->nama_ibu,
            'alamat_orangtua' => $this->alamat_orangtua,
            'kota_id_orangtua' => session()->get('kota_id'),
            'kecamatan_id_orangtua' => session()->get('kecamatan_id'),
            'area_id_orangtua' => session()->get('desa_id'),
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $sktm = (new SktmUpdateAction)->run($data);
        if(empty($sktm)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Tidak Mampu berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw != $this->surat->file_sp_rtrw){
            if(\File::exists('storage/backend/images/dokumen/sktm/rtrw/'.$this->surat->file_sp_rtrw)){
                \File::delete('storage/backend/images/dokumen/sktm/rtrw/'.$this->surat->file_sp_rtrw);
            }
            $rtrw->storeAs('backend/images/dokumen/sktm/rtrw',$namaFile['file_sp_rtrw']);
        }
        
        if($sp != $this->surat->file_surat_pernyataan){
            if(\File::exists('storage/backend/images/dokumen/sktm/surat_penyataan/'.$this->surat->file_surat_pernyataan)){
                \File::delete('storage/backend/images/dokumen/sktm/surat_penyataan/'.$this->surat->file_surat_pernyataan);
            }
            $sp->storeAs('backend/images/dokumen/sktm/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.sktm-update');
    }
}
