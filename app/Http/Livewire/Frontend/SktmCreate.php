<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SktmCreateAction;
use App\Models\User;
use Auth;

class SktmCreate extends Component
{
    use WithFileUploads,AutoNumber;

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
    public $user;

    public function mount()
    {
        $this->user = current_user('masyarakat');
    }

    public function store()
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
            'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/1 mb',
            'mimes' => 'format :attribute salah',
            'min' => ':attribute maksimal :min karakter/digit',
        ],
        [
            'nama' => 'Nama',
            'nik' => 'NIK',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'warga_negara' => 'Warga Negara',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_sp_rtrw' => \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension(),
            'file_surat_pernyataan' => \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sktm'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'warga_negara' => $this->warga_negara,
            'agama' => $this->agama,
            'alamat' => $this->alamat,
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

        $sktm = (new SktmCreateAction)->run($data);
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
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/sktm/rtrw',$namaFile['file_sp_rtrw']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/sktm/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }

    public function render()
    {
        return view('livewire.frontend.sktm-create');
    }
}
