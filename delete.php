<?php
require "conn.php";

           
if (isset($_POST['submit'])) {
    // $id = $_POST['id'];
    // $updateQuery = "UPDATE bmi SET flag = 1 WHERE id".$id;
    $updateQuery = "DELETE FROM bmi WHERE id =" .$_GET['id'];
    if(mysqli_query($conn,$updateQuery)){
        header('location:index.php');
    }else{               
        echo "Update error....." . mysqli_error($conn);
    }
    
}

?>