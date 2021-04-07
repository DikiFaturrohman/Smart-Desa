@extends('backend.layouts.app')

@section('title') Perangkat Desa @endsection

@section('top-resource')
<link rel="stylesheet" href="{{asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet"
    href="{{asset('public/backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/selectric/public/selectric.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('public/backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
<script src="{{asset('public/backend/editor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('description');

</script>
@endsection

@section('bottom-resource')
<script src="{{asset('public/backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('public/backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/backend/node_modules/selectric/public/jquery.selectric.min.js')}}"></script>
<script src="{{asset('public/backend/js/page/forms-advanced-forms.js')}}"></script>
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
@if(Session::get('permission'))
@if(Session::get('permission')->update == 1)
<section class="section">
    <div class="section-header">
      <h1>Pemerintah Desa</h1>
      <div class="section-header-breadcrumb">
          <div class="breadcrumb-item">Pemerintah Desa</div>
          <div class="breadcrumb-item">Perangkat Desa</div>
          <div class="breadcrumb-item active">Edit</div>
      </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" id="mainform">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4>Form Edit Perangkat Desa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id" value="">
                                    <input type="text" class="form-control {{($errors->has('name'))?'is-invalid':''}}"
                                        name="name" value="{{old('name',$pegawai->name)}}">
                                    @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('nip'))?'is-invalid':''}}"
                                        name="nip" value="{{old('nip',$pegawai->nip)}}">
                                    @if($errors->has('nip'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nip')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('birth_place'))?'is-invalid':''}}"
                                        name="birth_place" value="{{old('birth_place',$pegawai->birth_place)}}">
                                    @if($errors->has('birth_place'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('birth_place')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                        class="form-control {{($errors->has('birth_date'))?'is-invalid':''}}"
                                        name="birth_date" value="{{old('birth_date',$pegawai->birth_date)}}">
                                    @if($errors->has('birth_date'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('birth_date')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('position'))?'is-invalid':''}}"
                                        name="position" value="{{old('position',$pegawai->position)}}">
                                    @if($errors->has('position'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('position')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Golongan</label>
                                <div class="col-sm-9">
                                    <select name="golongan" class="form-control select2">
                                        <option value="Non ASN" {{(old('golongan',$pegawai->golongan) == 'Non ASN')?'selected':''}}>Non ASN</option>
                                        <option value="IIa" {{(old('golongan',$pegawai->golongan) == 'IIa')?'selected':''}}>IIa</option>
                                        <option value="IIb" {{(old('golongan',$pegawai->golongan) == 'IIb')?'selected':''}}>IIb</option>
                                        <option value="IIc" {{(old('golongan',$pegawai->golongan) == 'IIc')?'selected':''}}>IIc</option>
                                        <option value="IId" {{(old('golongan',$pegawai->golongan) == 'IId')?'selected':''}}>IId</option>
                                        <option value="IIIa" {{(old('golongan',$pegawai->golongan) == 'IIIa')?'selected':''}}>IIIa</option>
                                        <option value="IIIb" {{(old('golongan',$pegawai->golongan) == 'IIIb')?'selected':''}}>IIIb</option>
                                        <option value="IIIc" {{(old('golongan',$pegawai->golongan) == 'IIIc')?'selected':''}}>IIIc</option>
                                        <option value="IIId" {{(old('golongan',$pegawai->golongan) == 'IIId')?'selected':''}}>IIId</option>
                                        <option value="IVa" {{(old('golongan',$pegawai->golongan) == 'IVa')?'selected':''}}>IVa</option>
                                        <option value="IVb" {{(old('golongan',$pegawai->golongan) == 'IVb')?'selected':''}}>IVb</option>
                                        <option value="IVc" {{(old('golongan',$pegawai->golongan) == 'IVc')?'selected':''}}>IVc</option>
                                        <option value="IVd" {{(old('golongan',$pegawai->golongan) == 'IVd')?'selected':''}}>IVd</option>
                                    </select>
                                    @if($errors->has('golongan'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('golongan')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telepon</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('phone'))?'is-invalid':''}}"
                                        name="phone" value="{{old('phone',$pegawai->phone)}}">
                                    @if($errors->has('phone'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('phone')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('address'))?'is-invalid':''}}"
                                        id="address" name="address">{{old('address',$pegawai->address)}}</textarea>
                                    @if($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('address')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <?php $img = asset('public/backend/images'); ?>
                                    <img src="<?php echo (!empty($pegawai->img) ? $img . '/pegawai/' . $pegawai->img : $img . '/default.jpg') ?>"
                                        id="preview-img" style="width: 200px">
                                    <input type="file" class="form-control {{($errors->has('img'))?'is-invalid':''}}"
                                        id="img" name="img" value="{{$pegawai->img}}"
                                        accept="image/jpg,image/jpeg,image/png">
                                    @if($errors->has('img'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('img')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control select2">
                                        <option value="show" {{(old('status',$pegawai->status) == 'show')?'selected':''}}>Aktif
                                        </option>
                                        <option value="hide" {{(old('status',$pegawai->status) == 'hide')?'selected':''}}>Tidak
                                            Aktif
                                        </option>
                                    </select>
                                    @if($errors->has('status'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('status')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('backend.pemdes.perdes')}}" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<script>
    window.location.href = "{{route('backend.pemdes.perdes')}}"

</script>
@endif
@else
<script>
    window.location.href = "{{route('backend.dashboard')}}"
</script>
@endif
@endsection
