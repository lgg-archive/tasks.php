<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 10:14
 */

function isloggedin(){
    return (isset($_SESSION["login"])) ? true : false;
}

function login($login,$pass,$ulogin,$upass){
    if($login === $ulogin && $pass === $upass){
        $_SESSION["login"] = $login;
        return true;
    }else{
        return false;
    }
}

function logout(){
    unset($_SESSION["login"]);
}