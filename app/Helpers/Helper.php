
<?php

function url_server()
{
    if(app("env")=='productin')
    {
        $server = 'http://192.168.18.27';
    }else{
        $server = 'http://192.168.18.26';
    }

    return $server;
}

