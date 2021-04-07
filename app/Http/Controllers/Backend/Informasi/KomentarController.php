<?php



namespace App\Http\Controllers\Backend\Informasi;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Komentar;

use Str;

use Auth;

use Session;


class KomentarController extends Controller

{

    function __construct()

    {

        $this->middleware('permissions:komentar');

    }



    public function index()

    {

        try{

            if(empty(Auth::user()->desa_id)){

                $data['komentar'] = Komentar::all();

            }else{

                $data['komentar'] = Komentar::where('desa_id',Auth::user()->desa_id)->get();

            }

            return view('backend.informasi.komentar.list',$data);

        }catch(\Exception $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }

    public function reply($id)

    {

        try{

            $data['komentar'] = Komentar::where('desa_id',Auth::user()->desa_id)->where('id',$this->decodeHash($id))->first();
		dd($data['komentar']);
            return view('backend.informasi.komentar.reply',$data);

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }

    public function replyProcess(Request $request){

      try{

          $id = $request->input('id');

          $rules = [

              'balas' => 'required',

          ];



          $messages = [

              'required' => ':attribute tidak boleh kosong',

              'mimes' => 'Format :attribute tidak sesuai',

              'max' => ':attribute maksimal :max kb',

              'unique' => ':attribute sudah digunakan'

          ];



          $label = [

            'balas' => 'Balas Komentar',

          ];



          $this->validate($request,$rules,$messages,$label);



          $data = [

              'balas' => $request->balas,

              'admin' => Auth::user()->name,

          ];



          $update = Komentar::where('desa_id',Session::get('desa_id'))->where('id',$id)->update($data);



          toastr()->success('Data Berhasil disimpan','Sukses');

          return redirect()->route('backend.informasi.komentar');

      }catch(\QueryBuilder $e){

          toastr()->error($e->getMessage(),'Gagal');

          return back();

      }

    }



    public function active(Request $request)

    {

        try{

            $id = $this->decodeHash($request->id);

            $komentar = Komentar::find($id);

            $komentar->update(['status' => 'show']);

            toastr()->success('Data Berhasil diaktifkan','Sukses');

            return redirect()->route('backend.informasi.komentar');

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function inactive(Request $request)

    {

        try{

            $id = $this->decodeHash($request->id);

            $komentar = Komentar::find($id);

            $komentar->update(['status' => 'hide']);

            toastr()->success('Data Berhasil dinonaktifkan','Sukses');

            return redirect()->route('backend.informasi.komentar');

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }



    public function delete(Request $request)

    {

        try{

            $id = $this->decodeHash($request->id);

            $komentar = Komentar::find($id);

            $komentar->delete();

            toastr()->success('Data Berhasil dihapus','Sukses');

            return redirect()->route('backend.informasi.komentar');

        }catch(\QueryBuilder $e){

            toastr()->error($e->getMessage(),'Gagal');

            return back();

        }

    }

}

