<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SkbnUpdateAction;
use App\Models\User;
use Auth;

class SkbnUpdate extends Component
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
    public $skbn_detail_id=[];
    public $data_dok_benar;
    public $surat;
    public $user;

    public function mount($surat)
    {
        $this->user = current_user('masyarakat');
        if($surat){
            $this->file_sp_rtrw = $surat->file_sp_rtrw;
            $this->file_surat_pernyataan = $surat->file_surat_pernyataan;

            foreach($surat->skbnDetail as $key=>$data){
                $this->skbn_detail_id[$key] = $data->id;
                $this->jenis_dok[$key] = $data->jenis_dok;
                $this->nomor_dok[$key] = $data->nomor_dok;
                $this->nama_dok[$key] = $data->nama_dok;
                if($surat->data_dok_benar == $data->jenis_dok){
                    $this->data_dok_benar =  $key+1;
                }
            }
        }
    }

    public function update()
    {
        $this->validate([
            'data_dok_benar' => 'required',
            'jenis_dok.0' => 'required',
            'nomor_dok.0' => 'required',
            'nama_dok.0' => 'required',
            'jenis_dok.1' => 'required',
            'nomor_dok.1' => 'required',
            'nama_dok.1' => 'required',
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
            'data_dok_benar' => ($this->data_dok_benar=1)?$this->jenis_dok[0]:$this->jenis_dok[1],
            'file_sp_rtrw' => $namaFile['file_sp_rtrw'],
            'file_ktp' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_ktp:'',
            'file_kk' => ($this->user->unggahDokumen)?$this->user->unggahDokumen->file_kk:'',
            'file_surat_pernyataan' => $namaFile['file_surat_pernyataan'],
        ];

        $dataDetail = [
            'dok_1' => [
                'id' => $this->skbn_detail_id[0],
                'jenis_dok' => $this->jenis_dok[0],
                'nama_dok' => $this->nama_dok[0],
                'nomor_dok' => $this->nomor_dok[0],
            ],
            'dok_2' => [
                'id' => $this->skbn_detail_id[1],
                'jenis_dok' => $this->jenis_dok[1],
                'nama_dok' => $this->nama_dok[1],
                'nomor_dok' => $this->nomor_dok[1],
            ]
        ];

        $skbn = (new SkbnUpdateAction)->run($data,$dataDetail);
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
        if($rtrw != $this->surat->file_sp_rtrw){
            if(\File::exists('storage/backend/images/dokumen/skbn/rtrw/'.$this->surat->file_sp_rtrw)){
                \File::delete('storage/backend/images/dokumen/skbn/rtrw/'.$this->surat->file_sp_rtrw);
            }
            $rtrw->storeAs('backend/images/dokumen/skbn/rtrw',$namaFile['file_sp_rtrw']);
        }
        
        if($sp != $this->surat->file_surat_pernyataan){
            if(\File::exists('storage/backend/images/dokumen/skbn/surat_penyataan/'.$this->surat->file_surat_pernyataan)){
                \File::delete('storage/backend/images/dokumen/skbn/surat_penyataan/'.$this->surat->file_surat_pernyataan);
            }
            $sp->storeAs('backend/images/dokumen/skbn/surat_pernyataan/',$namaFile['file_surat_pernyataan']);

        }
    }

    public function render()
    {
        return view('livewire.frontend.skbn-update');
    }
}
