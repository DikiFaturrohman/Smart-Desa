<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SksjUpdateAction;
use App\Models\User;
use Auth;

class SksjUpdate extends Component
{
    use WithFileUploads;
    use AutoNumber;

    public $file_sp_rtrw;
    public $file_ktp;
    public $file_surat_pernyataan;
    public $nik;
    public $nama;
    public $pekerjaan_id;
    public $alamat_kantor;
    public $keperluan;
    public $umur;
    public $tgl_menetap;
    public $surat;
    public $user;

    public function mount($surat)
    {
        $this->user = current_user('masyarakat');
        if($surat){
            $this->surat = $surat;
            $this->file_sp_rtrw = $surat->file_sp_rtrw;
            $this->file_ktp = $surat->file_ktp;
            $this->file_surat_pernyataan = $surat->file_surat_pernyataan;
            $this->nik = $surat->no_nik;
            $this->nama = $surat->nama_penduduk;
            $this->umur = $surat->umur;
            $this->keperluan = $surat->keperluan;
            $this->alamat_kantor = $surat->alamat_kantor;
            $this->tgl_menetap = $surat->tgl_menetap;
            $this->pekerjaan_id = $surat->pekerjaan_id;
        }
        
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'nik' => 'required|min:16',
            'pekerjaan_id' => 'required',
            'keperluan' => 'required',
            'umur' => 'required',
            'tgl_menetap' => 'required',
            'alamat_kantor' => 'required',
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
            'jenis_usaha' => 'Jenis Usaha',
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
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->surat->user_id,
            'status' => '1',
            'nama_penduduk' => $this->nama,
            'no_nik' => $this->nik,
            'alamat_kantor' => $this->alamat_kantor,
            'keperluan' => $this->keperluan,
            'tgl_menetap' => $this->tgl_menetap,
            'umur' => $this->umur,
            'pekerjaan_id' => $this->pekerjaan_id,
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user)?$this->user->unggahDokumen->file_ktp:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $sksj = (new SksjUpdateAction)->run($data);
        if(empty($sksj)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sp_rtrw,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Usaha berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');;
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw != $this->surat->file_sp_rtrw){
            if(\File::exists('storage/backend/images/dokumen/sksj/rtrw/'.$this->surat->file_sp_rtrw)){
                \File::delete('storage/backend/images/dokumen/sksj/rtrw/'.$this->surat->file_sp_rtrw);
            }
            $rtrw->storeAs('backend/images/dokumen/sksj/rtrw',$namaFile['file_sp_rtrw']);
        }
        
        if($sp != $this->surat->file_surat_pernyataan){
            if(\File::exists('storage/backend/images/dokumen/sksj/surat_penyataan/'.$this->surat->file_surat_pernyataan)){
                \File::delete('storage/backend/images/dokumen/sksj/surat_penyataan/'.$this->surat->file_surat_pernyataan);
            }
            $sp->storeAs('backend/images/dokumen/sksj/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.sksj-update',[
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
