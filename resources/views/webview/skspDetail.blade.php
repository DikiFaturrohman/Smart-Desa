@extends('frontend.layout.wv-admin')

@section('title') Surat Keterangan Status Pernikahan @endsection

@section('meta')



@endsection


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Status Pernikahan</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($skn->no_surat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skn->nama)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {{($skn->nik)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                {{($skn->tempat_lahir)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                {{\Carbon\Carbon::parse($skn->tgl_lahir)->translatedFormat('d M Y')??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                {{ucfirst($skn->jk)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Warga Negara</label>
                            <div class="col-sm-9">
                                {{ucfirst($skn->warga_negara)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                {{ucfirst($skn->status_perkawinan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Agama</label>
                            <div class="col-sm-9">
                                {{ucwords(strtolower($skn->agama))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {!!($skn->alamat)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keperluan</label>
                            <div class="col-sm-9">
                                {!!($skn->keperluan)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skn->kota->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skn->kecamatan->nama))??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skn->area->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skn/rtrw/'.$skn->file_sp_rtrw)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$skn->file_ktp)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$skn->file_kk)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Akta Cerai</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skn/akta_cerai/'.$skn->file_akta_cerai)}}"
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
