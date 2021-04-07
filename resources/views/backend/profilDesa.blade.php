@extends('backend.layouts.app')

@section('title') Profil Desa @endsection

@section('top-resource')
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet"
    href="{{asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/selectric/public/selectric.css')}}">
<link rel="stylesheet"
    href="{{asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
<script src="{{asset('backend/editor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection

@section('bottom-resource')
<script src="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backend/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('backend/node_modules/selectric/public/jquery.selectric.min.js')}}"></script>
<script src="{{asset('backend/js/page/forms-advanced-forms.js')}}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
                // $('.uploading1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // CKEDITOR.replace('ckeditor');
    $("form#mainform input[type='file']").change(function () {
        readURL(this);
    });

</script>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profil Desa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Profil</div>
            <div class="breadcrumb-item"><a href="{{route('backend.profilDesa')}}">Profil Desa</a>
            </div>
            <div class="breadcrumb-item active">Tambah</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" id="mainform">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4>Form Tambah/Ubah Profil Desa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('nama'))?'is-invalid':''}}"
                                        name="nama" value="{{old('nama',($profil)?$profil->nama:'')}}">
                                    @if($errors->has('nama'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nama')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto {{(Session::get('kecamatan_id') == '2018110602402')?'Kelurahan':'Desa'}}</label>
                                <div class="col-sm-9">
                                    <img src="{{($profil)?asset('backend/images/profil/desa/'.$profil->foto_desa):asset('backend/images/default.jpg')}}" id="preview-foto_desa" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="foto_desa" name="foto_desa" value="{{old('foto_desa')}}"
                                        accept="image/jpg,image/jpeg,image/png">
                                    @if($errors->has('foto_desa'))
                                    <span class="text-danger">{{$errors->first('foto_desa')}}</span>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama {{(Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'}}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('kades'))?'is-invalid':''}}"
                                        name="kades" value="{{old('kades',($profil)?$profil->kades:'')}}">
                                    @if($errors->has('kades'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('kades')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto {{(Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'}}</label>
                                <div class="col-sm-9">
                                    <img src="{{($profil)?asset('backend/images/profil/kades/'.$profil->foto_kades):asset('backend/images/default.jpg')}}" id="preview-foto_kades" alt=""
                                        width="200px">
                                    <input type="file" class="form-control" id="foto_kades" name="foto_kades" value="{{old('foto_kades')}}"
                                        accept="image/jpg,image/jpeg,image/png">
                                    @if($errors->has('foto_kades'))
                                    <span class="text-danger">{{$errors->first('foto_kades')}}</span>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Sambutan {{(Session::get('kecamatan_id') == '2018110602402')?'Lurah':'Kepala Desa'}}</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('sambutan'))?'is-invalid':''}}"
                                        id="sambutan" name="sambutan">{{old('sambutan',($profil)?$profil->sambutan:'')}}</textarea>
                                    @if($errors->has('sambutan'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('sambutan')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Visi</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('visi'))?'is-invalid':''}}"
                                        id="visi" name="visi">{{old('visi',($profil)?$profil->visi:'')}}</textarea>
                                    @if($errors->has('visi'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('visi')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Misi</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('misi'))?'is-invalid':''}}"
                                        id="misi" name="misi">{{old('misi',($profil)?$profil->misi:'')}}</textarea>
                                    @if($errors->has('misi'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('misi')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Sejarah</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('sejarah'))?'is-invalid':''}}"
                                        id="sejarah" name="sejarah">{{old('sejarah',($profil)?$profil->sejarah:'')}}</textarea>
                                    @if($errors->has('sejarah'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('sejarah')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Gambaran Umum</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('gambaran_umum'))?'is-invalid':''}}"
                                        id="gambaran_umum" name="gambaran_umum">{{old('gambaran_umum',($profil)?$profil->gambaran_umum:'')}}</textarea>
                                    @if($errors->has('gambaran_umum'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('gambaran_umum')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Kondisi Geografis</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('kondisi_geografis'))?'is-invalid':''}}"
                                        id="kondisi_geografis" name="kondisi_geografis">{{old('kondisi_geografis',($profil)?$profil->kondisi_geografis:'')}}</textarea>
                                    @if($errors->has('kondisi_geografis'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('kondisi_geografis')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telpon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('no_telpon'))?'is-invalid':''}}"
                                        name="no_telpon" value="{{old('no_telpon',($profil)?$profil->no_telpon:'')}}">
                                    @if($errors->has('no_telpon'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_telpon')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('email'))?'is-invalid':''}}"
                                        name="email" value="{{old('email',($profil)?$profil->email:'')}}">
                                    @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Website</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('website'))?'is-invalid':''}}"
                                        name="website" value="{{old('website',($profil)?$profil->website:'')}}">
                                    @if($errors->has('website'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('website')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('alamat'))?'is-invalid':''}}"
                                        id="alamat" name="alamat">{{old('alamat',($profil)?$profil->alamat:'')}}</textarea>
                                    @if($errors->has('alamat'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('alamat')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('facebook'))?'is-invalid':''}}"
                                        name="facebook" value="{{old('facebook',($profil)?$profil->facebook:'')}}">
                                    @if($errors->has('facebook'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('facebook')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('instagram'))?'is-invalid':''}}"
                                        name="instagram" value="{{old('instagram',($profil)?$profil->instagram:'')}}">
                                    @if($errors->has('instagram'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('instagram')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">URL Twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('twitter'))?'is-invalid':''}}"
                                        name="twitter" value="{{old('twitter',($profil)?$profil->twitter:'')}}">
                                    @if($errors->has('twitter'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('twitter')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('latitude'))?'is-invalid':''}}"
                                        name="latitude" value="{{old('latitude',($profil)?$profil->latitude:'')}}">
                                    @if($errors->has('latitude'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('latitude')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('longitude'))?'is-invalid':''}}"
                                        name="longitude" value="{{old('longitude',($profil)?$profil->longitude:'')}}">
                                    @if($errors->has('longitude'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('longitude')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('backend.profilDesa')}}" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
