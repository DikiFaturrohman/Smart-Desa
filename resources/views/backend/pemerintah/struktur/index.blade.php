@extends('backend.layouts.app')

@section('title') Struktur Organisasi @endsection

@section('top-resource')
@endsection

@section('bottom-resource')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pemerintah Desa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Pemerintah Desa</div>
            <div class="breadcrumb-item">Struktur Organisasi</div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <form method="post" enctype="multipart/form-data" id="mainform">
                      {{csrf_field()}}
                      <div class="card-header">
                          <h4>Form Edit Struktur Organisasi</h4>
                      </div>
                      <div class="card-body">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Judul</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control {{($errors->has('title'))?'is-invalid':''}}"
                                      name="title" value="{{old('title',($data)?$data->title:'')}}">
                                  @if($errors->has('title'))
                                  <div class="invalid-feedback">
                                      {{$errors->first('title')}}
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Deskripsi</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control {{($errors->has('description'))?'is-invalid':''}}"
                                      name="description" value="{{old('description',($data)?$data->description:'')}}">
                                  @if($errors->has('description'))
                                  <div class="invalid-feedback">
                                      {{$errors->first('description')}}
                                  </div>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group mb-0 row">
                              <label class="col-sm-3 col-form-label">Gambar Struktur Organisasi</label>
                              <div class="col-sm-9">
                                  <img src="{{($data)?asset('public/backend/images/struktur-organisasi/'.$data->img):asset('public/backend/images/default.jpg')}}" id="preview-img" alt=""
                                      width="200px">
                                  <input type="file" class="form-control" id="img" name="img" value="{{old('img')}}"
                                      accept="image/jpg,image/jpeg,image/png">
                                  @if($errors->has('img'))
                                  <span class="text-danger">{{$errors->first('img')}}</span>
                                  @endif
                              </div>
                          </div><br>
                          <hr>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Updated by</label>
                              <div class="col-sm-9">
                                  {{($data->updated_by)??'-'}}
                              </div>
                          </div>
                          <div class="form-group mb-0 row">
                              <label class="col-sm-3 col-form-label">Gambar Struktur Organisasi</label>
                              <div class="col-sm-9">
                                  <img src="{{($data)?asset('public/backend/images/struktur-organisasi/'.$data->img):asset('public/backend/images/default.jpg')}}" id="preview-img" alt=""
                                      class="img-fluid">
                              </div>
                          </div><br>
                      </div>
                      <div class="card-footer text-right">
                          <button class="btn btn-primary">Simpan</button>
                      </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
