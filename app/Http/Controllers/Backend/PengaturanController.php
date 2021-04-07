<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Website;
use Session;

class PengaturanController extends Controller
{
    public function index()
    {
        try{
            $data['website'] = Website::where('desa_id',Session::get('desa_id'))->first();
            return view('backend.pengaturan',$data);
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
        
    }

    public function update(Request $request)
    {

        try{

            $website = Website::where('desa_id',Session::get('desa_id'))->first();

            $rules = [
                'meta_title' => 'required|max:250',
                'meta_keyword' => 'required',
                'meta_description' => 'required',
                'favicon' => 'mimes:png,svg,ico'
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong',
                'max' => ':attribute maksimal :max karakter',
                'mimes' => ':attribute harus .png , .svg atau .ico' 
            ];

            $label = [
                'meta_title' => 'Meta Title',
                'meta_keyword' => 'Meta Keyword',
                'meta_description' => 'Meta Description'
            ];

            $this->validate($request,$rules,$messages,$label);

            if($request->file('favicon')){
                if(!empty($website->favicon)){
                    if(\File::exists('backend/images/favicon/'.$website->favicon)){
                        \File::delete('backend/images/favicon/'.$website->favicon);
                    }
                }
                $favicon = $request->file('favicon');
                $destination = public_path('backend/images/favicon');
                $name = date('YmdHis').'.'.$favicon->getClientOriginalExtension();
                $favicon->move($destination,$name);
            }else{
                if(empty($website)){
                    $name = null;
                }else{
                    $name = $website->favicon;
                    
                }
            }
            
            $desa_id = empty($website)?Session::get('desa_id'):$website->desa_id;
            $data = [
                'desa_id' => $desa_id,
                'meta_title' => $request->input('meta_title'),
                'meta_keyword' => $request->input('meta_keyword'),
                'meta_description' => $request->input('meta_description'),
                'favicon' => $name
            ];
            
            if(empty($website)){
                $website = Website::create($data);
            }else{
                $website->update($data);
            }

            toastr()->success('Website berhasil diubah','Sukses');
            return redirect()->route('backend.setting');
        }catch(QueryException $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
        
    }
}
