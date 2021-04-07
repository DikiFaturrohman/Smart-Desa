<?php

namespace App\Http\Controllers\Backend\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryBuilder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Menu;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:role');
    }

    public function index()
    {
        try{
            $data['role'] = Role::all();
            return view('backend.manajemen.role.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    public function create()
    {
        try{
            $data['menus'] = Menu::where('status',1)->get();
            return view('backend.manajemen.role.create',$data);
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
            $role = Role::create($data);
            $permission = $this->insertPermission($role->id,$request);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.manajemen.role.detail',['id'=>$role->id]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $data['role'] = Role::find($id);
            $permission = Permission::where('role_id',$data['role']->id)->get('menu_id');
            $data['menus'] = Menu::where('status',1)->get();
            $data['noMenus'] = Menu::whereNotIn('id',$permission)->get();
            return view('backend.manajemen.role.edit',$data);
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
            $role = Role::find($id);
            $role->update($data);
            $permission = $this->insertPermission($role->id,$request);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.manajemen.role.detail',['id'=>$role->id]);
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $data['role'] = Role::find($id);
            return view('backend.manajemen.role.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $role = Role::find($id);
            $role->update(['status' => 1]);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.manajemen.role');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $role = Role::find($id);
            $role->update(['status' => 0]);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.manajemen.role');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        $rules = [
            'name' => 'required|unique:ds_roles,name,'.$request->id,
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
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
            'description' => $request->input('description'),
        ];

        return $data;
    }

    private function insertPermission($role_id,$request)
    {
        try{
            if($request->id){
                Permission::where('role_id',$request->id)->delete();
            }
            $akses = $request->akses;
            $read = $request->read;
            $create = $request->create;
            $update = $request->update;
            $delete = $request->delete;

            for($i=0;$i<count($akses);$i++){
                $modulId = Menu::where('id',$akses[$i])->first();
                if($akses[$i] !='0'){
                    if($read[$i] !='0'){
                        if($akses[$i] == $read[$i]){
                            $r = '1';
                        }else{
                            $r = '0';
                        }
                    }else{
                        $r = '0';
                    }
                    if($create[$i] !='0'){
                        if($akses[$i] == $create[$i]){
                            $c = '1';
                        }else{
                            $c = '0';
                        }
                    }else{
                        $c = '0';
                    }
                    if($update[$i] !='0'){
                        if($akses[$i] == $update[$i]){
                            $u = '1';
                        }else{
                            $u = '0';
                        }
                    }else{
                        $u = '0';
                    }
                    if($delete[$i] !='0'){
                        if($akses[$i] == $delete[$i]){
                            $d = '1';
                        }else{
                            $d = '0';
                        }
                    }else{
                        $d = '0';
                    }
                    $permission = Permission::create([
                        'id' => $this->generateAutoNumber('ds_permissions'),
                        'modul_id' => $modulId->modul_id,
                        'menu_id' => $akses[$i],
                        'role_id' => $role_id,
                        'read' => $r,
                        'create' => $c,
                        'update' => $u,
                        'delete' => $d,
                    ]);
                }
            }
        }catch(QueryBuilder $e){
            toastr()->error($e->getMessage().'Error');
            return back();
        }
    }
}
