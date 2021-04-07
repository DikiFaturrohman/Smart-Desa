<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $invalid = [
            'status' => false,
            'message' => 'Gagal melakukan login, pastikan data yang diberikan benar',
        ];

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
    
            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                 return response()->json($invalid);
            }

            $data = [
                'nik' => $request->nik,
                'password' => $request->password,
                'is_verified' => 1
            ];

            if(Auth::guard('masyarakat')->attempt($data)){
                $dataLogin['token'] = Auth::guard('masyarakat')->user()->api_token;
                return response()->json([
                    'status' => true,
                    'data' => $dataLogin
                ]);
            }else{
                return response()->json($invalid);
            }
            
        }catch(\QueryBuilder $e){
            return response()->json($invalid);
        }
    }

    public function beranda(Request $request)
    {
        $user = User::where('api_token',$request->api_token)->first();
        return response()->json($user);
    }

    public function loginAdmin(Request $request)
    {
        $invalid = [
            'status' => false,
            'message' => 'Gagal melakukan login, pastikan data yang diberikan benar',
        ];

        try{
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];
    
            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max digit',
                'min' => ':attribute maksimal :min digit',
            ];
    
            $label = [
                'username' => 'Username',
                'password' => 'Password',
            ];
    
            $validator = Validator::make($request->all(),$rules,$messages);

            if ($validator->fails()) {    
                 return response()->json($invalid);
            }

            $data = [
                'username' => $request->username,
                'password' => $request->password,
                'status' => 1
            ];
            if(Auth::guard('admin')->attempt($data)){
                $dataLogin['token'] = Auth::guard('admin')->user()->api_token;
                return response()->json([
                    'status' => true,
                    'data' => $dataLogin
                ]);
            }else{
                return response()->json($invalid);
            }
            
        }catch(\QueryBuilder $e){
            return response()->json($invalid);
        }
    }
}
