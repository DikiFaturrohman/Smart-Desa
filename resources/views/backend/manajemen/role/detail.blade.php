@extends('backend.layouts.app')

@section('title') Role @endsection

@section('top-resource')
@endsection

@section('bottom-resource')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Role</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Manajemen</div>
            <div class="breadcrumb-item"><a href="{{route('backend.manajemen.role')}}">Role</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{($role->name)??'-'}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                {!!($role->description)??'-'!!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <span class="badge badge-{{($role->status == '1')?'success':'danger'}}">
                                    {{($role->status == '1')?'Aktif':'Tidak Aktif'}}</span>
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
                                            <th>Read</th>
                                            <th>Create</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($role->permissions as $menu)
                                        <tr>
                                            <td>{{$menu->modul->name}}</td>
                                            <td>{{$menu->menu->name}}</td>
                                            <td>
                                                <span class="badge badge-{{($menu->read == '1')?'success':'danger'}}">
                                                    {{($menu->read == '1')?'Ya':'Tidak'}}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{($menu->create == '1')?'success':'danger'}}">
                                                    {{($menu->create == '1')?'Ya':'Tidak'}}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{($menu->update == '1')?'success':'danger'}}">
                                                    {{($menu->update == '1')?'Ya':'Tidak'}}</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{($menu->delete == '1')?'success':'danger'}}">
                                                    {{($menu->delete == '1')?'Ya':'Tidak'}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('backend.manajemen.role')}}" class="btn btn-secondary">Kembali</a>
                        @if(Session::get('permission')->update == 1)
                        <a href="{{route('backend.manajemen.role.edit',['id'=> $role->id])}}"
                            class="btn btn-primary">Edit</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
