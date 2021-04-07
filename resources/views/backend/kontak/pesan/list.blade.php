@extends('backend.layouts.app')

@section('title') Buku Tamu @endsection

@section('top-resource')
<link rel="stylesheet" href="{{asset('public/backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/chocolat/dist/css/chocolat.css')}}">
@endsection

@section('bottom-resource')
<script src="{{asset('public/backend/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend/js/page/modules-datatables.js')}}"></script>
<script src="{{asset('public/backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/jquery-ui-dist/jquery-ui.min.js')}}"></script>
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Buku Tamu</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Buku Tamu</div>
            <div class="breadcrumb-item active">List</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pesan Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengirim</th>
                                        <th>Subjek</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($pesan as $row)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->subjek}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>
                                            <a href="{{route('backend.kontak.pesan.detail',['id' => $row->encodeHash($row->id)])}}"
                                                class="btn btn-md btn-secondary btn-icon" title="Detail"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
