<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SkrtCreateAction;
use App\Models\User;
use Auth;

class SkrtCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_kk;
    public $file_surat_pajak_tanah;
    public $file_surat_tanah;
    public $file_surat_pernyataan;
    public $no_sertifikat;
    public $nama_pemilik;
    public $nik_pemilik;
    public $tgl_riwayat1;
    public $atas_nama1;
    public $tgl_riwayat2;
    public $atas_nama2;
    public $berdasarkan2;
    public $tgl_riwayat3;
    public $atas_nama3;
    public $berdasarkan3;
    public $tgl_riwayat4;
    public $atas_nama4;
    public $berdasarkan4;
    public $no_sppt;
    public $blok;
    public $persil;
    public $no_kihir;
    public $luas;
    public $alamat;
    public $sebelah_utara;
    public $sebelah_timur;
    public $sebelah_selatan;
    public $sebelah_barat;
    public $nama_saksi1;
    public $nik_saksi1;
    public $nama_saksi2;
    public $nik_saksi2;
    public $user;

    public function mount()
    {
        $this->user = \current_user('masyarakat');
    }

    public function store()
    {
        $this->validate([
            'no_sertifikat' => 'required',
            'nama_pemilik' => 'required',
            'nik_pemilik' => 'required',
            'tgl_riwayat1' => 'required',
            'atas_nama1' => 'required',
            'tgl_riwayat2' => 'required',
            'atas_nama2' => 'required',
            'berdasarkan2' => 'required',
            'tgl_riwayat3' => 'required',
            'atas_nama3' => 'required',
            'berdasarkan3' => 'required',
            'tgl_riwayat4' => 'required',
            'atas_nama4' => 'required',
            'berdasarkan4' => 'required',
            'no_sppt' => 'required',
            'blok' => 'required',
            'persil' => 'required',
            'no_kihir' => 'required',
            'luas' => 'required',
            'alamat' => 'required',
            'sebelah_utara' => 'required',
            'sebelah_timur' => 'required',
            'sebelah_selatan' => 'required',
            'sebelah_barat' => 'required',
            'nama_saksi1' => 'required',
            'nik_saksi1' => 'required',
            'nama_saksi2' => 'required',
            'nik_saksi2' => 'required',
            'file_sp_rtrw' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_pernyataan' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_pajak_tanah' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_surat_tanah' => 'required|max:1024|mimes:jpeg,jpg,png',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/ 1 mb',
            'min' => ':attribute maksimal :min karakter',
            'mimes' => ':attribute harus jpeg,png,jpg'
        ],
        [
            'no_sertifikat' => 'Nomor Sertifikat',
            'nama_pemilik' => 'Nama',
            'nik_pemilik' => 'NIK',
            'tgl_riwayat1' => 'Tanggal Riwayat',
            'atas_nama1' => 'Atas Nama',
            'tgl_riwayat2' => 'Tanggal Riwayat',
            'atas_nama2' => 'Atas Nama',
            'berdasarkan2' => 'Berdasarkan',
            'tgl_riwayat3' => 'Tanggal Riwayat',
            'atas_nama3' => 'Atas Nama',
            'berdasarkan3' => 'Berdasarkan',
            'tgl_riwayat4' => 'Tanggal Riwayat',
            'atas_nama4' => 'Atas Nama',
            'berdasarkan4' => 'Berdasarkan',
            'no_sppt' => 'Nomor SPPT',
            'blok' => 'Blok',
            'persil' => 'Persil',
            'no_kihir' => 'Nomor Kihir/Kikitir/Girik',
            'luas' => 'Luas',
            'alamat' => 'Alamat',
            'sebelah_utara' => 'Sebelah Utara',
            'sebelah_timur' => 'Sebelah Timur',
            'sebelah_selatan' => 'Sebelah Selatan',
            'sebelah_barat' => 'Sebelah Barat',
            'nama_saksi1' => 'Nama',
            'nik_saksi1' => 'NIK ',
            'nama_saksi2' => 'Nama',
            'nik_saksi2' => 'NIK',
            'file_surat_tanah' => 'File Surat Tanah',
            'file_surat_pajak_tanah' => 'File Surat Pajak Tanah',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_surat_tanah' => \Str::uuid().'.'.$this->file_surat_tanah->getClientOriginalExtension(),
            'file_surat_pajak_tanah' => \Str::uuid().'.'.$this->file_surat_pajak_tanah->getClientOriginalExtension(),
            'file_sp_rtrw' => \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension(),
            'file_surat_pernyataan' => \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_riwayat_tanah'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'nama_pemilik' => $this->nama_pemilik,
            'nik_pemilik' => $this->nik_pemilik,
            'no_sertifikat' => $this->no_sertifikat,
            'tgl_riwayat1' => $this->tgl_riwayat1,
            'atas_nama1' => $this->atas_nama1,
            'atas_nama2' => $this->atas_nama2,
            'atas_nama3' => $this->atas_nama3,
            'atas_nama4' => $this->atas_nama4,
            'tgl_riwayat2' => $this->tgl_riwayat2,
            'tgl_riwayat3' => $this->tgl_riwayat3,
            'tgl_riwayat4' => $this->tgl_riwayat4,
            'berdasarkan2' => $this->berdasarkan2,
            'berdasarkan3' => $this->berdasarkan3,
            'berdasarkan4' => $this->berdasarkan4,
            'no_sppt' => $this->no_sppt,
            'blok' => $this->blok,
            'no_kihir' => $this->no_kihir,
            'persil' => $this->persil,
            'luas' => $this->luas,
            'alamat' => $this->alamat,
            'sebelah_utara' => $this->sebelah_utara,
            'sebelah_timur' => $this->sebelah_timur,
            'sebelah_selatan' => $this->sebelah_selatan,
            'sebelah_barat' => $this->sebelah_barat,
            'nama_saksi1' => $this->nama_saksi1,
            'nik_saksi1' => $this->nik_saksi1,
            'nama_saksi2' => $this->nama_saksi2,
            'nik_saksi2' => $this->nik_saksi2,
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
            'file_surat_pajak_tanah' => $namaFile['file_surat_pajak_tanah'],
            'file_surat_tanah' => $namaFile['file_surat_tanah'],
            
        ];

        $skrt = (new SkrtCreateAction)->run($data);
        if(empty($skrt)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_surat_pernyataan,$this->file_surat_tanah,$this->file_surat_pajak_tanah,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Riwayat Tanah berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$surat_tanah,$surat_pajak_tanah,$namaFile)
    {
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/skrt/rtrw',$namaFile['file_sp_rtrw']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/skrt/surat_pernyataan/',$namaFile['file_surat_pernyataan']);
        }
        if($surat_tanah){
            $rtrw->storeAs('backend/images/dokumen/skrt/surat_tanah',$namaFile['file_surat_tanah']);
        }
        if($surat_pajak_tanah){
            $sp->storeAs('backend/images/dokumen/skrt/surat_pajak_tanah/',$namaFile['file_surat_pajak_tanah']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.skrt-create');
    }
}
