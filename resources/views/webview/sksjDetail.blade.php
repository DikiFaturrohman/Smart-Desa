@extends('frontend.layout.wv-admin')

@section('title') Surat Keterangan Sapu Jagat @endsection

@section('meta')



@endsection


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Surat Keterangan Sapu Jagat</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($sksj->no_surat)??'-'}}
                            </div>
                        </div>
                        <h5>Data Pejabat</h5>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($sksj->nama_pejabat)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                {{($sksj->jabatan)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {{($sksj->alamat)??'-'}}
                            </div>
                        </div>
                        <h5>Data Pengaju</h5>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!!($sksj->nama_penduduk)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No KTP.SIM</label>
                            <div class="col-sm-9">
                                {!!($sksj->no_nik)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Umur</label>
                            <div class="col-sm-9">
                                {!!($sksj->umur)??'-'!!} Tahun
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                {!!($sksj->pekerjaan->nama)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Menetap</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($sksj->tgl_menetap)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Untuk Keperluan</label>
                            <div class="col-sm-9">
                                {!!($sksj->keperluan)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat Kantor</label>
                            <div class="col-sm-9">
                                {!!($sksj->alamat_kantor)??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pengantar RTRW</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/sksj/rtrw/'.$sksj->file_sp_rtrw)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$sksj->file_ktp)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/sksj/surat_pernyataan/'.$sksj->file_surat_pernyataan)}}"
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
