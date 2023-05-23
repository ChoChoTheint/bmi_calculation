<?php
require "conn.php";
// name validation
// if(strlen($_POST['name']) >= 6 && preg_match('/[A-Za-z]+$/',$_POST['name'])){
//     $name = $_POST['name'];
// }else{
//     echo "There is an error.";
// }

// // email validation
// if(strlen($_POST['email']) >= 15 &&  preg_match('/[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/',$_POST['email'])){
//     $email = $_POST['email'];
// }else{
//     echo "There is an email error";
// }
// $name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$address = $_POST['address'];

if($name != "" && $email != "" && $phone != "" && $weight != "" && $height != "" && $address != ""){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["file"]["name"];
            $filetype = $_FILES["file"]["type"];
            $filesize = $_FILES["file"]["size"];
    
            $ext = pathinfo($filename,PATHINFO_EXTENSION);
     
            if(!array_key_exists($ext,$allowed)) die("error: please select a valid file format");
            $maxsize = 5 * 1024 * 1024;
    
            if($filesize > $maxsize) die("error: file size large than the allowed limit");
            if(in_array($filetype,$allowed)){
                if(file_exists("upload/" . $_FILES["file"]["name"])){
                    echo $_FILES["file"]["name"] . " is already exits";
                }else{
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                    "upload/" . $_FILES["file"]["name"]);
                  $file = "upload/" . $_FILES["file"]["name"];
                }
            }else{
                echo "There was a problem uploading ......";
            }
    
        }else{
            echo "ERROR: " . $_FILES["file"]["error"];
        }
    }
    if($height != "" && $weight != ""){
        $bmi_result =703 *( $weight / ($height * $height));
       }
    $date = date('Y-m-d h:i:s');
   
    $qry = "INSERT INTO bmi(`name`,`email`,`phone`,`weight`,`height`,`bmi`,`address`,`date`,`file`) VALUES ('$name','$email','$phone','$weight','$height','$bmi_result','$address','$date','$file')";
    if(mysqli_query($conn,$qry)){
        header('location:index.php');
    }
}else{
    
    echo "name email address need to fill";
}




?>


