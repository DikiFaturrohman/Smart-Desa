<?php

namespace App\Http\Controllers\Backend\Informasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Str;
use Auth;
use Session;

class AgendaController extends Controller
{
    function __construct()
    {
        $this->middleware('permissions:agenda');
    }

    public function index()
    {
        try{
            if(empty(Auth::user()->desa_id)){
                $data['agenda'] = Agenda::all();
            }else{
                $data['agenda'] = Agenda::where('desa_id',Auth::user()->desa_id)->get();
            }
            return view('backend.informasi.agenda.list',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function create()
    {
        try{
            return view('backend.informasi.agenda.create');
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
            $data['id'] = $this->generateAutoNumber('ds_agenda');
            $data['created_by'] = Auth::user()->name;
            $data['desa_id'] = empty(Auth::user()->desa_id)?Session::get('desa_id'):Auth::user()->desa_id;
            $agenda = Agenda::create($data);
            toastr()->success('Data Berhasil Ditambahkan','Sukses');
            return redirect()->route('backend.informasi.agenda.detail',['id'=>$agenda->encodeHash($agenda->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['agenda'] = Agenda::find($id);
            return view('backend.informasi.agenda.edit',$data);
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
            $agenda = Agenda::find($id);
            $agenda->update($data);
            toastr()->success('Data Berhasil Diubah','Sukses');
            return redirect()->route('backend.informasi.agenda.detail',['id'=>$agenda->encodeHash($agenda->id)]);
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function detail($id)
    {
        try{
            $id = $this->decodeHash($id);
            $data['agenda'] = Agenda::find($id);
            return view('backend.informasi.agenda.detail',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }
    
    public function active(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $agenda = Agenda::find($id);
            $agenda->update(['status' => 'show']);
            toastr()->success('Data Berhasil diaktifkan','Sukses');
            return redirect()->route('backend.informasi.agenda');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    public function inactive(Request $request)
    {
        try{
            $id = $this->decodeHash($request->id);
            $agenda = Agenda::find($id);
            $agenda->update(['status' => 'hide']);
            toastr()->success('Data Berhasil dinonaktifkan','Sukses');
            return redirect()->route('backend.informasi.agenda');
        }catch(\QueryBuilder $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
    }

    private function validasiForm($request)
    {
        if(!empty($request->id)){
            $agenda = Agenda::find($request->id);
            if($agenda->noImg()){
                $rules = ['img' => 'mimes:png,jpg,jpeg|max:2048'];
            }
        }

        $rules = [
            'title' => 'required|max:191|unique:ds_agenda,title,'.$request->id,
            'short_description' => 'required|max:150',
            'description' => 'required',
            'img' => 'mimes:png,jpeg,jpg',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
            'address' => 'Tempat',
            'start_date' => 'Tanggal Mulai',
            'end_date' => 'Tanggal Berakhir',
            'status' => 'Status',
        ];

        $this->validate($request,$rules,$messages,$label);
    }

    public function bindData($request)
    {
        if(!empty($request->id)){
            $agenda = Agenda::find($request->id);
        }

        if($request->file('img')){
            if(!empty($request->id)){
                $agenda = Agenda::find($request->id);
                if(\File::exists('backend/images/informasi/agenda/'.$agenda->img)){
                    \File::delete('backend/images/informasi/agenda/'.$agenda->img);
                }
            }
            $image = $request->file('img');
            $destinationPath = public_path('backend/images/informasi/agenda');
            $name = str_replace(' ','_',$request->title).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath,$name);
        }else{
            if($request->id){
                $name=$agenda->img;
            }else{
                $name = null;
            }
        }

        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'img' => $name,
        ];

        return $data;
    }
}
