@extends('frontend.layout.wv-admin')

@section('title') Surat Keterangan Kematian @endsection

@section('meta')



@endsection


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Kematian</h4>
                    </div>
                    <div class="card-body">
                        <h5>Data Jenazah</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($skm->no_surat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Kepala Keluarga</label>
                            <div class="col-sm-9">
                                {{($skm->nama_kepala_keluarga)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Kartu Keluarga</label>
                            <div class="col-sm-9">
                                {{($skm->no_kk)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_jenazah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_jenazah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                {{($skm->jk_jenazah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                {{($skm->tempat_lahir)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                {{($skm->agama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir </label>
                            <div class="col-sm-9">
                                {{\Carbon\Carbon::parse($skm->tgl_lahir_jenazah)->translatedFormat('d M Y')??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                {{($skm->pekerjaanJenazah->nama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {{($skm->alamat_jenazah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->provinsiJenazah->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kotaJenazah->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kecamatanJenazah->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->areaJenazah->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                            <div class="col-sm-9">
                                {{($skm->kewarganegaraan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kebangsaan</label>
                            <div class="col-sm-9">
                                {{($skm->kebangsaan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keturunan</label>
                            <div class="col-sm-9">
                                {{($skm->keturunan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Anak Ke</label>
                            <div class="col-sm-9">
                                {{($skm->anak_ke)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Kematian </label>
                            <div class="col-sm-9">
                                {{\Carbon\Carbon::parse($skm->tgl_kematian)->translatedFormat('d M Y')??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pukul </label>
                            <div class="col-sm-9">
                                {{($skm->pukul)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebab Kematian </label>
                            <div class="col-sm-9">
                                {{($skm->sebab_kematian)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Kematian </label>
                            <div class="col-sm-9">
                                {{($skm->tempat_kematian)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Yang Menerangkan </label>
                            <div class="col-sm-9">
                                {{($skm->yang_menerangkan)??'-'}}
                            </div>
                        </div>
                        <h5>Data Ibu</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_ibu)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_ibu)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                {{($skm->umur_ibu)??'-'}} Tahun
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                {{($skm->pekerjaanIbu->nama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {!!($skm->alamat_ibu)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->provinsiIbu->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kotaIbu->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kecamatanIbu->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->areaIbu->nama))??'-'!!}
                            </div>
                        </div>
                        <h5>Data Ayah</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_ayah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_ayah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                {{($skm->umur_ayah)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                {{($skm->pekerjaanAyah->nama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {!!($skm->alamat_ayah)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->provinsiAyah->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kotaAyah->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->kecamatanAyah->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skm->areaAyah->nama))??'-'!!}
                            </div>
                        </div>
                        <h5>Data Pelapor</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_pelapor)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_pelapor)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                {{($skm->umur_pelapor)??'-'}} Tahun
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                {{($skm->pekerjaanPelapor->nama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {{($skm->alamat_pelapor)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hubungan Dengan yang meninggal</label>
                            <div class="col-sm-9">
                                {{($skm->hubungan)??'-'}}
                            </div>
                        </div>
                        <h5>Data Saksi 1</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_saksi1)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_saksi1)??'-'}}
                            </div>
                        </div>

                        <h5>Data Saksi 2</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skm->nik_saksi2)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skm->nama_saksi2)??'-'}}
                            </div>
                        </div>

                        <h5>Dokumen Penunjang</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File SK Rumah Sakit</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skm/sk_rs/'.$skm->file_sk_rs)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP Alm</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skm/ktp_alm/'.$skm->file_ktp_alm)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP Pelapor</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skm/ktp_pelapor/'.$skm->file_ktp_pelapor)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP Saksi</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skm/ktp_saksi/'.$skm->file_ktp_saksi)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
