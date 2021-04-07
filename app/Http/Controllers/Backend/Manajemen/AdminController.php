<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\AdminRole;
use App\Models\Desa;
use Str;
use Auth;
use DB;
use Session;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:admin');
    }

    public function index(Request $request)
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['admin'] = Admin::where('id','!=',Auth::guard('admin')->user()->id)->get();
            }else{
                $data['admin'] = Admin::where('id','!=',Auth::guard('admin')->user()->id)->where('desa_id',Auth::user()->desa_id)->get();
            }
            return view('backend.manajemen.admin.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            
            if(Auth::user()->roles()->first()->id == 'operator'){
                $role = ['su','operator'];
            }else{
                $role = ['su'];
            }
            $data['roles'] = Role::where('status',1)->whereNotIn('id',$role)->get();
            $data['desa'] = Desa::where('kota_id',20190101173)->get();
            return view('backend.manajemen.admin.create',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function createProccess(Request $request)
    {
        try{
            $this->validasiForm($request);
            $data = $this->bindData($request);
            if($request->role == 'kepala_desa'){
                $role='04';
            }elseif($request->role == 'sekretaris_desa'){
                $role='03';
            }elseif($request->role == 'kasi'){
                $role='02';
            }else{
                $role='01';
            }

            if(empty(Auth::user()->desa_id)){
                $adminId = $request->input('desa_id');
            }else{
                $adminId = Session::get('desa_id');
            }
            $data['id'] = $this->generateAutoNumberAdmin($role,$adminId);
            $data['password'] = bcrypt($request->password);
            $data['api_token'] = Str::random(50);
            $data['desa_id'] = empty(Auth::user()->desa_id)?$request->input('desa_id'):Auth::user()->desa_id;
            $admin = Admin::create($data);
            $admin->roles()->attach($request->role);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.manajemen.admin.detail',['id'=>$admin->encodeHash($admin->id)]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            if(Auth::user()->roles()->first()->id == 'operator'){
                $role = ['su','operator'];
            }else{
                $role = ['su'];
            }
            $data['roles'] = Role::where('status',1)->whereNotIn('id',$role)->get();
            $data['desa'] = Desa::where('kota_id',20190101173)->get();
            $data['admin'] = Admin::find($id);
            return view('backend.manajemen.admin.edit',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function editProccess(Request $request,$id)
    {
        try{
            $id = $this->decodeHash($id);
            $request['id'] = $id;
            $this->validasiForm($request);
            $data = $this->bindData($request);
            if($request->password){
                $data['password'] = bcrypt($request->password);
            }
            $admin = Admin::find($id);
            $admin->update($data);
            $admin->roles()->detach($admin->roles()->first()->id);
            $admin->roles()->attach($request->role);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.manajemen.admin.detail',['id'=>$admin->encodeHash($admin->id)]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['admin'] = Admin::find($id);
            return view('backend.manajemen.admin.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $admin = Admin::find($id);
            $admin->update(['status' => 1]);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.manajemen.admin');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $admin = Admin::find($id);
            $admin->update(['status' => 0]);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.manajemen.admin');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        if(!empty($request->id)){
            $admin = Admin::find($request->id);
            if($admin->noImg()){
                $rules = ['img' => 'mimes:png,jpg,jpeg|max:2048'];
            }
        }

        if(!empty($request->id)){
            if($request->password){
                $rules = [
                    'name' => 'required',
                    'nik' => 'required|max:16|min:16|unique:ds_admins,nik,'.$request->id,
                    'email' => 'required|unique:ds_admins,email,'.$request->id,
                    'username' => 'required|alpha_dash|unique:ds_admins,username,'.$request->id,
                    'role' => 'required',
                    'password' => 'required|min:6',
                    'confirmation_password' => 'required|same:password|min:6',
                    // 'desa_id' => 'required'
                ];
            }else{
                $rules = [
                    'name' => 'required',
                    'email' => 'required|unique:ds_admins,email,'.$request->id,
                    'username' => 'required|alpha_dash|unique:ds_admins,username,'.$request->id,
                    'role' => 'required',
                    // 'desa_id' => 'required'
                ];
            }
        }else{
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:ds_admins,email,'.$request->id,
                'username' => 'required|alpha_dash|unique:ds_admins,username,'.$request->id,
                'role' => 'required',
                'password' => 'required|min:6',
                'confirmation_password' => 'required|same:password|min:6',
                'nik' => 'required|max:16|min:16|unique:ds_admins,nik,'.$request->id,
            ];
        }

        $messages = [
            'alpha_dash' => ':attribute tidak boleh mengandung spasi dan simbol',
            'required' => ':attribute tidak boleh kosong',
            'mimes' => 'Format :attribute tidak sesuai',
            'max' => ':attribute maksimal :max kb',
            'unique' => ':attribute sudah digunakan',
            'same' => ':attribute tidak sama dengan password'
        ];

        $label = [
            'desa_id' => 'Desa',
            'name' => 'Nama',
            'username' => 'Username',
            'email' => 'Email',
            'role' => 'Role',
            'password' => 'Password',
            'confirmation_password' => 'Konfirmasi Password',
            'nik' => 'NIK',
            
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $admin = Admin::find($request->id);
        }

        if($request->file('img')){
            if(!empty($request->id)){
                $admin = Admin::find($request->id);
                if(\File::exists('backend/images/manajemen/admin/'.$admin->img)){
                    \File::delete('backend/images/manajemen/admin/'.$admin->img);
                }
            }
            $image = $request->file('img');
            $destinationPath = public_path('backend/images/manajemen/admin');
            $name = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$name);
        }else{
            if($request->id){
                $name=$admin->img;
            }else{
                $name = null;
            }
        }
        
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'status' => $request->input('status'),
            'img' => $name,
            'nik' => $request->input('nik'),
        ];

        return $data;
    }
}
