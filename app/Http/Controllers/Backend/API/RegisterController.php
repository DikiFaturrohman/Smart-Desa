<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\NotifOtp;
use App\Mail\NotifPassword;
use Str;
use Hash;
use Validator;
use Mail;

class RegisterController extends Controller
{
    public function registerProccess(Request $request)
    {
        \DB::beginTransaction();
        try{
            $otp = mt_rand(1000,9999);
            $cek = User::where('nik',$request->nik)->first();
            if(!empty($cek)){
                if($cek->is_verified == 1){
                    return response()->json([
                        'status' => false,
                        'message' => 'NIK telah terdaftar dan terverifikasi',
                    ]);
                }else{
                    $update = $cek->update(['otp' =>$otp]);
                    $message ='kode verifikasi anda : '.$cek->otp.'. Jangan memberi tahu kepada siapapun kode rahasia ini';
                    $phone = $cek->no_telpon;

                    $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    $response = curl_exec ($ch);
                    $err = curl_error($ch);
                    curl_close ($ch);

                    $sendMail = Mail::to($cek->email)->send(new NotifOtp($cek,$otp));

                    return response()->json([
                        'status' => true,
                        'message' => 'OTP berhasil dikirm, cek kembali pesan masuk anda',
                        'user' => $cek->id
                    ]);
                }
            }

            $rules = [
                'nama_lengkap' => 'required|max:150',
                'nik' => 'required|min:16|max:16|unique:ds_users,nik',
                'password' => 'required|min:6',
                'confirmation_password' => 'required|same:password|min:6',
                'no_telpon' => 'required|min:10|max:13|unique:ds_users,no_telpon',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'email' => 'required|unique:ds_users,email',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit',
                'unique' => ':attribute sudah digunakan',
                'same' => ':attribute tidak sama dengan password',
            ];
    
            $label = [
                'nama_lengkap' => 'Nama Lengkap',
                'nik' => 'NIK',
                'password' => 'Password',
                'confirmation_password' => 'Konfirmasi Password',
                'no_telpon' => 'No. Telpon',
                'tgl_lahir' => 'Tanggal Lahir',
                'alamat' => 'Alamat',
                'email' => 'Email',
            ];
    
            $validator = Validator::make($request->all(),$rules,$messages);
            
            if ($validator->fails()) {    
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal membuat user baru, pastikan data yang diberikan benar',
                    'user' => ''
                ]);
            }

