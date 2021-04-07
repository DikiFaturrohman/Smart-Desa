<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AdminRole;
use App\Models\Permission;
use Auth;
use Session;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$menu)
    {
        
        Session::forget('permission');
        $role = AdminRole::where('admin_id',Auth::user()->id)->first();
        $permission = Permission::where('menu_id',$menu)->where('role_id',$role->role_id)->first();
        if(!empty($permission)){
            Session::put('permission',$permission);
            return $next($request);
        }else{
            toastr()->error('Anda tidak memiliki akses','error');
            return redirect()->route('backend.dashboard');
        }
        
    }
}
