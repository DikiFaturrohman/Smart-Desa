<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Admin;
use Auth;
use Hash;
use Validator;

class ProfilController extends Controller
{
    public function index()
    {
        try{
            $data['profil'] = Admin::find(Auth::guard('admin')->user()->id);
            return view('backend.auth.profil',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function updateProfile(Request $request)
    {
        \DB::beginTransaction();
        try{
            $rules = [
                'name' => 'required|max:150',
                'phone_number' => 'required|max:13|unique:ds_admins,phone_number,'.Auth::guard('admin')->user()->id,
                'address' => 'required',
                'img' => 'max:1024|mimes:jpg,png,jpeg',
                
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'unique' => ':attribute sudah digunakan',
                'mimes' => ':attribute salah (format : jpg,jpeg,png)',
                'max' => ':attribute maksimal :max'
            ];

            $label = [
                'name' => 'Nama',
                'address' => 'Alamat',
                'phone_number' => 'No Telpon',
                'img' => 'Foto',
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('img')){
                if(\File::exists('backend/images/manajemen/admin/'.Auth::guard('admin')->user()->img)){
                    \File::delete('backend/images/manajemen/admin/'.Auth::guard('admin')->user()->img);
                }
                $foto = $request->file('img');
                $destinationPath = public_path('backend/images/manajemen/admin');
                $fotoName = Auth::guard('admin')->user()->username.'.'.$foto->getClientOriginalExtension();
            }else{
                $fotoName = Auth::guard('admin')->user()->img;
            }

            $data = [
                'name' => $request->input('name'),
                'phone_number' => $request->input('phone_number'),
                'address' => $request->input('address'),
                'img' => $fotoName
            ];

            $user = Admin::find(Auth::guard('admin')->user()->id);
            $user->update($data);
            \DB::commit();
            if($request->file('img')){
                $foto->move($destinationPath,$fotoName);
            }
            toastr()->success('Profil berhasil diubah','Sukses');
            return redirect()->route('backend.profil');
        }catch(QueryException $e){
            \DB::rollback();
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function showFormChangePassword()
    {
        try{
            $data['profil'] = Admin::find(Auth::guard('admin')->user()->id);
            return view('backend.auth.akun',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function updatePassword(Request $request)
    {
        try{
            $user = Admin::find(Auth::guard('admin')->user()->id);

            if(empty($request->old_password) && empty($request->new_password) && empty($request->repeat_new_password)){
                $password = $user->password;
                $rules = [
                    'email' => 'required|unique:ds_admins,email,'.$user->id,
                    'username' => 'required|alpha_dash|unique:ds_admins,username,'.$user->id,
                ];
            }else{
                $password = bcrypt($request->new_password);
                $rules = [
                    'email' => 'required|unique:ds_admins,email,'.$user->id,
                    'username' => 'required|alpha_dash|unique:ds_admins,username,'.$user->id,
                    'old_password' => 'required',
                    'new_password' => 'required|min:6|different:old_password',
                    'repeat_new_password' => 'required|same:new_password|min:6'
                ];
                if(!Hash::check($request->old_password,$user->password)){
                    toastr()->error('Kata Sandi lama tidak sama','Sukses');
                    return redirect()->back();
                }
            }
            
            $messages = [
                'alpha_dash' => ':attribute tidak boleh mengandung spasi dan simbol',
                'required' => ':attribute tidak boleh kosong',
                'min' => ':attribute minimal :min karakter',
                'different' => ':attribute tidak boleh sama dengan yang Kata Sandi lama',
                'same' => ':attribute tidak sama dengan yang baru',
                'unique' => ':attribute sudah digunakan',
            ];

            $label = [
                'email' => 'Email',
                'username' => 'Username',
                'old_password' => 'Kata Sandi Lama',
                'new_password' => 'Kata Sandi Baru',
                'repeat_new_password' => 'Konfirmasi Kata Sandi Baru',
            ];

            $validator = $this->validate($request, $rules, $messages, $label);

           

            $data = [
                'password' => $password,
                'email' =>$request->input('email'),
                'username' =>$request->input('username')
            ];

            $user->update($data);
            Auth::logout();
            toastr()->success('Akun berhasil diubah','Sukses');
            return redirect()->route('backend.auth.login');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
