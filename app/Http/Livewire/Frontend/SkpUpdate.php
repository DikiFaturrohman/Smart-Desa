<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pekerjaan;
use App\Traits\AutoNumber;
use App\Actions\SkpUpdateAction;
use App\Models\User;
use Auth;

class SkpUpdate extends Component
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
    public $jumlah_tanggungan;
    public $nominal;
    public $surat;
    public $user;

    public function mount($surat)
    {
        $this->user = current_user('masyarakat');
        if($surat){
            $this->surat = $surat;
            $this->file_slip_gaji = $surat->slip_gaji;
            $this->file_ktp = $surat->file_ktp;
            $this->file_kk = $surat->file_kk;
            $this->file_surat_pernyataan = $surat->file_surat_pernyataan;
            $this->nik = $surat->nik;
            $this->nama = $surat->nama;
            $this->tgl_lahir = $surat->tgl_lahir;
            $this->jk = $surat->jk;
            $this->alamat = $surat->alamat;
            $this->jumlah_tanggungan = $surat->jumlah_tanggungan;
            $this->nominal = $surat->gaji;
            $this->tempat_lahir = $surat->tempat_lahir;
            $this->pekerjaan_id = $surat->pekerjaan_id;
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
            'pekerjaan_id' => 'required',
            'jumlah_tanggungan' => 'required',
            'nominal' => 'required',
            'alamat' => 'required',
            'file_slip_gaji' => 'required|max:1024'.(!empty($this->file_slip_gaji))?'':'|mimes:jpeg,jpg,png',
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
            'jumlah_tanggungan' => 'Jumlah Tanggungan',
            'nominal' => 'Nominal',
            'alamat' => 'Alamat',
            'file_slip_gaji' => 'File Slip Gaji',
            'file_ktp' => 'File KTP',
            'file_kk' => 'File Kartu Keluarga',
            'file_surat_pernyataan' => 'File Surat Pernyataan',
        ]);

        if($this->file_slip_gaji != $this->surat->file_slip_gaji){
            $rtrw = \Str::uuid().'.'.$this->file_slip_gaji->getClientOriginalExtension();
        }else{
            $rtrw = $this->file_slip_gaji;
        }

        if($this->file_surat_pernyataan != $this->surat->file_surat_pernyataan){
            $sp = \Str::uuid().'.'.$this->file_surat_pernyataan->getClientOriginalExtension();
        }else{
            $sp = $this->file_surat_pernyataan;
        }


        $namaFile = [
            'file_slip_gaji' => $rtrw,
            'file_surat_pernyataan' => $sp,
        ];

        $data = [
            'id' => $this->surat->id,
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->surat->user_id,
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

        $skp = (new SkpUpdateAction)->run($data);
        if(empty($skp)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_slip_gaji,$this->file_surat_pernyataan,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Usaha berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rtrw,$sp,$namaFile)
    {
        if($rtrw != $this->surat->file_slip_gaji){
            if(\File::exists('storage/backend/images/dokumen/skp/slip_gaji/'.$this->surat->file_slip_gaji)){
                \File::delete('storage/backend/images/dokumen/skp/slip_gaji/'.$this->surat->file_slip_gaji);
            }
            $rtrw->storeAs('backend/images/dokumen/skp/slip_gaji',$namaFile['file_slip_gaji']);
        }
        
        if($sp != $this->surat->file_surat_pernyataan){
            if(\File::exists('storage/backend/images/dokumen/skp/surat_penyataan/'.$this->surat->file_surat_pernyataan)){
                \File::delete('storage/backend/images/dokumen/skp/surat_penyataan/'.$this->surat->file_surat_pernyataan);
            }
            $sp->storeAs('backend/images/dokumen/skp/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }
    public function render()
    {
        return view('livewire.frontend.skp-update',[
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
