<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
require "conn.php";

$sql_query = "SELECT * FROM bmi";
if($result = $conn->query($sql_query)){
 
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $id = $row['id'];
      $name = $row['name'];
      $email = $row['email'];
      $phone = $row['phone'];
      $weight = $row['weight'];
      $height = $row['height'];
      $address = $row['address'];
      $file = $row['file'];

    }
}
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $file = $_POST['file'];
    $updateSQL = "UPDATE bmi SET `name`= '$name', `email` = '$email', `phone` = '$phone', `weight` = '$weight', `height` = '$height', `address`= '$address', `file` = '$file' WHERE id = ".$id;
        if(mysqli_query($conn,$updateSQL)){
            header('location:index.php');
        }else{               
            echo "Update error....." . mysqli_error($conn);
        }
      }
?>

<div class="container" my="2">
<h1>BMI Calculation</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $name; ?>">
              
            
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                
               
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="phone">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
             
            
                </div>
                <div class="form-group col-md-4">
                  <label for="weight">Weight</label>
                  <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $weight; ?>">
                </div>
                <div class="form-group col-md-2">
                  <label for="height">Height</label>
                  <input type="text" class="form-control" id="height" name="height" value="<?php echo $height; ?>">
                </div>
              </div>
            <div class="form-group">
              <label for="address">Address </label>
              <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
         
          
            </div>
    
    
    
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile03" name="file" value="<?php echo $file; ?>">

                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                </div>
              </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
