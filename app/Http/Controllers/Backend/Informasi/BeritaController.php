<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Str;
use Auth;
use Session;

class BeritaController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:berita');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['berita'] = Berita::all();
            }else{
                $data['berita'] = Berita::where('desa_id',Auth::user()->desa_id)->get();
            }
            return view('backend.informasi.berita.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.informasi.berita.create');
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
            $data['id'] = $this->generateAutoNumber('ds_berita');
            $data['created_by'] = Auth::user()->name;
            $data['desa_id'] = empty(Auth::user()->desa_id)?Session::get('desa_id'):Auth::user()->desa_id;
            $berita = Berita::create($data);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.informasi.berita.detail',['id'=>$berita->encodeHash($berita->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['berita'] = Berita::find($id);
            return view('backend.informasi.berita.edit',$data);
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
            $berita = Berita::find($id);
            $berita->update($data);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.informasi.berita.detail',['id'=>$berita->encodeHash($berita->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['berita'] = Berita::find($id);
            return view('backend.informasi.berita.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $berita = Berita::find($id);
            $berita->update(['status' => 'show']);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.informasi.berita');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $berita = Berita::find($id);
            $berita->update(['status' => 'hide']);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.informasi.berita');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        if(!empty($request->id)){
            $berita = Berita::find($request->id);
            if($berita->noImg()){
                $rules = ['img' => 'mimes:png,jpg,jpeg|max:2048'];
            }
        }

        $rules = [
            'title' => 'required|max:191|unique:ds_berita,title,'.$request->id,
            'short_content' => 'required|max:150',
            'content' => 'required',
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
            'short_content' => 'Konten Singkat',
            'content' => 'Konten',
            'img' => 'Foto',
            'status' => 'Status',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $berita = Berita::find($request->id);
        }

        if($request->file('img')){
            if(!empty($request->id)){
                $berita = Berita::find($request->id);
                if(\File::exists('backend/images/informasi/berita/'.$berita->img)){
                    \File::delete('backend/images/informasi/berita/'.$berita->img);
                }
            }
            $image = $request->file('img');
            $destinationPath = public_path('backend/images/informasi/berita');
            $name = strtolower(str_replace(' ','_',$request->title)).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$name);
        }else{
            if($request->id){
                $name=$berita->img;
            }else{
                $name = null;
            }
        }

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'short_content' => $request->input('short_content'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
            'img' => $name,
        ];

        return $data;
    }
}
