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
                        <h4>Detail Surat Keterangan Ahli Waris</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                {{($skaw->no_surat)??'-'}}
                            </div>
                        </div>
                        <h5>Data Almarhum</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($skaw->nama_alm)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                {{($skaw->jk_alm)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Meninggal</label>
                            <div class="col-sm-9">
                                {{(\Carbon\Carbon::parse($skaw->tgl_kematian)->translatedFormat('d F Y'))??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                {!!($skaw->alamat)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skaw->kota->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skaw->kecamatan->nama))??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Desa</label>
                            <div class="col-sm-9">
                                {!!ucwords(strtolower($skaw->area->nama))??'-'!!}
                            </div>
                        </div>
                        <h5>Data Pasangan</h5><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skaw->pasangan as $pasangan)
                                <tr>
                                    <td>{{$pasangan->nama}}</td>
                                    <td>{{$pasangan->tempat_lahir}}</td>
                                    <td>{{\Carbon\Carbon::parse($pasangan->tgl_lahir)->translatedFormat('d M Y')}}</td>
                                    <td>{{$pasangan->jk}}</td>
                                    <td>{{$pasangan->pekerjaan->nama}}</td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                        <h5>Data Anak</h5><br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Kwarganegaraan</th>
                                    <th>ALamat</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skaw->anak as $anak)
                                <tr>
                                    <td>{{$anak->nama}}</td>
                                    <td>{{$anak->tempat_lahir}}</td>
                                    <td>{{\Carbon\Carbon::parse($anak->tgl_lahir)->translatedFormat('d M Y')}}</td>
                                    <td>{{ucfirst($anak->kewarganegaraan)}}</td>
                                    <td>{{$anak->alamat}}</td>
                                </tr>
                                @endforeach
                            <tbody>
                        </table>
                        <h5>Data Saksi 1</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!!($skaw->nama_saksi1)??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {!!($skaw->nik_saksi1)??'-'!!}
                            </div>
                        </div>
                        <h5>Data Saksi 2</h5><br>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {!!($skaw->nama_saksi2)??'-'!!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                {!!($skaw->nik_saksi2)??'-'!!}
                            </div>
                        </div>
                        <h5>Dokumen Pendukung</h5>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Permohonan</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skaw/surat_permohonan/'.$skaw->file_surat_permohonan)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Akta Lahir Ahli Waris</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <iframe src="{{asset('storage/backend/images/dokumen/skaw/akta_lahir/'.$skaw->file_akta_lahir)}}" frameborder="0" width="100%" height="250px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Silsilah</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skaw/silsilah/'.$skaw->file_silsilah)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Buku Nikah</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skaw/buku_nikah/'.$skaw->file_buku_nikah)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Keterangan Kematian</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skaw/sk_kematian/'.$skaw->file_sk_kematian)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File KTP Alm</label>
                            <div class="col-sm-9">
                                <iframe src="{{asset('storage/backend/images/dokumen/skaw/ktp/'.$skaw->file_ktp)}}" frameborder="0" width="100%" height="250px"></iframe>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/uploads/'.$skaw->file_kk)}}"
                                        data-title="Image 1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Surat Pernyataan</label>
                            <div class="col-sm-9">
                                <div class="gallery gallery-md">
                                    <div class="gallery-item"
                                        data-image="{{asset('storage/backend/images/dokumen/skaw/surat_pernyataan/'.$skaw->file_surat_pernyataan)}}"
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
