<?php

namespace App\Http\Controllers\Backend\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahController extends Controller
{
    public function provinsi(Request $request)
    {
        if($request->ajax()){
            $kota = Kota::where('provinsi_id',$request->id)->get();
        
            return response()->json($kota);
        }
    }

    public function kota(Request $request)
    {
        if($request->ajax()){
            $kecamatan = Kecamatan::where('kota_id',$request->id)->get();
        
            return response()->json($kecamatan);
        }
    }

    public function kecamatan(Request $request)
    {
        if($request->ajax()){
            $desa = Desa::where('kecamatan_id',$request->id)->get();
        
            return response()->json($desa);
        }
    }
}
