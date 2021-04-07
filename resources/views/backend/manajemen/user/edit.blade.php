@extends('backend.layouts.app')

@section('title') User @endsection

@section('top-resource')
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet"
    href="{{asset('backend/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/selectric/public/selectric.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>
@endsection

@section('bottom-resource')
<script src="{{asset('backend/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
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
@if(Session::get('permission'))
@if(Session::get('permission')->update == 1)
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="{{route('backend.manajemen.user')}}">User</a>
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
                            <h4>Form Input User</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('nik'))?'is-invalid':''}}"
                                        name="nik" value="{{old('nik',$user->nik)}}">
                                    @if($errors->has('nik'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nik')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('nama_lengkap'))?'is-invalid':''}}"
                                        name="nama_lengkap" value="{{old('nama_lengkap',$user->nama_lengkap)}}">
                                    @if($errors->has('nama_lengkap'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('nama_lengkap')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control datepicker {{($errors->has('tgl_lahir'))?'is-invalid':''}}"
                                        name="tgl_lahir" value="{{old('tgl_lahir',$user->tgl_lahir)}}">
                                    @if($errors->has('tgl_lahir'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('tgl_lahir')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" id=""
                                        class="form-control {{($errors->has('jenis_kelamin'))?'is-invalid':''}}">
                                        <option value="">--Pilih--</option>
                                        <option value="laki-laki" {{(old('jenis_kelamin',$user->jenis_kelamin)=='laki-laki')?'selected':''}}>
                                            Laki-laki</option>
                                        <option value="perempuan" {{(old('jenis_kelamin',$user->jenis_kelamin)=='perempuan')?'selected':''}}>
                                            Perempuan</option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('jenis_kelamin')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('email'))?'is-invalid':''}}"
                                        name="email" value="{{old('email',$user->email)}}">
                                    @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telpon</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control {{($errors->has('no_telpon'))?'is-invalid':''}}"
                                        name="no_telpon" value="{{old('no_telpon',$user->no_telpon)}}">
                                    @if($errors->has('no_telpon'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_telpon')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea type="text"
                                        class="form-control summernote {{($errors->has('alamat'))?'is-invalid':''}}"
                                        id="description" name="alamat">{{old('alamat',$user->alamat)}}</textarea>
                                    @if($errors->has('alamat'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('alamat')}}
                                    </div>
                                    @endif
                                </div>
                            </div><br>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('backend.manajemen.user')}}" class="btn btn-secondary">Batal</a>
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
    window.location.href = "{{route('backend.manajemen.user')}}"

</script>
@endif
@else
<script>
    window.location.href = "{{route('backend.dashboard')}}"

</script>
@endif
@endsection
