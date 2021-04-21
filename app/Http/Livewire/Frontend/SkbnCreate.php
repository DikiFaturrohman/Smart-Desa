<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SkbnCreateAction;
use App\Models\User;
use Auth;

class SkbnCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_kk;
    public $file_surat_pernyataan;
    public $nama_dok=[];
    public $nomor_dok=[];
    public $jenis_dok=[];
    public $data_dok_benar;
    public $user;

    public function mount()
    {
        $this->user = \current_user('masyarakat');
    }

    public function store()
    {
        $this->validate([
            'data_dok_benar' => 'required',
            'jenis_dok.0' => 'required',
            'nomor_dok.0' => 'required',
            'nama_dok.0' => 'required',
            'jenis_dok.1' => 'required',
            'nomor_dok.1' => 'required',
            'nama_dok.1' => 'required',
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
            'data_dok_benar' => 'Data Dokumen Benar',
            'jenis_dok.0' => 'Jenis Dokumen 1',
            'nomor_dok.0' => 'Nomor Dokumen 1',
            'nama_dok.0' => 'Nama Dokumen 1',
            'jenis_dok.1' => 'Jenis Dokumen 2',
            'nomor_dok.1' => 'Nomor Dokumen 2',
            'nama_dok.1' => 'Nama Dokumen 2',
            'file_sp_rtrw' => 'File Surat Pengantar RTRW',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        $namaFile = [
            'file_sp_rtrw' => \Str::uuid().'.'.$this->file_sp_rtrw->getClientOriginalExtension(),
            'file_surat_pernyataan' => \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_beda_nama'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'data_dok_benar' => ($this->data_dok_benar=1)?$this->jenis_dok[0]:$this->jenis_dok[1],
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $dataDetail = [
            'dok_1' => [
                'jenis_dok' => $this->jenis_dok[0],
                'nama_dok' => $this->nama_dok[0],
                'nomor_dok' => $this->nomor_dok[0],
            ],
            'dok_2' => [
                'jenis_dok' => $this->jenis_dok[1],
                'nama_dok' => $this->nama_dok[1],
                'nomor_dok' => $this->nomor_dok[1],
            ]
        ];

        $skbn = (new SkbnCreateAction)->run($data,$dataDetail);
        if(empty($skbn)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Beda Nama berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw){
            $rtrw->storeAs('backend/images/dokumen/skbn/rtrw',$namaFile['file_sp_rtrw']);
        }
        if($sp){
            $sp->storeAs('backend/images/dokumen/skbn/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }

    public function render()
    {
        return view('livewire.frontend.skbn-create');
    }
}
