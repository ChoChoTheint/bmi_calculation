<?php
require_once "conn.php";
    // if(nameCheck($_POST['name']) && emailCheck($email)){
    //    echo $name;
    // }else{
        // echo "Fail hi";
    // }


function nameCheck($name){
    if(strlen($name) >= 6){
        $bol = preg_match('/^[\w]+$/',$name);
        return $bol;
    }else{
        return false;
    }
}
function emailCheck($email){
    if(strlen($email) >= 15){
        $bol = preg_match('/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$email);
        return $bol;
    }else{
        return false;
    }
}












