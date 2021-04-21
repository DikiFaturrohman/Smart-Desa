<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Pekerjaan;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use Livewire\WithFileUploads;
use App\Traits\AutoNumber;
use App\Actions\SkkUpdateAction;
use App\Models\User;
use Auth;

class SkkUpdate extends Component
{
    use WithFileUploads;
    use AutoNumber;
    
    public $nama_kepala_keluarga;
    public $no_kk;
    public $nama_bayi;
    public $tempat_dilahirkan;
    public $tempat_lahir;
    public $jk_bayi;
    public $hari;
    public $tgl_lahir_bayi;
    public $pukul;
    public $jenis_kelahiran;
    public $kelahiran_ke;
    public $penolong_kelahiran;
    public $panjang_bayi;
    public $berat_bayi;
    public $nik_ibu;
    public $nama_ibu;
    public $tgl_lahir_ibu;
    public $pekerjaan_id_ibu;
    public $alamat_ibu;
    public $provinsi_id_ibu;
    public $kota_id_ibu;
    public $kecamatan_id_ibu;
    public $area_id_ibu;
    public $kewarganegaraan_ibu;
    public $kebangsaan_ibu;
    public $tgl_pencatatan_perkawinan;
    public $nik_ayah;
    public $nama_ayah;
    public $tgl_lahir_ayah;
    public $pekerjaan_id_ayah;
    public $alamat_ayah;
    public $provinsi_id_ayah;
    public $kota_id_ayah;
    public $kecamatan_id_ayah;
    public $area_id_ayah;
    public $kewarganegaraan_ayah;
    public $kebangsaan_ayah;
    public $nik_pelapor;
    public $nama_pelapor;
    public $umur_pelapor;
    public $jk_pelapor;
    public $pekerjaan_id_pelapor;
    public $alamat_pelapor;
    public $provinsi_id_pelapor;
    public $kota_id_pelapor;
    public $kecamatan_id_pelapor;
    public $area_id_pelapor;
    public $nik_saksi1;
    public $nama_saksi1;
    public $umur_saksi1;
    public $jk_saksi1;
    public $pekerjaan_id_saksi1;
    public $alamat_saksi1;
    public $provinsi_id_saksi1;
    public $kota_id_saksi1;
    public $kecamatan_id_saksi1;
    public $area_id_saksi1;
    public $nik_saksi2;
    public $nama_saksi2;
    public $umur_saksi2;
    public $jk_saksi2;
    public $pekerjaan_id_saksi2;
    public $alamat_saksi2;
    public $provinsi_id_saksi2;
    public $kota_id_saksi2;
    public $kecamatan_id_saksi2;
    public $area_id_saksi2;
    public $file_sk_kelahiran;
    public $file_surat_nikah;
    public $file_kk;
    public $file_ayah;
    public $file_ibu;
    public $kotaPelapor=[];
    public $kotaAyah=[];
    public $kotaIbu=[];
    public $kotaSaksi1=[];
    public $kotaSaksi2=[];
    public $kecamatanPelapor=[];
    public $kecamatanAyah=[];
    public $kecamatanIbu=[];
    public $kecamatanSaksi1=[];
    public $kecamatanSaksi2=[];
    public $areaPelapor=[];
    public $areaAyah=[];
    public $areaIbu=[];
    public $areaSaksi1=[];
    public $areaSaksi2=[];
    public $user;
    public $surat;

