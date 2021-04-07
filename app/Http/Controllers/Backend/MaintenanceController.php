<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Session;
class MaintenanceController extends Controller
{
    public function live() 
    {
        try{
            Artisan::call('up');
            Session::put('maintenance','off');
            toastr()->success('Maintenance Off','Sukses');
            return redirect()->route('backend.setting');
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
        
    }

    public function down() 
    {
        try{
            Artisan::call('down');
            Session::put('maintenance','on');
            toastr()->success('Maintenance On','Sukses');
            return redirect()->route('backend.setting');
        }catch(\Exception $e){
            toastr()->error($e->getMessage(),'Gagal');
            return back();
        }
        
    }
}
