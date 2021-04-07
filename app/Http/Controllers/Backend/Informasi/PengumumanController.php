<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Str;
use Auth;
use Session;

class PengumumanController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:pengumuman');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['pengumuman'] = Pengumuman::all();
            }else{
                $data['pengumuman'] = Pengumuman::where('desa_id',Auth::user()->desa_id)->get();
            }
            return view('backend.informasi.pengumuman.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.informasi.pengumuman.create');
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
            $data['id'] = $this->generateAutoNumber('ds_pengumuman');
            $data['created_by'] = Auth::user()->name;
            $data['desa_id'] = empty(Auth::user()->desa_id)?Session::get('desa_id'):Auth::user()->desa_id;
            $pengumuman = Pengumuman::create($data);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.informasi.pengumuman.detail',['id'=>$pengumuman->encodeHash($pengumuman->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['pengumuman'] = Pengumuman::find($id);
            return view('backend.informasi.pengumuman.edit',$data);
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
            $pengumuman = Pengumuman::find($id);
            $pengumuman->update($data);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.informasi.pengumuman.detail',['id'=>$pengumuman->encodeHash($pengumuman->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['pengumuman'] = Pengumuman::find($id);
            return view('backend.informasi.pengumuman.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $pengumuman = Pengumuman::find($id);
            $pengumuman->update(['status' => 'show']);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.informasi.pengumuman');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $pengumuman = Pengumuman::find($id);
            $pengumuman->update(['status' => 'hide']);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.informasi.pengumuman');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        if(!empty($request->id)){
            $pengumuman = Pengumuman::find($request->id);
            if($pengumuman->noImg()){
                $rules = ['img' => 'mimes:png,jpg,jpeg|max:2048'];
            }

            if($pengumuman->noFile()){
                $rules = ['file' => 'mimes:xlsx,xls,docx,doc,pdf,pptx,ppt'];
            }
        }

        $rules = [
            'title' => 'required|max:191|unique:ds_pengumuman,title,'.$request->id,
            'short_description' => 'required|max:150',
            'description' => 'required',
            'img' => 'mimes:png,jpeg,jpg',
            'file' => 'mimes:xlsx,xls,docx,doc,pdf,pptx,ppt',
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
            'short_description' => 'Deskripsi Singkat',
            'description' => 'Deskripsi',
            'img' => 'Foto',
            'status' => 'Status',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $pengumuman = Pengumuman::find($request->id);
        }

        if($request->file('img')){
            if(!empty($request->id)){
                $pengumuman = Pengumuman::find($request->id);
                if(\File::exists('backend/images/informasi/pengumuman/'.$pengumuman->img)){
                    \File::delete('backend/images/informasi/pengumuman/'.$pengumuman->img);
                }
            }
            $image = $request->file('img');
            $destinationPath = public_path('backend/images/informasi/pengumuman');
            $namaImg = strtolower(str_replace(' ','_',$request->title)).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$namaImg);
        }else{
            if($request->id){
                $namaImg=$pengumuman->img;
            }else{
                $namaImg = null;
            }
        }

        if($request->file('file')){
            if(!empty($request->id)){
                $pengumuman = Pengumuman::find($request->id);
                if(\File::exists('backend/files/informasi/pengumuman/'.$pengumuman->file)){
                    \File::delete('backend/files/informasi/pengumuman/'.$pengumuman->file);
                }
            }
            $file = $request->file('file');
            $destinationPath = public_path('backend/files/informasi/pengumuman');
            $namaFile = strtolower(str_replace(' ','_',$request->title)).'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath,$namaFile);
        }else{
            if($request->id){
                $namaFile=$pengumuman->file;
            }else{
                $namaFile = null;
            }
        }

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'img' => $namaImg,
            'file' => $namaFile,
        ];

        return $data;
    }
}
