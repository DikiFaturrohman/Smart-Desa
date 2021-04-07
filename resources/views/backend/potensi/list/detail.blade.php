@extends('backend.layouts.app')

@section('title') Potensi @endsection

@section('top-resource')
@endsection

@section('bottom-resource')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Potensi</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Potensi</div>
          <div class="breadcrumb-item">List</div>
          <div class="breadcrumb-item active">Detail</div>
      </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                {{($potensi->kategori->name)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Potensi</label>
                            <div class="col-sm-9">
                                {{($potensi->name)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi Singkat</label>
                            <div class="col-sm-9">
                                {!!($potensi->short_description)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                {!!($potensi->description)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <img src="{{($potensi->img)?asset('public/backend/images/potensi/'.$potensi->img):asset('public/backend/images/default.jpg')}}" alt="" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dibuat</label>
                            <div class="col-sm-9">
                                {!!($potensi->created_by)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Disunting</label>
                            <div class="col-sm-9">
                                {!!($potensi->updated_by)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <span class="badge badge-{{($potensi->status == 'show')?'success':'danger'}}">
                                    {{($potensi->status == 'show')?'Aktif':'Tidak Aktif'}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('backend.potensi.list')}}" class="btn btn-secondary">Kembali</a>
                        @if(Session::get('permission')->update == 1)
                        <a href="{{route('backend.potensi.list.edit',['id'=> $potensi->encodeHash($potensi->id)])}}"
                            class="btn btn-primary">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
