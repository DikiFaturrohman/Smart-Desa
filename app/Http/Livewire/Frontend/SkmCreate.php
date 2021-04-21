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
use App\Actions\SkmCreateAction;
use App\Models\User;
use Auth;

class SkmCreate extends Component
{
    use WithFileUploads;
    use AutoNumber;
    
    public $nama_kepala_keluarga;
    public $no_kk;
    public $nama_jenazah;
    public $nik_jenazah;
    public $jk_jenazah;
    public $tgl_lahir_jenazah;
    public $tempat_lahir;
    public $agama;
    public $pekerjaan_id_jenazah;
    public $alamat_jenazah;
    public $provinsi_id_jenazah;
    public $kota_id_jenazah;
    public $kecamatan_id_jenazah;
    public $area_id_jenazah;
    public $kewarganegaraan;
    public $keturunan;
    public $kebangsaan;
    public $anak_ke;
    public $tgl_kematian;
    public $pukul;
    public $sebab_kematian;
    public $tempat_kematian;
    public $yang_menerangkan;
    public $nik_ibu;
    public $nama_ibu;
    public $umur_ibu;
    public $pekerjaan_id_ibu;
    public $alamat_ibu;
    public $provinsi_id_ibu;
    public $kota_id_ibu;
    public $kecamatan_id_ibu;
    public $area_id_ibu;
    public $nik_ayah;
    public $nama_ayah;
    public $umur_ayah;
    public $pekerjaan_id_ayah;
    public $alamat_ayah;
    public $provinsi_id_ayah;
    public $kota_id_ayah;
    public $kecamatan_id_ayah;
    public $area_id_ayah;
    public $nik_pelapor;
    public $nama_pelapor;
    public $pekerjaan_id_pelapor;
    public $umur_pelapor;
    public $alamat_pelapor;
    public $hubungan;
    public $nik_saksi1;
    public $nama_saksi1;
    public $nik_saksi2;
    public $nama_saksi2;
    public $file_sk_rs;
    public $file_ktp_pelapor;
    public $file_ktp_alm;
    public $file_ktp_saksi;
    public $kotaJenazah=[];
    public $kotaAyah=[];
    public $kotaIbu=[];
    public $kecamatanJenazah=[];
    public $kecamatanAyah=[];
    public $kecamatanIbu=[];
    public $areaJenazah=[];
    public $areaAyah=[];
    public $areaIbu=[];
    public $user;

    public function mount()
    {
        $this->user = \current_user('masyarakat');
    }

