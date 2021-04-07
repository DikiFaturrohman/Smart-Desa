@extends('backend.layouts.app')

@section('title') Role @endsection

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
    $('.ubah').change(function () {
        var id = $(this).val()
        if (id != 0) {
            $('.crud-' + id).prop('disabled', false);
        } else {
            $('.crud-' + id).attr('disabled', true);
        }
    })

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
@if(Session::get('permission')->create == 1)
<section class="section">
    <div class="section-header">
        <h1>Role</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="{{route('backend.manajemen.role')}}">Role</a>
            </div>
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
                            <h4>Form Edit Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{($errors->has('name'))?'is-invalid':''}}"
                                        name="name" value="{{$role->name}}">
                                    @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Permission</label>
                                <div class="col-sm-9">
                                    <table class="table table-striped table-1">
                                        <thead>
                                            <tr>
                                                <th>Modul</th>
                                                <th>Menu</th>
                                                <th>Akses</th>
                                                <th>Read</th>
                                                <th>Create</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($menus as $menu)
                                            @foreach($role->permissions as $permission)
                                            @if($menu->id == $permission->menu_id)
                                            <tr>
                                                <td>{{$menu->modul->name}}</td>
                                                <td>{{$menu->name}}</td>

                                                <td>
                                                    <select name="akses[]" id="">
                                                        <option value="{{$menu->id}}"
                                                            {{($permission->menu_id == $menu->id)?'selected':''}}>Y
                                                        </option>
                                                        <option value="0"
                                                            {{($permission->menu_id != $menu->id)?'selected':''}}>N
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="read[]" id="">
                                                        <option value="{{$menu->id}}"
                                                            {{($permission->read == 1)?'selected':''}}>Y</option>
                                                        <option value="0" {{($permission->read == 0)?'selected':''}}>N
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="create[]" id="">
                                                        <option value="{{$menu->id}}"
                                                            {{($permission->create == 1)?'selected':''}}>Y</option>
                                                        <option value="0" {{($permission->create == 0)?'selected':''}}>N
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="update[]" id="">
                                                        <option value="{{$menu->id}}"
                                                            {{($permission->update == 1)?'selected':''}}>Y</option>
                                                        <option value="0" {{($permission->update == 0)?'selected':''}}>N
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="delete[]" id="">
                                                        <option value="{{$menu->id}}"
                                                            {{($permission->delete == 1)?'selected':''}}>Y</option>
                                                        <option value="0" {{($permission->delete == 0)?'selected':''}}>N
                                                        </option>
                                                    </select>
                                                </td>

                                            </tr>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            @if(count($noMenus) > 0)
                                            @foreach($noMenus as $menu)
                                            <tr>
                                                <td>{{$menu->modul->name}}</td>
                                                <td>{{$menu->name}}</td>

                                                <td>
                                                    <select name="akses[]" id="" class="ubah">
                                                        <option value="{{$menu->id}}">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="read[]" id=""  class="crud-{{$menu->id}}">
                                                        <option value="{{$menu->id}}">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="create[]" id="" class="crud-{{$menu->id}}" >
                                                        <option value="{{$menu->id}}">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="update[]" id="" class="crud-{{$menu->id}}" >
                                                        <option value="{{$menu->id}}">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="delete[]" id="" class="crud-{{$menu->id}}" >
                                                        <option value="{{$menu->id}}">Y</option>
                                                        <option value="0" selected>N</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('backend.manajemen.role')}}" class="btn btn-secondary">Batal</a>
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
    window.location.href = "{{route('backend.manajemen.role')}}"

</script>
@endif
@else
<script>
    window.location.href = "{{route('backend.dashboard')}}"

</script>
@endif
@endsection
