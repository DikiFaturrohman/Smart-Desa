<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SksjCreateAction;
use App\Models\User;
use App\Models\ProfilDesa;
use Auth;

class SksjCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_surat_pernyataan;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $umur;
    public $pekerjaan_id;
    public $alamat_kantor;
    public $keperluan;
    public $tgl_menetap;
    public $user;
    public $desa;

    public function mount()
    {

        $this->user = current_user('masyarakat');
        $this->nik = $this->user->nik;
        $this->nama = $this->user->nama_lengkap;
        $this->umur = \Carbon\Carbon::now()->diffInYears($this->user->tgl_lahir);
        $this->desa = ProfilDesa::find(session()->get('desa_id'));
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required|min:16',
            'umur' => 'required',
            'keperluan' => 'required',
            'tgl_menetap' => 'required',
            'alamat_kantor' => 'required',
            'pekerjaan_id' => 'required',
            'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
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
            'umur' => 'Umur',
            'keperluan' => 'Keperluan',
            'tgl_menetap' => 'Tanggal Menetap',
            'alamat_kantor' => 'Alamat Kantor',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_sp_rtrw' => \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension(),
            'file_surat_pernyataan' => \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_sapu_jagat'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'nama_pejabat' => $this->desa->kades,
            'jabatan' => ($this->desa->desa->kecamatan->id == '2018110602402')?'Lurah':'Kepala Desa',
            'alamat' => $this->desa->alamat,
            'status' => '1',
            'nama_penduduk' => $this->nama,
            'no_nik' => $this->nik,
            'umur' => $this->umur,
            'alamat_kantor' => $this->alamat_kantor,
            'keperluan' => $this->keperluan,
            'tgl_menetap' => $this->tgl_menetap,
            'pekerjaan_id' => $this->pekerjaan_id,
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $sksj = (new SksjCreateAction)->run($data);
        if(empty($sksj)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Sapu Jagat berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/sksj/rtrw',$namaFile['file_sp_rtrw']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/sksj/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.sksj-create',[
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