    public function mount($surat)
    {
        $this->user = \current_user('masyarakat');
        if($surat){
            $this->surat = $surat;
            $this->nama_kepala_keluarga = $this->surat->nama_kepala_keluarga;
            $this->no_kk = $this->surat->no_kk;
            $this->nama_bayi = $this->surat->nama_bayi;
            $this->tempat_dilahirkan = $this->surat->tempat_dilahirkan;
            $this->tempat_lahir = $this->surat->tempat_lahir;
            $this->jk_bayi = $this->surat->jk_bayi;
            $this->hari = $this->surat->hari;
            $this->tgl_lahir_bayi = $this->surat->tgl_lahir_bayi;
            $this->pukul = $this->surat->pukul;
            $this->jenis_kelahiran = $this->surat->jenis_kelahiran;
            $this->kelahiran_ke = $this->surat->kelahiran_ke;
            $this->penolong_kelahiran = $this->surat->penolong_kelahiran;
            $this->panjang_bayi = $this->surat->panjang_bayi;
            $this->berat_bayi = $this->surat->berat_bayi;
            $this->nik_ibu = $this->surat->nik_ibu;
            $this->nama_ibu = $this->surat->nama_ibu;
            $this->tgl_lahir_ibu = $this->surat->tgl_lahir_ibu;
            $this->pekerjaan_id_ibu = $this->surat->pekerjaan_id_ibu;
            $this->alamat_ibu = $this->surat->alamat_ibu;
            $this->provinsi_id_ibu = $this->surat->provinsi_id_ibu;
            $this->kota_id_ibu = $this->surat->kota_id_ibu;
            $this->kecamatan_id_ibu = $this->surat->kecamatan_id_ibu;
            $this->area_id_ibu = $this->surat->area_id_ibu;
            $this->kewarganegaraan_ibu = $this->surat->kewarganegaraan_ibu;
            $this->kebangsaan_ibu = $this->surat->kebangsaan_ibu;
            $this->tgl_pencatatan_perkawinan = $this->surat->tgl_pencatatan_perkawinan;
            $this->nik_ayah = $this->surat->nik_ayah;
            $this->nama_ayah = $this->surat->nama_ayah;
            $this->tgl_lahir_ayah = $this->surat->tgl_lahir_ayah;
            $this->pekerjaan_id_ayah = $this->surat->pekerjaan_id_ayah;
            $this->alamat_ayah = $this->surat->alamat_ayah;
            $this->provinsi_id_ayah = $this->surat->provinsi_id_ayah;
            $this->kota_id_ayah = $this->surat->kota_id_ayah;
            $this->kecamatan_id_ayah = $this->surat->kecamatan_id_ayah;
            $this->area_id_ayah = $this->surat->area_id_ayah;
            $this->kewarganegaraan_ayah = $this->surat->kewarganegaraan_ayah;
            $this->kebangsaan_ayah = $this->surat->kebangsaan_ayah;
            $this->nik_pelapor = $this->surat->nik_pelapor;
            $this->nama_pelapor = $this->surat->nama_pelapor;
            $this->umur_pelapor = $this->surat->umur_pelapor;
            $this->jk_pelapor = $this->surat->jk_pelapor;
            $this->pekerjaan_id_pelapor = $this->surat->pekerjaan_id_pelapor;
            $this->alamat_pelapor = $this->surat->alamat_pelapor;
            $this->provinsi_id_pelapor = $this->surat->provinsi_id_pelapor;
            $this->kota_id_pelapor = $this->surat->kota_id_pelapor;
            $this->kecamatan_id_pelapor = $this->surat->kecamatan_id_pelapor;
            $this->area_id_pelapor = $this->surat->area_id_pelapor;
            $this->nik_saksi1 = $this->surat->nik_saksi1;
            $this->nama_saksi1 = $this->surat->nama_saksi1;
            $this->umur_saksi1 = $this->surat->umur_saksi1;
            $this->jk_saksi1 = $this->surat->jk_saksi1;
            $this->pekerjaan_id_saksi1 = $this->surat->pekerjaan_id_saksi1;
            $this->alamat_saksi1 = $this->surat->alamat_saksi1;
            $this->provinsi_id_saksi1 = $this->surat->provinsi_id_saksi1;
            $this->kota_id_saksi1 = $this->surat->kota_id_saksi1;
            $this->kecamatan_id_saksi1 = $this->surat->kecamatan_id_saksi1;
            $this->area_id_saksi1 = $this->surat->area_id_saksi1;
            $this->nik_saksi2 = $this->surat->nik_saksi2;
            $this->nama_saksi2 = $this->surat->nama_saksi2;
            $this->umur_saksi2 = $this->surat->umur_saksi2;
            $this->jk_saksi2 = $this->surat->jk_saksi2;
            $this->pekerjaan_id_saksi2 = $this->surat->pekerjaan_id_saksi2;
            $this->alamat_saksi2 = $this->surat->alamat_saksi2;
            $this->provinsi_id_saksi2 = $this->surat->provinsi_id_saksi2;
            $this->kota_id_saksi2 = $this->surat->kota_id_saksi2;
            $this->kecamatan_id_saksi2 = $this->surat->kecamatan_id_saksi2;
            $this->area_id_saksi2 = $this->surat->area_id_saksi2;
            $this->file_sk_kelahiran = $this->surat->file_sk_kelahiran;
            $this->file_surat_nikah = $this->surat->file_surat_nikah;
            $this->file_kk = $this->surat->file_kk;
            $this->file_ayah = $this->surat->file_ayah;
            $this->file_ibu = $this->surat->file_ibu;
            $this->kotaPelapor= getCities($this->surat->provinsi_id_pelapor);
            $this->kotaAyah= getCities($this->surat->provinsi_id_ayah);
            $this->kotaIbu= getCities($this->surat->provinsi_id_ibu);
            $this->kotaSaksi1= getCities($this->surat->provinsi_id_saksi1);
            $this->kotaSaksi2= getCities($this->surat->provinsi_id_saksi2);
            $this->kecamatanPelapor= getDistricts($this->surat->kota_id_pelapor);
            $this->kecamatanAyah= getdistricts($this->surat->kota_id_ayah);
            $this->kecamatanIbu= getdistricts($this->surat->kota_id_ibu);
            $this->kecamatanSaksi1= getdistricts($this->surat->kota_id_saksi1);
            $this->kecamatanSaksi2= getdistricts($this->surat->kota_id_saksi2);
            $this->areaPelapor= getareas($this->surat->kecamatan_id_pelapor);
            $this->areaAyah= getareas($this->surat->kecamatan_id_ayah);
            $this->areaIbu= getAreas($this->surat->kecamatan_id_ibu);
            $this->areaSaksi1= getAreas($this->surat->kecamatan_id_saksi1);
            $this->areaSaksi2= getAreas($this->surat->kecamatan_id_saksi2);
        }
    }

