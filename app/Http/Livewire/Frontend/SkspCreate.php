<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SkspCreateAction;
use App\Models\User;
use Auth;

class SkspCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_akta_cerai;
    public $file_ktp;
    public $file_kk;
    public $file_sp_rtrw;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jk;
    public $alamat;
    public $warga_negara;
    public $keperluan;
    public $status_perkawinan;
    public $agama;
    public $user;

    public function mount()
    {
        $this->user = \current_user('masyarakat');
        $this->nik = $this->user->nik;
        $this->nama = $this->user->nama_lengkap;
        $this->tgl_lahir = $this->user->tgl_lahir;
        $this->jk = $this->user->jenis_kelamin;
        $this->alamat = $this->user->alamat;
    }

    public function store()
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
            'file_akta_cerai' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
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
            'file_akta_cerai' => 'File Akta Cerai',
            'file_sp_rtrw' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_akta_cerai' => \Str::uuid().'.'.$this->file_akta_cerai->getClientOriginalExtension(),
            'file_sp_rtrw' => \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_nikah'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'warga_negara' => $this->warga_negara,
            'keperluan' => $this->keperluan,
            'agama' => $this->agama,
            'jk' => $this->jk,
            'status_perkawinan' => $this->status_perkawinan,
            'kota_id' => session()->get('kota_id'),
            'kecamatan_id' => session()->get('kecamatan_id'),
            'area_id' => session()->get('desa_id'),
            'file_akta_cerai' => $namaFile['file_akta_cerai'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
        ];

        $sksp = (new SkspCreateAction)->run($data);
        if(empty($sksp)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_akta_cerai,$this->file_sp_rtrw,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Status Pernikahan berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/skn/akta_cerai',$namaFile['file_akta_cerai']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/skn/rtrw/',$namaFile['file_sp_rtrw']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.sksp-create');
    }
}
