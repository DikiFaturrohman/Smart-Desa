<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SkpCreateAction;
use App\Models\User;
use Auth;

class SkpCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_slip_gaji;
    public $file_ktp;
    public $file_kk;
    public $file_surat_pernyataan;
    public $nik;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $jk;
    public $pekerjaan_id;
    public $alamat;
    public $nominal;
    public $jumlah_tanggungan;
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
            'pekerjaan_id' => 'required',
            'jumlah_tanggungan' => 'required',
            'nominal' => 'required',
            'alamat' => 'required',
            'file_slip_gaji' => 'required|max:1024|mimes:jpeg,jpg,png',
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
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jk' => 'Jenis Kelamin',
            'pekerjaan_id' => 'Pekerjaan',
            'jumlah_tanggungan' => 'Jumlah Tanggungan',
            'nominal' => 'Nominal',
            'alamat' => 'Alamat',
            'file_slip_gaji' => 'File Slip Gaji',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_slip_gaji' => \Str::uuid().'.'.$this->file_slip_gaji->getClientOriginalExtension(),
            'file_surat_pernyataan' => \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_penghasilan'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'jumlah_tanggungan' => $this->jumlah_tanggungan,
            'gaji' => $this->nominal,
            'jk' => $this->jk,
            'pekerjaan_id' => $this->pekerjaan_id,
            'kota_id' => session()->get('kota_id'),
            'kecamatan_id' => session()->get('kecamatan_id'),
            'area_id' => session()->get('desa_id'),
            'slip_gaji' => $namaFile['file_slip_gaji'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $skp = (new SkpCreateAction)->run($data);
        if(empty($skp)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_slip_gaji,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Penghasilan berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/skp/slip_gaji',$namaFile['file_slip_gaji']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/skp/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.skp-create',[
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
