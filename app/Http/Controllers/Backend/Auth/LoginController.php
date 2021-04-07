<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryBuilder;
use App\Models\Admin;
use App\Models\LoginLog;
use Auth;
use Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // $data['session'] = LoginLog::where('ip',$request->ip())->where('status',1)->where('try_login','>',3)->first();
        // dd($data['session']);
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        try{
            $rules = [
                'username' => 'required',
                'password' => 'required',
                'captcha' => 'required|captcha'
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'username' => 'format :attribute tidak benar',
                'captcha' => ':attribute tidak sama'
            ];

            $label = [
                'username' => 'Username atau Email',
                'password' => 'Password',
                'captcha' => 'Captcha'
            ];
            
            $this->validate($request,$rules,$messages,$label);

            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            
            $data = [
                $fieldType => $request->input('username'),
                'password' => $request->input('password'),
                'status' => 1
            ];
           
            if(Auth::guard('admin')->attempt($data)){
                if(Auth::guard('admin')->user()->desa_id == Session::get('desa_id') || Auth::guard('admin')->user()->desa_id ==''){
                    return redirect()->route('backend.dashboard');
                }else{
                    Auth::guard('admin')->logout();
                    Session::forget('permission');
                    toastr()->error('Akun anda tidak terdaftar di Desa ini','Gagal');
                    return redirect()->route('backend.auth.login');
                }
                // Session::forget('auth');
                // toastr()->success('Selamat Datang '.Auth::user()->name,'Login Berhasil');
                
            }else{
                $cek = Admin::where($fieldType,$request->input('username'))->first();
                if(!empty($cek) && $cek->status == '0'){
                    toastr()->error('Akun Anda tidak aktif, Silahkan hubungi operator desa atau Diskominfo Subang','Login Gagal');
                }else{
                    toastr()->error('Data Tidak Ditemukan ','Login Gagal');
                    
                }
                // $user = Admin::where($fieldType,$request->username)->first();
                // $session = LoginLog::where('email',$request->username)->where('ip',$request->ip())->where('status',1)->first();
                // if(empty($session))
                // {
                //     $session = LoginLog::create([
                //         'ip' => $request->ip(),
                //         'email' => $request->username,
                //         'try_login' => 1,
                //         'status' => 1
                //     ]);;

                //     toastr()->error('Anda Telah Gagal Login sebanyak '.$session->try_login.' kali','Login Gagal');
                //     return redirect()->back();
                    // if($sessionLogin > 3){
                    //     $user = Admin::where('email',$fieldType)->orWhere('username',$fieldType)->update(['status'=>0]);
                    //     toastr()->error('Akun Anda Dinonaktifkan Sementara','Pesan');
                    // }
                // }else{
                //     $session->update(['try_login' =>$session->try_login+1 ]);

                //     if($session->try_login > 3){
                //         $user->update(['status'=>'0']);
                //         // $session->update(['status'=>'0']);
                //         toastr()->error('Akun Anda Di nonaktifkan sementara ','Suspend');
                //         return redirect()->back();
                //     }else{
                //         toastr()->error('Anda Telah Gagal Login sebanyak '.$session->try_login.' kali','Login Gagal');
                //         return redirect()->back();
                //     }
                // }
                return redirect()->back();
            }

            
        }catch(QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return redirect()->route('backend.auth.login');
        }
    }

    public function logout(Request $request)
    {
        try{
            Auth::guard('admin')->logout();
            Session::forget('permission');
            return redirect()->route('backend.auth.login');
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