    public function store()
    {
        $this->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required|min:16',
            'nik_jenazah' => 'required|min:16',
            'nama_jenazah' => 'required',
            'jk_jenazah' => 'required',
            'tgl_lahir_jenazah' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan_id_jenazah' => 'required',
            'alamat_jenazah' => 'required',
            'provinsi_id_jenazah' => 'required',
            'kota_id_jenazah' => 'required',
            'kecamatan_id_jenazah' => 'required',
            'area_id_jenazah' => 'required',
            'kewarganegaraan' => 'required',
            'kebangsaan' => 'required',
            'anak_ke' => 'required',
            'tgl_kematian' => 'required',
            'pukul' => 'required',
            'sebab_kematian' => 'required',
            'tempat_kematian' => 'required',
            'yang_menerangkan' => 'required',
            'nik_ibu' => 'required|min:16',
            'nama_ibu' => 'required',
            'umur_ibu' => 'required',
            'pekerjaan_id_ibu' => 'required',
            'alamat_ibu' => 'required',
            'provinsi_id_ibu' => 'required',
            'kota_id_ibu' => 'required',
            'kecamatan_id_ibu' => 'required',
            'area_id_ibu' => 'required',
            'nik_ayah' => 'required|min:16',
            'nama_ayah' => 'required',
            'umur_ayah' => 'required',
            'pekerjaan_id_ayah' => 'required',
            'alamat_ayah' => 'required',
            'provinsi_id_ayah' => 'required',
            'kota_id_ayah' => 'required',
            'kecamatan_id_ayah' => 'required',
            'area_id_ayah' => 'required',
            'nik_pelapor' => 'required|min:16',
            'nama_pelapor' => 'required',
            'pekerjaan_id_pelapor' => 'required',
            'alamat_pelapor' => 'required',
            'umur_pelapor' => 'required',
            'hubungan' => 'required',
            'nik_saksi1' => 'required|min:16',
            'nama_saksi1' => 'required',
            'nik_saksi2' => 'required|min:16',
            'nama_saksi2' => 'required',
            'file_sk_rs' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_ktp_pelapor' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_ktp_alm' => 'required|max:1024|mimes:jpeg,jpg,png',
            'file_ktp_saksi' => 'required|max:1024|mimes:jpeg,jpg,png',
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
            'nik_jenazah' => 'NIK Jenazah',
            'nama_jenazah' => 'Nama Jenazah',
            'jk_jenazah' => 'Jenis Kelamin Jenazah',
            'tgl_lahir_jenazah' => 'Tanggal Lahir Jenazah',
            'tempat_lahir' => 'Tempat Lahir Jenazah',
            'agama' => 'Agama Jenazah',
            'pekerjaan_id_jenazah' => 'Pekerjaan Jenazah',
            'alamat_jenazah' => 'Alamat Jenazah',
            'provinsi_id_jenazah' => 'Provinsi Jenazah',
            'kota_id_jenazah' => 'Kota Jenazah',
            'kecamatan_id_jenazah' => 'Kecamatan Jenazah',
            'area_id_jenazah' => 'Desa Jenazah',
            'kewarganegaraan' => 'Kewarganegaraan Jenazah',
            'kebangsaan' => 'Kebangsaan Jenazah',
            'anak_ke' => 'Anak Ke',
            'tgl_kematian' => 'Tanggal Kematian',
            'pukul' => 'Pukul',
            'sebab_kematian' => 'Sebab Kematian',
            'tempat_kematian' => 'Tempat Kematian',
            'yang_menerangkan' => 'Yang Menerangkan',
            'nik_ibu' => 'NIK Ibu',
            'nama_ibu' => 'Nama Ibu',
            'umur_ibu' => 'Umur Ibu',
            'pekerjaan_id_ibu' => 'Pekerjaan Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'provinsi_id_ibu' => 'Provinsi Ibu',
            'kota_id_ibu' => 'Kota Ibu',
            'kecamatan_id_ibu' => 'Kecamatan Ibu',
            'area_id_ibu' => 'Desa Ibu',
            'nik_ayah' => 'NIK Ayah',
            'nama_ayah' => 'Nama Ayah',
            'umur_ayah' => 'Umur Ayah',
            'pekerjaan_id_ayah' => 'Pekerjaan Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'provinsi_id_ayah' => 'Provinsi Ayah',
            'kota_id_ayah' => 'Kota Ayah',
            'kecamatan_id_ayah' => 'Kecamatan Ayah',
            'area_id_ayah' => 'Desa Ayah',
            'nik_pelapor' => 'NIK Pelapor',
            'nama_pelapor' => 'Nama Pelapor',
            'pekerjaan_id_pelapor' => 'Pekerjaan Pelapor',
            'alamat_pelapor' => 'Alamat',
            'umur_pelapor' => 'Umur',
            'hubungan' => 'Hubungan',
            'nik_saksi1' => 'NIK Saksi 1',
            'nama_saksi1' => 'Nama Saksi 1',
            'nik_saksi2' => 'NIK Saksi 2',
            'nama_saksi2' => 'Nama Saksi 2',
            'file_sk_rs' => 'File SK Rumah Sakit',
            'file_ktp_pelapor' => 'File KTP Pelapor',
            'file_ktp_alm' => 'File KTP Alm',
            'file_ktp_saksi' => 'File KTP Saksi',
        ]);

        $namaFile = [
            'file_sk_rs' => \Str::uuid().'.'.$this->file_sk_rs->getClientOriginalExtension(),
            'file_ktp_pelapor' => \Str::uuid().'.'.$this->file_ktp_pelapor->getClientOriginalExtension(),
            'file_ktp_alm' => \Str::uuid().'.'.$this->file_ktp_pelapor->getClientOriginalExtension(),
            'file_ktp_saksi' => \Str::uuid().'.'.$this->file_ktp_pelapor->getClientOriginalExtension(),
        ];

        $data = [
            'id' => $this->generateAutoNumber('ds_sk_kematian'),
            'desa_id' => session()->get('desa_id'),
            'user_id' => $this->user->id,
            'status' => '1',
            'nama_kepala_keluarga' => $this->nama_kepala_keluarga,
            'no_kk' => $this->no_kk,
            'nama_jenazah' => $this->nama_jenazah,
            'nik_jenazah' => $this->nik_jenazah,
            'jk_jenazah' => $this->jk_jenazah,
            'tgl_lahir_jenazah' => $this->tgl_lahir_jenazah,
            'tempat_lahir' => $this->tempat_lahir,
            'agama' => $this->agama,
            'pekerjaan_id_jenazah' => $this->pekerjaan_id_jenazah,
            'alamat_jenazah' => $this->alamat_jenazah,
            'provinsi_id_jenazah' => $this->provinsi_id_jenazah,
            'kota_id_jenazah' => $this->kota_id_jenazah,
            'kecamatan_id_jenazah' => $this->kecamatan_id_jenazah,
            'area_id_jenazah' => $this->area_id_jenazah,
            'kewarganegaraan' => $this->kewarganegaraan,
            'keturunan' => $this->keturunan,
            'kebangsaan' => $this->kebangsaan,
            'anak_ke' => $this->anak_ke,
            'tgl_kematian' => $this->tgl_kematian,
            'pukul' => $this->pukul,
            'sebab_kematian' => $this->sebab_kematian,
            'tempat_kematian' => $this->tempat_kematian,
            'yang_menerangkan' => $this->yang_menerangkan,
            'nik_ibu' => $this->nik_ibu,
            'nama_ibu' => $this->nama_ibu,
            'umur_ibu' => $this->umur_ibu,
            'pekerjaan_id_ibu' => $this->pekerjaan_id_ibu,
            'alamat_ibu' => $this->alamat_ibu,
            'provinsi_id_ibu' => $this->provinsi_id_ibu,
            'kota_id_ibu' => $this->kota_id_ibu,
            'kecamatan_id_ibu' => $this->kecamatan_id_ibu,
            'area_id_ibu' => $this->area_id_ibu,
            'nik_ayah' => $this->nik_ayah,
            'nama_ayah' => $this->nama_ayah,
            'umur_ayah' => $this->umur_ayah,
            'pekerjaan_id_ayah' => $this->pekerjaan_id_ayah,
            'alamat_ayah' => $this->alamat_ayah,
            'provinsi_id_ayah' => $this->provinsi_id_ayah,
            'kota_id_ayah' => $this->kota_id_ayah,
            'kecamatan_id_ayah' => $this->kecamatan_id_ayah,
            'area_id_ayah' => $this->area_id_ayah,
            'nik_pelapor' => $this->nik_pelapor,
            'nama_pelapor' => $this->nama_pelapor,
            'pekerjaan_id_pelapor' => $this->pekerjaan_id_pelapor,
            'umur_pelapor' => $this->umur_pelapor,
            'alamat_pelapor' => $this->alamat_pelapor,
            'hubungan' => $this->hubungan,
            'nik_saksi1' => $this->nik_saksi1,
            'nama_saksi1' => $this->nama_saksi1,
            'nik_saksi2' => $this->nik_saksi2,
            'nama_saksi2' => $this->nama_saksi2,
            'file_sk_rs' => $namaFile['file_sk_rs'],
            'file_ktp_pelapor' => $namaFile['file_ktp_pelapor'],
            'file_ktp_alm' => $namaFile['file_ktp_alm'],
            'file_ktp_saksi' => $namaFile['file_ktp_saksi'],
        ];

        $skm = (new SkmCreateAction)->run($data);
        if(empty($skm)){
            toastr()->error('Gagal Membuat Surat','Gagal');
            return redirect()->back();
        }

        $this->storeFile($this->file_sk_rs,$this->file_ktp_pelapor,$this->file_ktp_alm,$this->file_ktp_saksi,$namaFile);

        if(Auth::guard('masyarakat')->check()){
            toastr()->success('Pengajuan Surat Keterangan Kematian berhasil di buat','Sukses');
            return redirect()->route('frontend.listprogress');
        }else{
            return redirect()->route('frontend.success');
        }
    }

    function storeFile($rs,$pelapor,$alm,$saksi,$namaFile)
    {
        if($rs){
            $rs->storeAs('backend/images/dokumen/skm/sk_rs',$namaFile['file_sk_rs']);
        }
        if($pelapor){
            $pelapor->storeAs('backend/images/dokumen/skm/ktp_pelapor/',$namaFile['file_ktp_pelapor']);

        }
        if($alm){
            $alm->storeAs('backend/images/dokumen/skm/ktp_alm/',$namaFile['file_ktp_alm']);

        }
        if($saksi){
            $saksi->storeAs('backend/images/dokumen/skm/ktp_saksi/',$namaFile['file_ktp_saksi']);

        }
    }
    public function updatedProvinsiIdJenazah($provinsi_id)
    {   
        if($provinsi_id){
            $this->kotaJenazah = getCities($provinsi_id);
        }else{
            $this->kotaJenazah = [];
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

    public function updatedKotaIdJenazah($kota_id)
    {   
        if($kota_id){
            $this->kecamatanJenazah = getDistricts($kota_id);
        }else{
            $this->kecamatanJenazah = [];
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

    public function updatedKecamatanIdJenazah($kecamatan_id)
    {   
        if($kecamatan_id){
            $this->areaJenazah = getAreas($kecamatan_id);
        }else{
            $this->areaJenazah = [];
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
        return view('livewire.frontend.skm-create',[
            'provinsi' => Provinsi::query()->get(),
            'pekerjaan' => Pekerjaan::query()->get()
        ]);
    }
}
