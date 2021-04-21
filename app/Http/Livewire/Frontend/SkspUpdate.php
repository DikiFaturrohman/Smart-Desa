<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SkspUpdateAction;
use App\Models\User;
use Auth;

class SkspUpdate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_kk;
    public $file_akta_cerai;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jk;
    public $agama;
    public $alamat;
    public $warga_negara;
    public $keperluan;
    public $status_perkawinan;
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
            $this->file_akta_cerai = $surat->file_akta_cerai;
            $this->nik = $surat->nik;
            $this->nama = $surat->nama;
            $this->tgl_lahir = $surat->tgl_lahir;
            $this->jk = $surat->jk;
            $this->alamat = $surat->alamat;
            $this->warga_negara = $surat->warga_negara;
            $this->tempat_lahir = $surat->tempat_lahir;
            $this->keperluan = $surat->keperluan;
            $this->status_perkawinan = $surat->status_perkawinan;
            $this->agama = $surat->agama;
        }
        
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jk' => 'required',
            'warga_negara' => 'required',
            'keperluan' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'file_sp_rtrw' => 'required|max:1024'.(!empty($this->file_sp_rtrw))?'':'|mimes:jpeg,jpg,png',
            'file_akta_cerai' => 'required|max:1024'.(!empty($this->file_akta_cerai))?'':'|mimes:jpeg,jpg,png',
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
            'warga_negara' => 'Warga Negara',
            'keperluan' => 'Keperluan',
            'status_perkawinan' => 'Status Saat ini',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File Kartu Keluarga',
            'file_akta_cerai' => 'File Akta Cerai',
        ]);

        if($this->file_sp_rtrw != $this->surat->file_sp_rtrw){
            $rtrw = \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension();
        }else{
            $rtrw = $this->file_sp_rtrw;
        }

        if($this->file_akta_cerai != $this->surat->file_akta_cerai){
            $ac = \Str::uuid().'.'.$this->file_akta_cerai->getClientOriginalExtension();
        }else{
            $ac = $this->file_akta_cerai;
        }


        $namaFile = [
            'file_sp_rtrw' => $rtrw,
            'file_akta_cerai' => $ac,
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
            'status_perkawinan' => $this->status_perkawinan,
            'keperluan' => $this->keperluan,
            'jk' => $this->jk,
            'kota_id' => session()->get('kota_id'),
            'kecamatan_id' => session()->get('kecamatan_id'),
            'area_id' => session()->get('desa_id'),
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_akta_cerai' => $namaFile['file_akta_cerai'],
        ];

        $sksp = (new SkspUpdateAction)->run($data);
        if(empty($sksp)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_akta_cerai,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Status Pernikahan berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$ac,$namaFile)
    {
        if($rtrw != $this->surat->file_sp_rtrw){
            if(\File::exists('storage/backend/images/dokumen/skn/rtrw/'.$this->surat->file_sp_rtrw)){
                \File::delete('storage/backend/images/dokumen/skn/rtrw/'.$this->surat->file_sp_rtrw);
            }
            $rtrw->storeAs('backend/images/dokumen/skn/rtrw',$namaFile['file_sp_rtrw']);
        }
        
        if($ac != $this->surat->file_akta_cerai){
            if(\File::exists('storage/backend/images/dokumen/skn/akta_cerai/'.$this->surat->file_akta_cerai)){
                \File::delete('storage/backend/images/dokumen/skn/akta_cerai/'.$this->surat->file_akta_cerai);
            }
            $ac->storeAs('backend/images/dokumen/skn/akta_cerai/',$namaFile['file_akta_cerai']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.sksp-update');
    }
}
