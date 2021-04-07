<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryBuilder;
use Illuminate\Http\Request;
use App\Models\Modul;

class ModulController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:modul');
    }

    public function index()
    {
        try{
            $data['modul'] = Modul::all();
            return view('backend.manajemen.modul.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.manajemen.modul.create');
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
            $data['id'] = $this->generateAutoNumber('ds_modules');
            $modul = Modul::create($data);

            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.manajemen.modul.detail',['id'=>$modul->encodeHash($modul->id)]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['modul'] = Modul::find($id);
            return view('backend.manajemen.modul.edit',$data);
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
            $modul = Modul::find($id);
            $modul->update($data);

            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.manajemen.modul.detail',['id'=>$modul->encodeHash($modul->id)]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['modul'] = Modul::find($id);
            return view('backend.manajemen.modul.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $modul = Modul::find($id);
            $modul->update(['status' => 1]);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.manajemen.modul');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $modul = Modul::find($id);
            $modul->update(['status' => 0]);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.manajemen.modul');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        $rules = [
            'name' => 'required|unique:ds_modules,name,'.$request->id,
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'mimes' => 'Format :attribute tidak sesuai',
            'max' => ':attribute maksimal :max kb',
            'unique' => ':attribute sudah digunakan'
        ];

        $label = [
            'name' => 'Nama',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        $data = [
            'name' => $request->input('name'),
            'icon' => $request->input('icon'),
            'description' => $request->input('description'),
        ];

        return $data;
    }
}
