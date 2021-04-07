<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryBuilder;
use App\Models\Modul;
use App\Models\Menu;

class MenuController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:menu');
    }

    public function index()
    {
        try{
            $data['menu'] = Menu::all();
            return view('backend.manajemen.menu.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            $data['modul'] = Modul::where('status',1)->get();
            return view('backend.manajemen.menu.create',$data);
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
            $data['id'] = str_replace(' ','_',strtolower($request->name));
            $menu = Menu::create($data);

            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.manajemen.menu.detail',['id'=>$menu->id]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $data['menu'] = Menu::find($id);
            $data['modul'] = Modul::where('status',1)->get();
            return view('backend.manajemen.menu.edit',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function editProccess(Request $request,$id)
    {
        try{
            $request['id'] = $id;
            $this->validasiForm($request);
            $data = $this->bindData($request);
            $menu = Menu::find($id);
            $menu->update($data);

            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.manajemen.menu.detail',['id'=>$menu->id]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $data['menu'] = Menu::find($id);
            return view('backend.manajemen.menu.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            
            $menu = Menu::find($request->id);
            $menu->update(['status' => 1]);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.manajemen.menu');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            
            $menu = Menu::find($request->id);
            $menu->update(['status' => 0]);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.manajemen.menu');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        $rules = [
            'modul_id' => 'required',
            'name' => 'required|unique:ds_menus,name,'.$request->id,
            'route' => 'required|unique:ds_menus,route,'.$request->id,
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'mimes' => 'Format :attribute tidak sesuai',
            'max' => ':attribute maksimal :max kb',
            'unique' => ':attribute sudah digunakan'
        ];

        $label = [
            'modul_id' => 'Modul',
            'name' => 'Nama',
            'route' => 'Route'
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        $data = [
            'modul_id' => $request->input('modul_id'),
            'name' => $request->input('name'),
            'route' => $request->input('route'),
            'description' => $request->input('description'),
        ];

        return $data;
    }
}
