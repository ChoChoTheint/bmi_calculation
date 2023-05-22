<?php
require "conn.php";
    $errorName = $errorEmail = $errorPhone = $errorAddress = "";
    $name = $email = $phone = $address = "";
    if(isset($_POST['submit'])){
        if($_POST['name'] ==null || $_POST['name'] == "" || empty($_POST['name']) ){
            $errorName = "Please fill name field!";
        }else{
            $name = $_POST['name'];  
        }

        if($_POST['email'] ==null || $_POST['email'] == "" || empty($_POST['email']) ){
            $errorEmail = "Please fill email field!";
        }else{
            $email = $_POST['email'];  
        }

        if($_POST['address'] ==null || $_POST['address'] == "" || empty($_POST['address']) ){
            $errorAddress = "Please fill address field!";
        }else{
            $address = $_POST['address'];  
        }

        if($_POST['phone'] ==null || $_POST['phone'] == "" || empty($_POST['phone']) ){
            $errorPhone = "Please fill phone field!";
        }else{
            $phone = $_POST['phone'];  
        }

        if($name != "" && $email != "" && $address != "" && $phone != "") {
            echo $name . "<br/>";
            echo $email . "<br/>";
            echo $address . "<br/>";
            echo $phone . "<br/>";
        }
    }

    ?>