    public function store()
    {
        $this->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required|min:16',
            'nama_bayi' => 'required',
            'tempat_dilahirkan' => 'required|',
            'tempat_lahir' => 'required',
            'jk_bayi' => 'required',
            'hari' => 'required',
            'tgl_lahir_bayi' => 'required',
            'pukul' => 'required',
            'jenis_kelahiran' => 'required',
            'kelahiran_ke' => 'required',
            'penolong_kelahiran' => 'required',
            'panjang_bayi' => 'required',
            'berat_bayi' => 'required',
            'nik_ibu' => 'required|max:16|min:16',
            'nama_ibu' => 'required',
            'tgl_lahir_ibu' => 'required',
            'pekerjaan_id_ibu' => 'required',
            'alamat_ibu' => 'required',
            'provinsi_id_ibu' => 'required',
            'kota_id_ibu' => 'required',
            'kecamatan_id_ibu' => 'required',
            'area_id_ibu' => 'required',
            'kewarganegaraan_ibu' => 'required',
            'kebangsaan_ibu' => 'required',
            'tgl_pencatatan_perkawinan' => 'required',
            'nik_ayah' => 'required|min:16',
            'nama_ayah' => 'required',
            'tgl_lahir_ayah' => 'required',
            'pekerjaan_id_ayah' => 'required',
            'alamat_ayah' => 'required',
            'provinsi_id_ayah' => 'required',
            'kota_id_ayah' => 'required',
            'kecamatan_id_ayah' => 'required',
            'area_id_ayah' => 'required',
            'kewarganegaraan_ayah' => 'required',
            'kebangsaan_ayah' => 'required',
            'nik_pelapor' => 'required|min:16',
            'nama_pelapor' => 'required',
            'umur_pelapor' => 'required',
            'jk_pelapor' => 'required',
            'pekerjaan_id_pelapor' => 'required',
            'alamat_pelapor' => 'required',
            'provinsi_id_pelapor' => 'required',
            'kota_id_pelapor' => 'required',
            'kecamatan_id_pelapor' => 'required',
            'area_id_pelapor' => 'required',
            'nik_saksi1' => 'required|min:16',
            'nama_saksi1' => 'required',
            'umur_saksi1' => 'required',
            'jk_saksi1' => 'required',
            'pekerjaan_id_saksi1' => 'required',
            'alamat_saksi1' => 'required',
            'provinsi_id_saksi1' => 'required',
            'kota_id_saksi1' => 'required',
            'kecamatan_id_saksi1' => 'required',
            'area_id_saksi1' => 'required',
            'nik_saksi2' => 'required|min:16',
            'nama_saksi2' => 'required',
            'umur_saksi2' => 'required',
            'jk_saksi2' => 'required',
            'pekerjaan_id_saksi2' => 'required',
            'alamat_saksi2' => 'required',
            'provinsi_id_saksi2' => 'required',
            'kota_id_saksi2' => 'required',
            'kecamatan_id_saksi2' => 'required',
            'area_id_saksi2' => 'required',
            'file_sk_kelahiran' => 'required|max:1024'.(!empty($this->file_sk_kelahiran))?'':'|mimes:jpeg,jpg,png',
            'file_surat_nikah' => 'required|max:1024'.(!empty($this->file_surat_nikah))?'':'|mimes:jpeg,jpg,png',
            'file_kk' => 'required|max:1024'.(!empty($this->file_kk))?'':'|mimes:jpeg,jpg,png',
            'file_ayah' => 'required|max:1024'.(!empty($this->file_ayah))?'':'|mimes:jpeg,jpg,png',
            'file_ibu' => 'required|max:1024'.(!empty($this->file_ibu))?'':'|mimes:jpeg,jpg,png',
        ],
        [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max kb/ 1 mb',
            'min' => ':attribute maksimal :min karakter',
            'mimes' => ':attribute harus jpeg,png,jpg'
        ],
        [
            'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
            'no_kk' => 'No Kartu Keluarga',
            'nama_bayi' => 'Nama Bayi',
            'tempat_dilahirkan' => 'Tempat Dilahirkan',
            'tempat_lahir' => 'Tempat Lahir',
            'jk_bayi' => 'Jenis Kelamin Bayi',
            'hari' => 'Hari',
            'tgl_lahir_bayi' => 'Tanggal Lahir Bayi',
            'pukul' => 'Pukul',
            'jenis_kelahiran' => 'Jenis Kelamin',
            'kelahiran_ke' => 'Kelahiran Ke',
            'penolong_kelahiran' => 'Panjang Bayi',
            'panjang_bayi' => 'Panjang Bayi',
            'berat_bayi' => 'Berat Bayi',
            'nik_ibu' => 'NIK Ibu',
            'nama_ibu' => 'Nama Ibu',
            'tgl_lahir_ibu' => 'Tanggal Lahir Ibu',
            'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'provinsi_id_ibu' => 'Provinsi',
            'kota_id_ibu' => 'Kota',
            'kecamatan_id_ibu' => 'Kecamatan',
            'area_id_ibu' => 'Desa',
            'kewarganegaraan_ibu' => 'Kewarganegaraan',
            'kebangsaan_ibu' => 'Kebangsaan',
            'tgl_pencatatan_perkawinan' => 'Tanggal Pencatatan Perkawinan',
            'nik_ayah' => 'NIK Ayah',
            'nama_ayah' => 'Nama Ayah',
            'tgl_lahir_ayah' => 'Tanggal Lahir Ayah',
            'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'provinsi_id_ayah' => 'Provinsi',
            'kota_id_ayah' => 'Kota',
            'kecamatan_id_ayah' => 'Kecamatan',
            'area_id_ayah' => 'Desa',
            'kewarganegaraan_ayah' => 'Kewarganegaraan',
            'kebangsaan_ayah' => 'Kebangsaan',
            'nik_pelapor' => 'NIK Pelapor',
            'nama_pelapor' => 'Nama Pelapor',
            'umur_pelapor' => 'Umur Pelapor',
            'jk_pelapor' => 'Jenis Kelamin Pelapor',
            'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
            'alamat_pelapor' => 'Alamat Pelapor',
            'provinsi_id_pelapor' => 'Provinsi Pelapor',
            'kota_id_pelapor' => 'Kota',
            'kecamatan_id_pelapor' => ' Kecamatan',
            'area_id_pelapor' => 'Desa',
            'nik_saksi1' => 'NIK Saksi 1',
            'nama_saksi1' => 'Nama Saksi 1',
            'umur_saksi1' => 'Umur Saksi 1',
            'jk_saksi1' => 'Jenis Kelamin Saksi 1',
            'pekerjaan_id_saksi1' => 'Pekerjaan Saksi 1',
            'alamat_saksi1' => 'Alamat Saksi 1',
            'provinsi_id_saksi1' => 'Provinsi',
            'kota_id_saksi1' => 'Kota',
            'kecamatan_id_saksi1' => 'Kecamatan',
            'area_id_saksi1' => 'Desa',
            'nik_saksi2' => 'NIK Saksi 2',
            'nama_saksi2' => 'Nama Saksi 2',
            'jk_saksi2' => 'Jenis Kelamin Saksi 2',
            'umur_saksi2' => 'Umur Saksi 2',
            'pekerjaan_id_saksi2' => 'Pekerjaan Saksi 2',
            'alamat_saksi2' => 'Alamat Saksi 2',
            'provinsi_id_saksi2' => 'Provinsi',
            'kota_id_saksi2' => 'Kota',
            'kecamatan_id_saksi2' => 'Kecamatan',
            'area_id_saksi2' => 'Desa',
            'file_sk_kelahiran' => 'File SK Kelahiran',
            'file_surat_nikah' => 'File Surat Nikah',
            'file_kk' => 'File KK',
            'file_ayah' => 'File KTP Ayah',
            'file_ibu' => 'File KTP Ibu',
        ]);

        if($this->file_sk_kelahiran != $this->surat->file_sk_kelahiran){
            $kelahiran = \Str::uuid().'.'.$this->file_sk_kelahiran->getClientOriginalExtension();
        }else{
            $kelahiran = $this->file_sk_kelahiran;
        }

        if($this->file_surat_nikah != $this->surat->file_surat_nikah){
            $nikah = \Str::uuid().'.'.$this->file_surat_nikah->getClientOriginalExtension();
        }else{
            $nikah = $this->file_surat_nikah;
        }

        if($this->file_kk != $this->surat->file_kk){
            $kk = \Str::uuid().'.'.$this->file_kk->getClientOriginalExtension();
        }else{
            $kk = $this->file_kk;
        }

        if($this->file_ayah != $this->surat->file_ayah){
            $ayah = \Str::uuid().'.'.$this->file_ayah->getClientOriginalExtension();
        }else{
            $ayah = $this->file_ayah;
        }

        if($this->file_ibu != $this->surat->file_ibu){
            $ibu = \Str::uuid().'.'.$this->file_ibu->getClientOriginalExtension();
        }else{
            $ibu = $this->file_ibu;
        }

        $namaFile = [
            'file_sk_kelahiran' =>  $kelahiran,
            'file_surat_nikah' =>  $nikah,
            'file_kk' => $kk,
            'file_ayah' => $ayah,
            'file_ibu' => $ibu,
        ];

        $data = [
            'id' => $this->surat->id,
            'desa_id' => $this->surat->desa_id,
            'user_id' => $this->user->id,
            'status' => '1',
            'nama_kepala_keluarga' => $this->nama_kepala_keluarga,
            'no_kk' => $this->no_kk,
            'nama_bayi' => $this->nama_bayi,
            'jk_bayi' => $this->jk_bayi,
            'tempat_dilahirkan' => $this->tempat_dilahirkan,
            'tempat_lahir' => $this->tempat_lahir,
            'hari' => $this->hari,
            'tgl_lahir_bayi' => $this->tgl_lahir_bayi,
            'pukul' => $this->pukul,
            'jenis_kelahiran' => $this->jenis_kelahiran,
            'kelahiran_ke' => $this->kelahiran_ke,
            'penolong_kelahiran' => $this->penolong_kelahiran,
            'berat_bayi' => $this->berat_bayi,
            'panjang_bayi' => $this->panjang_bayi,
            'nik_ibu' => $this->nik_ibu,
            'nama_ibu' => $this->nama_ibu,
            'tgl_lahir_ibu' => $this->tgl_lahir_ibu,
            'pekerjaan_id_ibu' => $this->pekerjaan_id_ibu,
            'alamat_ibu' => $this->alamat_ibu,
            'provinsi_id_ibu' => $this->provinsi_id_ibu,
            'kota_id_ibu' => $this->kota_id_ibu,
            'kecamatan_id_ibu' => $this->kecamatan_id_ibu,
            'area_id_ibu' => $this->area_id_ibu,
            'kewarganegaraan_ibu' => $this->kewarganegaraan_ibu,
            'kebangsaan_ibu' => $this->kebangsaan_ibu,
            'tgl_pencatatan_perkawinan' => $this->tgl_pencatatan_perkawinan,
            'nik_ayah' => $this->nik_ayah,
            'nama_ayah' => $this->nama_ayah,
            'tgl_lahir_ayah' => $this->tgl_lahir_ayah,
            'pekerjaan_id_ayah' => $this->pekerjaan_id_ayah,
            'alamat_ayah' => $this->alamat_ayah,
            'provinsi_id_ayah' => $this->provinsi_id_ayah,
            'kota_id_ayah' => $this->kota_id_ayah,
            'kecamatan_id_ayah' => $this->kecamatan_id_ayah,
            'area_id_ayah' => $this->area_id_ayah,
            'kewarganegaraan_ayah' => $this->kewarganegaraan_ayah,
            'kebangsaan_ayah' => $this->kebangsaan_ayah,
            'nik_pelapor' => $this->nik_pelapor,
            'nama_pelapor' => $this->nama_pelapor,
            'umur_pelapor' => $this->umur_pelapor,
            'jk_pelapor' => $this->jk_pelapor,
            'pekerjaan_id_pelapor' => $this->pekerjaan_id_pelapor,
            'alamat_pelapor' => $this->alamat_pelapor,
            'provinsi_id_pelapor' => $this->provinsi_id_pelapor,
            'kota_id_pelapor' => $this->kota_id_pelapor,
            'kecamatan_id_pelapor' => $this->kecamatan_id_pelapor,
            'area_id_pelapor' => $this->area_id_pelapor,
            'nik_saksi1' => $this->nik_saksi1,
            'nama_saksi1' => $this->nama_saksi1,
            'umur_saksi1' => $this->umur_saksi1,
            'jk_saksi1' => $this->jk_saksi1,
            'pekerjaan_id_saksi1' => $this->pekerjaan_id_saksi1,
            'alamat_saksi1' => $this->alamat_saksi1,
            'provinsi_id_saksi1' => $this->provinsi_id_saksi1,
            'kota_id_saksi1' => $this->kota_id_saksi1,
            'kecamatan_id_saksi1' => $this->kecamatan_id_saksi1,
            'area_id_saksi1' => $this->area_id_saksi1,
            'nik_saksi2' => $this->nik_saksi2,
            'nama_saksi2' => $this->nama_saksi2,
            'umur_saksi2' => $this->umur_saksi2,
            'jk_saksi2' => $this->jk_saksi2,
            'pekerjaan_id_saksi2' => $this->pekerjaan_id_saksi2,
            'alamat_saksi2' => $this->alamat_saksi2,
            'provinsi_id_saksi2' => $this->provinsi_id_saksi2,
            'kota_id_saksi2' => $this->kota_id_saksi2,
            'kecamatan_id_saksi2' => $this->kecamatan_id_saksi2,
            'area_id_saksi2' => $this->area_id_saksi2,
            'file_sk_kelahiran' => $namaFile['file_sk_kelahiran'],
            'file_surat_nikah' => $namaFile['file_surat_nikah'],
            'file_kk' => $namaFile['file_kk'],
            'file_ibu' => $namaFile['file_ibu'],
            'file_ayah' => $namaFile['file_ayah'],
        ];

        $skk = (new SkkUpdateAction)->run($data);
        if(empty($skk)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_kk,$this->file_ayah,$this->file_ibu,$this->file_surat_nikah,$this->file_sk_kelahiran,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Kelahiran berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($kk,$ayah,$ibu,$nikah,$lahir,$namaFile)
    {
        if($kk != $this->surat->file_kk){
            if(\File::exists('storage/backend/images/dokumen/skk/kk/'.$this->surat->file_kk)){
                \File::delete('storage/backend/images/dokumen/skk/kk/'.$this->surat->file_kk);
            }
            $kk->storeAs('backend/images/dokumen/skk/kk/',$namaFile['file_kk']);
        }
        if($ayah != $this->surat->file_ayah){
            if(\File::exists('storage/backend/images/dokumen/skk/file_ayah/'.$this->surat->file_ayah)){
                \File::delete('storage/backend/images/dokumen/skk/file_ayah/'.$this->surat->file_ayah);
            }
            $ayah->storeAs('backend/images/dokumen/skk/file_ayah/',$namaFile['file_ayah']);

        }
        if($ibu != $this->surat->file_ibu){
            if(\File::exists('storage/backend/images/dokumen/skk/file_ibu/'.$this->surat->file_ibu)){
                \File::delete('storage/backend/images/dokumen/skk/file_ibu/'.$this->surat->file_ibu);
            }
            $ibu->storeAs('backend/images/dokumen/skk/file_ibu/',$namaFile['file_ibu']);

        }
        if($nikah != $this->surat->file_surat_nikah){
            if(\File::exists('storage/backend/images/dokumen/skk/surat_nikah/'.$this->surat->file_surat_nikah)){
                \File::delete('storage/backend/images/dokumen/skk/surat_nikah/'.$this->surat->file_surat_nikah);
            }
            $nikah->storeAs('backend/images/dokumen/skk/surat_nikah/',$namaFile['file_surat_nikah']);
        }
        if($lahir != $this->surat->file_sk_kelahiran){
            if(\File::exists('storage/backend/images/dokumen/skk/sk_kelahiran/'.$this->surat->file_sk_kelahiran)){
                \File::delete('storage/backend/images/dokumen/skk/sk_kelahiran/'.$this->surat->file_sk_kelahiran);
            }
            $lahir->storeAs('backend/images/dokumen/skk/sk_kelahiran/',$namaFile['file_sk_kelahiran']);

        }
    }
    public function updatedProvinsiIdPelapor($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaPelapor = getCities($provinsi_id);
        }else{
            $this->kotaPelapor = [];
        }
    }

    public function updatedProvinsiIdAyah($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaAyah = getCities($provinsi_id);
        }else{
            $this->kotaAyah = [];
        }
    }

    public function updatedProvinsiIdIbu($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaIbu = getCities($provinsi_id);
        }else{
            $this->kotaIbu = [];
        }
    }

    public function updatedProvinsiIdSaksi1($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaSaksi1 = getCities($provinsi_id);
        }else{
            $this->kotaSaksi1 = [];
        }
    }

    public function updatedProvinsiIdSaksi2($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaSaksi2 = getCities($provinsi_id);
        }else{
            $this->kotaSaksi2 = [];
        }
    }

    public function updatedKotaIdPelapor($kota_id)
    {   
        if($kota_id){
            $this->kecamatanPelapor = getDistricts($kota_id);
        }else{
            $this->kecamatanPelapor = [];
        }
    }

    public function updatedKotaIdSaksi1($kota_id)
    {   
        if($kota_id){
            $this->kecamatanSaksi1 = getDistricts($kota_id);
        }else{
            $this->kecamatanSaksi1 = [];
        }
    }

    public function updatedKotaIdSaksi2($kota_id)
    {   
        if($kota_id){
            $this->kecamatanSaksi2 = getDistricts($kota_id);
        }else{
            $this->kecamatanSaksi2 = [];
        }
    }

    public function updatedKotaIdAyah($kota_id)
    {   
        if($kota_id){
            $this->kecamatanAyah = getDistricts($kota_id);
        }else{
            $this->kecamatanAyah = [];
        }
    }

    public function updatedKotaIdIbu($kota_id)
    {   
        if($kota_id){
            $this->kecamatanIbu = getDistricts($kota_id);
        }else{
            $this->kecamatanIbu = [];
        }
    }

    public function updatedKecamatanIdPelapor($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaPelapor = getAreas($kecamatan_id);
        }else{
            $this->areaPelapor = [];
        }
    }

    public function updatedKecamatanIdSaksi1($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaSaksi1 = getAreas($kecamatan_id);
        }else{
            $this->areaSaksi1 = [];
        }
    }

    public function updatedKecamatanIdSaksi2($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaSaksi2 = getAreas($kecamatan_id);
        }else{
            $this->areaSaksi2 = [];
        }
    }

    public function updatedKecamatanIdAyah($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaAyah = getAreas($kecamatan_id);
        }else{
            $this->areaAyah = [];
        }
    }

    public function updatedKecamatanIdIbu($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaIbu = getAreas($kecamatan_id);
        }else{
            $this->areaIbu = [];
        }
    }


    public function render()
    {
        return view('livewire.frontend.skk-create',[
            'provinsi' => Provinsi::query()->get(),
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
