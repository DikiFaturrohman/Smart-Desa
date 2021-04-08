<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Redirect;
use Session;
use App\Models\Desa;

class CheckDomainPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domain = DB::table('keldesa')->where('url',$request->getHttpHost())->where('status','Y')->first();
        if(empty($domain)){
            return view('errors.404');
        }else{
            \View::share('slider',\App\Models\Slider::where('desa_id', $domain->id)->where('status', 'show')->get());
            \View::share('potensi',\App\Models\PotensiKategori::where('desa_id', $domain->id)->where('status', 'show')->get());
            \View::share('lokasi',\App\Models\Desa::where('id', $domain->id)->first());
            \View::share('website',\App\Models\Website::where('desa_id', $domain->id)->first());
            \View::share('program',\App\Models\ProgramKategori::where('desa_id', $domain->id)->where('status', 'show')->get());
            \View::share('profile',\App\Models\ProfilDesa::where('id', $domain->id)->get());

            $data = Desa::where('id',$domain->id)->first();
	        Session::put('nama_desa',$data->nama);
            Session::put('provinsi_id',$data->provinsi_id);
            Session::put('kota_id',$data->kota_id);
            Session::put('kecamatan_id',$data->kecamatan_id);
            Session::put('desa_id',$data->id);
            return $next($request);
        }
        
    }
}
