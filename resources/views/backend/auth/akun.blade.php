@extends('backend.layouts.app')

@section('title') Pengaturan Akun @endsection

@section('top-resource')

@endsection

@section('bottom-resource')
<link rel="stylesheet" href="{{asset('backend/node_modules/bootstrap-social/bootstrap-social.css')}}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Pengaturan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('backend.dashboard')}}">Dashboard</a></div>
            <div class="breadcrumb-item">Pengaturan</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="{{route('backend.account.update')}}" class="needs-validation"
                        novalidate="">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4>Pengaturan Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control {{($errors->has('email'))?'is-invalid':''}}"
                                        value="{{old('email',$profil->email)}}" name="email">
                                    @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Username</label>
                                    <input type="text" class="form-control {{($errors->has('username'))?'is-invalid':''}}"
                                        value="{{old('username',$profil->username)}}" name="username">
                                    @if($errors->has('username'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('username')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>Kata Sandi Lama</label>
                                    <input type="password"
                                        class="form-control {{($errors->has('old_password'))?'is-invalid':''}}"
                                        value="{{old('old_password')}}" name="old_password">
                                    @if($errors->has('old_password'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('old_password')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Kata Sandi Baru</label>
                                    <input type="password"
                                        class="form-control {{($errors->has('new_password'))?'is-invalid':''}}"
                                        value="{{old('new_password')}}" name="new_password">
                                    @if($errors->has('new_password'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('new_password')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Ulangi Kata Sandi Baru</label>
                                    <input type="password"
                                        class="form-control {{($errors->has('repeat_new_password'))?'is-invalid':''}}"
                                        value="{{old('repeat_new_password')}}" name="repeat_new_password">
                                    @if($errors->has('repeat_new_password'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('repeat_new_password')}}
                                    </div>
                                    @endif
                                </div>
                            </div>
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
