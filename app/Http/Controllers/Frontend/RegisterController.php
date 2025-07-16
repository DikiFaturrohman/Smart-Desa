<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\NotifOtp;
use App\Mail\NotifPassword;
use Str;
use Session;
use Mail;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('frontend.register');
    }

    public function register(Request $request)
    {
        try{
            $cekUser = User::where('nik',$request->nik)->where('is_verified','0')->first();
            if(empty($cekUser)){
                $rules = [
                    'nama' => 'required|max:150',
                    'nik' => 'required|min:16|max:16|unique:ds_users,nik',
                    'email' => 'required|unique:ds_users,email',
                    'password' => 'required|min:6',
                    'confirmation_password' => 'required|same:password|min:6',
                    'no_telpon' => 'required|min:10|max:13|unique:ds_users,no_telpon',
                    'tgl_lahir' => 'required',
                    'alamat' => 'required',
                ];
            }else{
                $rules = [
                    'nama' => 'required|max:150',
                    'nik' => 'required|min:16|max:16',
                    'email' => 'required|unique:ds_users,email',
                    'password' => 'required|min:6',
                    'confirmation_password' => 'required|same:password|min:6',
                    'no_telpon' => 'required|min:10|max:13|unique:ds_users,no_telpon,'.$cekUser->id,
                    'tgl_lahir' => 'required',
                    'alamat' => 'required',
                ];
            }
            
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit',
                'unique' => ':attribute sudah digunakan',
                'same' => ':attribute tidak sama dengan password',
            ];
    
            $label = [
                'nama' => 'Nama Lengkap',
                'nik' => 'NIK',
                'password' => 'Password',
                'confirmation_password' => 'Konfirmasi Password',
                'no_telpon' => 'No. Telpon',
                'tgl_lahir' => 'Tanggal Lahir',
                'alamat' => 'Alamat',
                'email' => 'Email',
            ];
    
            $this->validate($request,$rules,$messages,$label);

            $otp = mt_rand(1000,9999);

            if(empty($cekUser)){
                $data = [
                    'id' => $this->generateAutoNumber('ds_users'),
                    'desa_id' => Session::get('desa_id'),
                    'nama_lengkap' => $request->nama,
                    'nik' => $request->nik,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'no_telpon' => $request->no_telpon,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'otp' => $otp,
                    'api_token' => Str::random(50)
                ];
    
                $createUser = User::create($data);
            }else{
                $data = [
                    'desa_id' => Session::get('desa_id'),
                    'nama_lengkap' => $request->nama,
                    'nik' => $request->nik,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'no_telpon' => $request->no_telpon,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'otp' => $otp,
                    'api_token' => Str::random(50)
                ];
    
                $cekUser->update($data);
                $createUser = User::where('nik',$request->nik)->first();
            }
            

            $message ='kode verifikasi anda : '.$createUser->otp.' jangan memberi tahu kepada siapapun kode rahasia ini';
            $phone = $createUser->no_telpon;

//         Update ku saya
//             $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);

//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $url);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//             $response = curl_exec ($ch);
//             $err = curl_error($ch);
//             curl_close ($ch);

	        $createUser->update(['is_verified'=> 1,'otp' => null]);
            // $sendMail = Mail::to($createUser->email)->send(new NotifOtp($createUser,$otp));
			
        	toastr()->success('Akun Anda telah terverifikasi','Sukses');
            return redirect()->route('frontend.login');
        
          	// Session::put('otp',$createUser->id);
          	// toastr()->success('Akun telah berhasil dibuat', 'Sukses');
          	// return view('frontend.otp');

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function verifikasi(Request $request)
    {
        try{
            $user = User::find($request->id);
            
            if($user->otp == $request->otp){
                $user->update(['is_verified'=> 1,'otp' => null]);
                toastr()->success('Akun Anda telah terverifikasi','Sukses');
                return redirect()->route('frontend.login');
            }else{
                toastr()->error('Kode Verifikasi tidak ditemukan','Error');
                return view('frontend.otp');
            }
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function password()
    {
        return view('frontend.password');
    }

    public function passwordReset(Request $request)
    {
        try{
            $rules = [
                'no_hp' => 'required|max:13|min:10',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit'
            ];
    
            $label = [
                'no_hp' => 'No Hp',
            ];
    
            $this->validate($request,$rules,$messages,$label);

            $user = User::where('no_telpon',$request->no_hp)->first();
            if(empty($user)){
                toastr()->error('No Hp tidak ditemukan','Gagal');
                return back();
            }

            $password = Str::random(6);

            $message ='Password baru anda : '.$password.' jangan memberi tahu kepada siapapun kode rahasia ini';
            $phone = $user->no_telpon;

            $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);
            curl_close ($ch);

            $user->update(['password' => bcrypt($password)]);

            // $sendMail = Mail::to($user->email)->send(new NotifPassword($user,$password));
            
            toastr()->success('Kata sandi baru telah dikirim via sms dan email','Sukses');
            return redirect()->route('frontend.login');

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
