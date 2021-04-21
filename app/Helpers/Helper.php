
<?php

function url_server()
{
    if(app("env")=='production')
    {
        $server = 'http://192.168.18.27';
    }else{
        $server = 'http://192.168.18.26';
    }

    return $server;
}

function current_user($role)
{
    if(\Auth::guard($role)->check()){
        $user =  \Auth::guard($role)->user();
    }else{
        $user = \App\Models\User::where('api_token',request()->token)->first();
    }
    return $user;
}

function getCities($id){
    return \App\Models\Kota::where('provinsi_id',$id)->get();
}

function getDistricts($id)
{
    return \App\Models\Kecamatan::where('kota_id',$id)->get();
}

function getAreas($id)
{
    return \App\Models\Desa::where('kecamatan_id',$id)->get();
}

