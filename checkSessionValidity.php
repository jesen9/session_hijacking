<?php

function checkSessionValidity(){
    if(!empty($_SESSION)){
        $geoip = json_decode(file_get_contents("http://ipwho.is/"), true);
        if(
            $_SESSION['client_ip'] == $_SERVER['REMOTE_ADDR'] &&
            $_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
            $_SESSION['city'] == $geoip['city'] &&
            $_SESSION['postal_code'] == $geoip['postal'] &&
            time() - $_SESSION['last_login'] <= 43200
        )
        {
            return true;
        }
    }
    else
    {
        return false;
    }

}