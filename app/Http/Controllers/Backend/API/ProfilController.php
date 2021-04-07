<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\User;
use App\Models\Admin;
use Str;
use Validator;
use Auth;
use DB;
use Hash;

class ProfilController extends Controller
{
    
    public function index(Request $request)
    {
        $response = [
            'status' => false,
            'message' => 'Gagal Memuat data profil'
        ];

        $admin = Admin::where('api_token',$request->user()->api_token)->first();
        if(empty($admin)){
            return response()->json($response);
        }else{
            $data = [
                'username' => $admin->username,
                'nama' => $admin->name,
                'no_telpon' => $admin->phone_number,
                'desa' => $admin->desa->nama,
                'alamat' => $admin->address,
            ];
            $response = [
                'status' => true,
                'data' => $data
            ];
            return response()->json($response);
        }
        
    }

    public function update(Request $request)
    {
        $admin = Admin::where('api_token',$request->user()->api_token)->first();

        $rules = [
            'nama' => 'required|max:150',
            'no_telp' => 'required|min:10|max:13|unique:ds_admins,phone_number,'.$admin->id,
            'alamat' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max digit',
            'min' => ':attribute maksimal :min digit',
            'unique' => ':attribute sudah digunakan',
        ];

        $label = [
            'nama' => 'Nama Lengkap',
            'no_telp' => 'No. Telpon',
            'alamat' => 'Alamat',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        
        if ($validator->fails()) {    
            return response()->json([
                'status' => false,
                'message' => 'Gagal merubah profil, pastikan data yang diberikan benar',
            ]);
        }

        
        if(empty($admin)){
            return response()->json([
                'status' => false,
                'message' => 'Gagal memuat data profil',
            ]);
        }else{
            $data = [
                'name' => $request->nama,
                'phone_number' => $request->no_telp,
                'address' => $request->alamat,
            ];
            $admin->update($data);
            $response = [
                'status' => true,
                'message' => 'Berhasil menyimpan data diri'
            ];
            return response()->json($response);
        }
        
    }

    public function updatePassword(Request $request)
    {
        $admin = Admin::where('api_token',$request->user()->api_token)->first();

        $rules = [
            'old_password' => 'required|max:150',
            'new_password' => 'required|min:6',
            'confirmation_password' => 'required|same:new_password|min:6',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'max' => ':attribute maksimal :max digit',
            'min' => ':attribute maksimal :min digit',
            'unique' => ':attribute sudah digunakan',
            'same' => ':attribute tidak sama dengan password',
        ];

        $label = [
            'old_password' => 'Kata Sandi Lama',
            'new_password' => 'Kata Sandi Baru',
            'confirmation_password' => 'Konfirmasi Kata Sandi Baru'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {    
            return response()->json([
                'status' => false,
                'message' => 'Gagal merubah password, pastikan data yang diberikan benar',
            ]);
        }

        if(!Hash::check($request->old_password,$admin->password)){
            return response()->json([
                'status' => false,
                'message' => 'Kata sandi lama tidak sama',
            ]);
        }else{
            $data = [
                'password' => bcrypt($request->new_password),
            ];
            $admin->update($data);
            $response = [
                'status' => true,
                'message' => 'Berhasil menyimpan data diri'
            ];
            return response()->json($response);
        }

        // return response()->json($admin)
           
    }
}
