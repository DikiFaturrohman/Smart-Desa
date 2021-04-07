<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Desa;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.login');
    }

    public function login(Request $request)
    {
        try{
            $rules = [
                'nik' => 'required|min:16|max:16',
                'password' => 'required|min:6',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit',
            ];
    
            $label = [
                'nik' => 'NIK',
                'password' => 'Password',
            ];
    
            $this->validate($request,$rules,$messages,$label);

            $data = [
                'nik' => $request->nik,
                'password' => $request->password,
                'is_verified' => 1
            ];

            if(Auth::guard('masyarakat')->attempt($data)){
                if(Auth::guard('masyarakat')->user()->desa_id == Session::get('desa_id')){
                    toastr()->success('Login Berhasil','Sukses');
                    return redirect()->route('frontend.home');
                }else{
                    $desa = Desa::where('id',Session::get('desa_id'))->first();
                    Auth::guard('masyarakat')->logout();
                    toastr()->error('Akun anda tidak terdaftar di Desa '.ucwords(strtolower($desa->nama)),'Gagal');
                    return redirect()->route('frontend.login');
                }
                
            }else{
                toastr()->error('Data tidak ditemukan atau akun belum terverifikasi','Gagal');
                return redirect()->route('frontend.login');
            }
            
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'error');
            return redirect()->route('frontend.login');
        }
    }

    public function logout(){
        try{
            Auth::guard('masyarakat')->logout();
            toastr()->success('Berhasil Logout','Sukses');
            return redirect()->route('frontend.home');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'error');
            return redirect()->route('frontend.login');
        }
    }
}
