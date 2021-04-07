@extends('frontend.layout.wv-admin')

@section('title') Surat Keterangan Riwayat Tanah @endsection

@section('meta')



@endsection


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Riwayat Tanah</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($skrt->no_surat)??'-'}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pemilik</label>
                            <div class="col-sm-9">
                                {{($skrt->nama_pemilik)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK Pemilik</label>
                            <div class="col-sm-9">
                                {{($skrt->nik_pemilik)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Sertifikat</label>
                            <div class="col-sm-9">
                                {{($skrt->no_sertifikat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Riwayat 1</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($skrt->tgl_riwayat1)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atas Nama 1</label>
                            <div class="col-sm-9">
                                {{($skrt->atas_nama1)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Riwayat 2</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($skrt->tgl_riwayat2)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atas Nama 2</label>
                            <div class="col-sm-9">
                                {{($skrt->atas_nama2)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Berdasarkan 2</label>
                            <div class="col-sm-9">
                                {{($skrt->berdasarkan2)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Riwayat 3</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($skrt->tgl_riwayat3)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atas Nama 3</label>
                            <div class="col-sm-9">
                                {{($skrt->atas_nama3)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Berdasarkan 3</label>
                            <div class="col-sm-9">
                                {{($skrt->berdasarkan3)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Riwayat 4</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($skrt->tgl_riwayat4)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Atas Nama 4</label>
                            <div class="col-sm-9">
                                {{($skrt->atas_nama4)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Berdasarkan 4</label>
                            <div class="col-sm-9">
                                {{($skrt->berdasarkan4)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No SPPT</label>
                            <div class="col-sm-9">
                                {{($skrt->no_sppt)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Blok</label>
                            <div class="col-sm-9">
                                {{($skrt->blok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Persil</label>
                            <div class="col-sm-9">
                                {{($skrt->persil)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Kihir</label>
                            <div class="col-sm-9">
                                {{($skrt->no_kihir)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Luas</label>
                            <div class="col-sm-9">
                                {{($skrt->luas)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {{($skrt->alamat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebelah Utara</label>
                            <div class="col-sm-9">
                                {{($skrt->sebelah_utara)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebelah Timur</label>
                            <div class="col-sm-9">
                                {{($skrt->sebelah_timur)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebelah Selatan</label>
                            <div class="col-sm-9">
                                {{($skrt->sebelah_selatan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebelah Barat</label>
                            <div class="col-sm-9">
                                {{($skrt->sebelah_barat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Saksi 1</label>
                            <div class="col-sm-9">
                                {{($skrt->nama_saksi1)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK Saksi 1</label>
                            <div class="col-sm-9">
                                {{($skrt->nik_saksi1)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Saksi 2</label>
                            <div class="col-sm-9">
                                {{($skrt->nama_saksi2)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK Saksi 2</label>
                            <div class="col-sm-9">
                                {{($skrt->nik_saksi2)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/rtrw/'.$skrt->file_sp_rtrw)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/ktp/'.$skrt->file_ktp)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/kk/'.$skrt->file_kk)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/surat_pernyataan/'.$skrt->file_surat_pernyataan)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Tanah</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/surat_tanah/'.$skrt->file_surat_tanah)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pajak Tanah</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('backend/images/dokumen/skrt/surat_pajak_tanah/'.$skrt->file_surat_pajak_tanah)}}"
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
