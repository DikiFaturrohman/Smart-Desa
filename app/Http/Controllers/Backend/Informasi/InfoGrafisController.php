<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InfoGrafis;
use Str;
use Auth;
use Session;

class InfoGrafisController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:info_grafis');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['infoGrafis'] = InfoGrafis::all();
            }else{
                $data['infoGrafis'] = InfoGrafis::where('desa_id',Auth::user()->desa_id)->get();
            }
            return view('backend.informasi.infoGrafis.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.informasi.infoGrafis.create');
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
            $data['id'] = $this->generateAutoNumber('ds_infografis');
            $data['created_by'] = Auth::user()->name;
            $data['desa_id'] = empty(Auth::user()->desa_id)?Session::get('desa_id'):Auth::user()->desa_id;
            $infoGrafis = InfoGrafis::create($data);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.informasi.infoGrafis.detail',['id'=>$infoGrafis->encodeHash($infoGrafis->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['infoGrafis'] = InfoGrafis::find($id);
            return view('backend.informasi.infoGrafis.edit',$data);
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
            $data['updated_by'] = Auth::user()->name;
            $infoGrafis = InfoGrafis::find($id);
            $infoGrafis->update($data);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.informasi.infoGrafis.detail',['id'=>$infoGrafis->encodeHash($infoGrafis->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['infoGrafis'] = InfoGrafis::find($id);
            return view('backend.informasi.infoGrafis.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $infoGrafis = InfoGrafis::find($id);
            $infoGrafis->update(['status' => 'show']);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.informasi.infoGrafis');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $infoGrafis = InfoGrafis::find($id);
            $infoGrafis->update(['status' => 'hide']);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.informasi.infoGrafis');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        if(!empty($request->id)){
            $infoGrafis = InfoGrafis::find($request->id);
            if($infoGrafis->noImg()){
                $rules = ['img' => 'mimes:png,jpg,jpeg|max:2048'];
            }
        }

        $rules = [
            'title' => 'required|max:191|unique:ds_infografis,title,'.$request->id,
            'description' => 'required',
            'img' => 'mimes:png,jpeg,jpg',
            'status' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'mimes' => 'Format :attribute tidak sesuai',
            'max' => ':attribute maksimal :max karakter/kb',
            'unique' => ':attribute sudah digunakan'
        ];

        $label = [
            'title' => 'Judul',
            'description' => 'Deksripsi',
            'img' => 'Foto',
            'status' => 'Status',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $infoGrafis = InfoGrafis::find($request->id);
        }

        if($request->file('img')){
            if(!empty($request->id)){
                $infoGrafis = InfoGrafis::find($request->id);
                if(\File::exists('backend/images/informasi/infoGrafis/'.$infoGrafis->img)){
                    \File::delete('backend/images/informasi/infoGrafis/'.$infoGrafis->img);
                }
            }
            $image = $request->file('img');
            $destinationPath = public_path('backend/images/informasi/infoGrafis');
            $name = strtolower(str_replace(' ','_',$request->title)).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$name);
        }else{
            if($request->id){
                $name=$infoGrafis->img;
            }else{
                $name = null;
            }
        }

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'img' => $name,
        ];

        return $data;
    }
}
