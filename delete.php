<?php
require "conn.php";
    $id = $_GET['id'];
    // $deleteQuery = "UPDATE SET flag=1 WHERE id = " . $id;
    $deleteQuery = "DELETE FROM bmi WHERE id = " . $id;
    if (mysqli_query($conn, $deleteQuery)) {
        header('location:index.php');
    } else {
        echo "Delete error: " . mysqli_error($conn);
    }



?>