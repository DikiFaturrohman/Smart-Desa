<?php



namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Routing\UrlGenerator;

use App\Models\SKTM;

use App\Models\SKBN;

use App\Models\SKN;

use App\Models\SKP;

use App\Models\SKU;

use App\Models\SKM;

use App\Models\SKK;

use App\Models\SKSJ;

use App\Models\SKRT;

use App\Models\SKAW;

use App\Models\ProfilDesa;

use App\Models\BukuTamu;

use App\Models\Slider;

use App\Models\Admin;

use App\Models\User;

use App\Models\KelDesa;

use Session;


class DashboardController extends Controller

{

    public function index()

    {

        try{

            $data['sktm'] = SKTM::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skbn'] = SKBN::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skn'] = SKN::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skp'] = SKP::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['sku'] = SKU::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skm'] = SKM::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skk'] = SKK::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['sksj'] = SKSJ::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skrt'] = SKRT::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();

            $data['skaw'] = SKAW::orderBy('created_at','asc')->where('status','1')->where('desa_id',Session::get('desa_id'))->get();



            $data['admin'] = Admin::where('status',1)->where('desa_id',Session::get('desa_id'))->count();

            $data['userVerified'] = User::where('is_verified',1)->where('desa_id',Session::get('desa_id'))->count();

            $data['userUnverified'] = User::where('is_verified',0)->where('desa_id',Session::get('desa_id'))->count();



            return view('backend.dashboard',$data);

        }catch(\Exception $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

        

    }

    public function publik()

    {

        try{

            $url        = url('/');
            $desa_id    = KelDesa::where('url',str_replace(array("https://","http://"), "", $url))->first();
            // echo $desa_id->id;

            $data['sktm'] = SKTM::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skbn'] = SKBN::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skn'] = SKN::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skp'] = SKP::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['sku'] = SKU::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skm'] = SKM::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skk'] = SKK::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['sksj'] = SKSJ::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skrt'] = SKRT::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();
            $data['skaw'] = SKAW::orderBy('created_at','asc')->where('status','1')->where('desa_id',$desa_id->id)->get();

            $data['admin'] = Admin::where('status',1)->where('desa_id',$desa_id->id)->count();
            $data['userVerified'] = User::where('is_verified',1)->where('desa_id',$desa_id->id)->count();
            $data['userUnverified'] = User::where('is_verified',0)->where('desa_id',$desa_id->id)->count();

            return view('backend.publik',$data);

        }catch(\Exception $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function profilDesa()

    {

        try{

            $data['profil'] = ProfilDesa::where('id',Session::get('desa_id'))->first();

            return view('backend.profilDesa',$data);

        }catch(\Exception $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function updateProfilDesa(Request $request)

    {

        try{



            $profilDesa = ProfilDesa::find(Session::get('desa_id'));



            $rules = [

                'nama' => 'required|max:150',

                'kades' => 'required|max:150',

                'alamat' => 'required',

                'no_telpon' => 'required',

                // 'foto_desa' => 'mimes:jpg,jpeg,png|max:2048',

                // 'foto_kades' => 'mimes:jpg,jpeg,png|max:2048',

            ];



            $messages = [

                'required' => ':attribute tidak boleh kosong',

                'mimes' => 'Format :attribute tidak sesuai',

                'max' => ':attribute maksimal :max kb',

                'unique' => ':attribute sudah digunakan'

            ];



            $label = [

                'nama' => 'Nama',

                'kades' => 'Nama Kepala Desa/Lurah',

                'alamat' => 'Alamat',

                'no_telpon' => 'No. Telpon',

                'foto_desa' => 'Foto Desa',

                'foto_kades' => 'Foto Kepala Desa',

            ];



            if($request->file('foto_desa')){

                if(!empty($profilDesa)){

                    if(\File::exists('backend/images/profil/desa/'.$profilDesa->foto_desa)){

                        \File::delete('backend/images/profil/desa/'.$profilDesa->foto_desa);

                    }

                }

                $foto_desa = $request->file('foto_desa');

                $destinationPath = public_path('backend/images/profil/desa');

                $fotodesa = 'desa_'.date('YmdHis').'.' .$foto_desa->getClientOriginalExtension();

                $foto_desa->move($destinationPath,$fotodesa);

            }else{

                if(!empty($profilDesa->foto_desa))

                {

                    $fotodesa = $profilDesa->foto_desa;

                }else{

                    $fotodesa = null;

                }

            }



            if($request->file('foto_kades')){

                if(!empty($profilDesa)){

                    if(\File::exists('backend/images/profil/kades/'.$profilDesa->foto_kades)){

                        \File::delete('backend/images/profil/kades/'.$profilDesa->foto_kades);

                    }

                }

                $foto_kades = $request->file('foto_kades');

                $destinationPath = public_path('backend/images/profil/kades');

                $fotokades = 'kades_'.date('YmdHis').'.'.$foto_kades->getClientOriginalExtension();

                $foto_kades->move($destinationPath,$fotokades);

            }else{

                if(!empty($profilDesa->foto_kades))

                {

                    $fotokades = $profilDesa->foto_kades;

                }else{

                    $fotokades = null;

                }

            }



            $this->validate($request,$rules,$messages,$label);



            $data = [

                'id' => Session::get('desa_id'),

                'nama' => $request->nama,

                'kades' => $request->kades,

                'foto_desa' => $fotodesa,

                'foto_kades' => $fotokades,

                'sambutan' => $request->sambutan,

                'visi' => $request->visi,

                'misi' => $request->misi,

                'sejarah' => $request->sejarah,

                'gambaran_umum' => $request->gambaran_umum,

                'kondisi_geografis' => $request->kondisi_geografis,

                'alamat' => $request->alamat,

                'email' => $request->email,

                'website' => $request->website,

                'facebook' => $request->facebook,

                'instagram' => $request->instagram,

                'twitter' => $request->twitter,

                'no_telpon' => $request->no_telpon,

                'latitude' => $request->latitude,

                'longitude' => $request->longitude,



            ];



            if(!empty($profilDesa))

            {

                //update

                $updateProfil = ProfilDesa::where('id',$profilDesa->id)->update($data);

            }else{

                //insert

                $createProfil = ProfilDesa::create($data);

            }



            toastr()->success('Data Berhasil diubah','Sukses');

            return redirect()->route('backend.dashboard');

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }

}

