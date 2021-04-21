@extends('frontend.layout.wv-admin')

@section('title') Surat Keterangan Kelahiran @endsection

@section('meta')



@endsection


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Beda Nama</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($skbn->no_surat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Dokumen 1</label>
                            <div class="col-sm-9">
                                {{strtoupper($skbn->skbnDetail[0]->jenis_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Dokumen 1</label>
                            <div class="col-sm-9">
                                {{($skbn->skbnDetail[0]->nomor_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Dokumen 1</label>
                            <div class="col-sm-9">
                                {{($skbn->skbnDetail[0]->nama_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Dokumen 2</label>
                            <div class="col-sm-9">
                                {{strtoupper($skbn->skbnDetail[1]->jenis_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Dokumen 2</label>
                            <div class="col-sm-9">
                                {{($skbn->skbnDetail[1]->nomor_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Dokumen 2</label>
                            <div class="col-sm-9">
                                {{($skbn->skbnDetail[1]->nama_dok)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dokumen yang benar diambil dari</label>
                            <div class="col-sm-9">
                                {{strtoupper($skbn->data_dok_benar)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skbn/rtrw/'.$skbn->file_sp_rtrw)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$skbn->file_ktp)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$skbn->file_kk)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skbn/surat_pernyataan/'.$skbn->file_surat_pernyataan)}}"
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
