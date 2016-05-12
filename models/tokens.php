<?php
function getToken($tokenplus){
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
        return $_SESSION['token'];
    }
    else{
        $token = sha1(uniqid()) . $tokenplus. sha1(uniqid());
        $_SESSION['token'] = $token;
        return $token;
    }
}
function compareToken($token){
    if(isset($_SESSION['token']) && !empty($_SESSION['token'])){
        return ($_SESSION['token'] === $token) ;
    }
    else{
        return false;
    }
}
