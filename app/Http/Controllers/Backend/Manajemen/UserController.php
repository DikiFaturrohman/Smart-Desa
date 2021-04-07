<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Str;
use Auth;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:user');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['user'] = User::get();
            }else{
                $data['user'] = User::where('desa_id',Session::get('desa_id'))->get();
            }
            
            return view('backend.manajemen.user.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.manajemen.user.create');
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
            $data['id'] = $this->generateAutoNumber('ds_users');
            $data['password'] = bcrypt($request->input('nik'));
            $data['api_token'] = Str::random(50);
            $user = User::create($data);

            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.manajemen.user.detail',['id'=>$user->encodeHash($user->id)]);
        }catch(\QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['user'] = User::find($id);
            return view('backend.manajemen.user.edit',$data);
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
            $user = User::find($id);
            $user->update($data);

            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.manajemen.user.detail',['id'=>$user->encodeHash($user->id)]);
        }catch(\QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['user'] = User::find($id);
            return view('backend.manajemen.user.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $user = User::find($id);
            $user->update(['is_verified' => 1]);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.manajemen.user');
        }catch(\QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $user = User::find($id);
            $user->update(['is_verified' => 0]);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.manajemen.user');
        }catch(\QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        $rules = [
            'nik' => 'required|unique:ds_users,nik,'.$request->id,
            'email' => 'required|unique:ds_users,email,'.$request->id,
            'no_telpon' => 'required|unique:ds_users,no_telpon,'.$request->id,
            'nama_lengkap' => 'required|max:150',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'mimes' => 'Format :attribute tidak sesuai',
            'max' => ':attribute maksimal :max kb',
            'unique' => ':attribute sudah digunakan'
        ];

        $label = [
            'nik' => 'NIK',
            'email' => 'Email',
            'no_telpon' => 'No Telpon',
            'nama_lengkap' => 'Nama Lengkap',
            'tgl_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        $data = [
            'desa_id' => Session::get('desa_id'),
            'nik' => $request->input('nik'),
            'email' => $request->input('email'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'no_telpon' => $request->input('no_telpon'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'is_verified' => 1,
        ];

        return $data;
    }
}