            $data = [
                'id' => $this->generateAutoNumber('ds_users'),
                'desa_id' => $request->desa_id,
                'nama_lengkap' => $request->nama_lengkap,
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

            $message ='kode verifikasi anda : '.$createUser->otp.'. Jangan memberi tahu kepada siapapun kode rahasia ini';
            $phone = $createUser->no_telpon;

            $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec ($ch);
            $err = curl_error($ch);
            curl_close ($ch);
            $sendMail = Mail::to($createUser->email)->send(new NotifOtp($createUser,$otp));
            \DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'berhasil membuat user id',
                'user' => $createUser->id
            ]);
            
        }catch(\QueryBuilder $e){
            \DB::rollback();

            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }

    public function verifikasi(Request $request)
    {
        try{
            $user = User::find($request->id);
            
            if(!empty($user)){
                if($user->otp == $request->otp){
                    $user->update(['is_verified'=> 1,'otp' => null]);
                    return response()->json([
                        'status' => true,
                        'message' => 'Verifikasi Berhasil'

                    ]);
    
                }else{
                     return response()->json([
                        'status' => false,
                        'message' => 'kode otp tidak sesuai, silahkan untuk memasukkan data yang benar'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'kode otp tidak sesuai, silahkan untuk memasukkan data yang benar'
                ]);
            }
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }

    public function updateProfil(Request $request)
    {
        try{
            $user = User::where('api_token',$request->token)->first();
            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Data user tidak ditemukan',
                ]);
            }
            $rules = [
                'nama_lengkap' => 'required|max:150',
                'nik' => 'required|min:16|max:16|unique:ds_users,nik,'.$user->id,
                'tgl_lahir' => 'required',
                'alamat' => 'required',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit',
                'unique' => ':attribute sudah digunakan',
                'same' => ':attribute tidak sama dengan password',
            ];
    
            $label = [
                'nama_lengkap' => 'Nama Lengkap',
                'nik' => 'NIK',
                'tgl_lahir' => 'Tanggal Lahir',
                'alamat' => 'Alamat',
            ];
    
            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal merubah user, pastikan data yang diberikan benar'
                ]);
            }

            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
            ];

            $user->update($data);

            return response()->json([
                'status' => true,
                'message' => 'berhasil merubah data'
            ]);
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function updatePassword(Request $request)
    {
        try{
            $user = User::where('api_token',$request->token)->first();
            if(empty($user))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'Data user tidak ditemukan',
                ]);
            }

            $rules = [
                'old_password' => 'required',
                'new_password' => 'required|min:6|different:old_password',
                'confirmation_password' => 'required|same:new_password|min:6'
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'min' => ':attribute minimal :min karakter',
                'different' => ':attribute tidak boleh sama dengan yang Kata Sandi lama',
                'same' => ':attribute tidak sama dengan yang baru',
                'unique' => ':attribute sudah digunakan',
            ];

            $label = [
                'old_password' => 'Kata Sandi Lama',
                'new_password' => 'Kata Sandi Baru',
                'confirmation_password' => 'Konfirmasi Kata Sandi Baru',
            ];

            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal merubah password, pastikan data yang diberikan benar'
                ]);
            }

            if(!Hash::check($request->old_password,$user->password)){
                return response()->json([
                    'status' => false,
                    'message' => 'Kata Sandi Lama tidak sama'
                ]);
            }

            $data = [
                'password' => bcrypt($request->input('new_password')),
            ];

            $user->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Merubah Kata Sandi'
            ]);
        }catch(\QueryException $e){
            return response()->json([
                'status' => false,
                'message' => 'Gagal Merubah Kata Sandi'
            ]);
        }
    }

    public function resendOtp(Request $request)
    {
        try{
            $rules = [
                'user_id' => 'required',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
            ];
    
            $label = [
                'user_id' => 'User Id',
            ];
    
            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal mengirim ulang OTP,coba lagi nanti',
                ]);
            }
            
            $otp = mt_rand(1000,9999);

            $user = User::where('id',$request->user_id)->first();
            if(empty($user)){
                return response()->json([
                    'status' => false,
                    'message' => 'User tidak ditemukan',
                ]);
            }else{
                $updateOtp = $user->update(['otp' => $otp]);

                $message ='kode verifikasi anda : '.$user->otp.'.Jangan memberi tahu kepada siapapun kode rahasia ini';
                $phone = $user->no_telpon;
    
                $url = 'https://sms.subang.go.id/api/send?key=36184a108497bb5dfb192ee1db22105e&gateway=4&no='.urlencode($phone).'&pesan='.urlencode($message);
    
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
                $response = curl_exec ($ch);
                $err = curl_error($ch);
                curl_close ($ch);
    
                $sendMail = Mail::to($user->email)->send(new NotifOtp($user,$user->otp));

                return response()->json([
                    'status' => true,
                    'message' => 'OTP berhasil dikirm, cek kembali pesan masuk anda',
                ]);
            }

            
            
        }catch(\QueryBuilder $e){
            return response()->json([
                'status' => false,
                'data' => '',
                'pesan' => $e->getMessage()
            ]);
        }
    }

    public function forgotPassword(Request $request)
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
    
            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                return response()->json([
                    'status' => false,
                    'message' => 'Silahkan Masukan nomor hp anda yang terdaftar',
                ]);
            }

            $user = User::where('no_telpon',$request->no_hp)->first();
            if(empty($user)){
                return response()->json([
                    'status' => false,
                    'message' => 'No hp tidak ditemukan',
                ]);
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

            $sendMail = Mail::to($user->email)->send(new NotifPassword($user,$user->password));

            return response()->json([
                'status' => true,
                'message' => 'Kata sandi baru anda telah dikirim melalui sms dan email',
            ]);

        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
}
