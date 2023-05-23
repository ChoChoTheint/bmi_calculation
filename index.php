<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
require "conn.php";
?>
    <div class="container" my="2">
        <h1>BMI Calculation</h1>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
              
            
              </div>
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" >
                
               
              </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="phone">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" >
             
            
                </div>
                <div class="form-group col-md-4">
                  <label for="weight">Weight</label>
                  <input type="text" class="form-control" id="weight" name="weight" >
                </div>
                <div class="form-group col-md-2">
                  <label for="height">Height</label>
                  <input type="text" class="form-control" id="height" name="height" >
                </div>
              </div>
            <div class="form-group">
              <label for="address">Address </label>
              <input type="text" class="form-control" id="address" name="address" >
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>  
                <!-- <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file" >
                  <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                </div> -->
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
          <?php
                $sql_query = "SELECT * FROM bmi WHERE flag=0";
                if($result = $conn->query($sql_query)){
                    if(mysqli_num_rows($result) > 0){
                
                        echo '<div class="my-3">';
                        echo '<table class="table" >';
                        echo '<tr>';
                        echo '<th>Id</th>';
                        echo '<th>Name</th>';
                        echo '<th>Email</th>';
                        echo '<th>Phone</th>';
                        echo '<th>Address</th>';
                        echo '<th>BMI</th>';
                        echo '<th>Registration Date</th>';
                        echo '<th>File</th>';
                        echo '<th>Action</th>';
                        echo '</tr>';       
                  

                            foreach ($result as $row){
                                echo "<tr>";
                                echo "<form action ='' method='POST'>";
                                $id = $row['id'];
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['phone']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "<td>".$row['bmi']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td><a href='" . $row['file'] . "' download>" . $row['file'] . "</a></td>";
                                echo "<td> <button type='submit' name = 'edit' class='btn btn-primary'><a href='update.php?id=$id' class='text-light'>Edit</a></button>
                                           <button type='submit' name = 'delete' class='btn btn-danger'><a href='delete.php?id=$id' class='text-light'>Delete</a></button>";
                                echo "</form>";
                                echo "</tr>"; 
                            }
        
                    }
                    echo '</table>';
                    echo '</div>';
                   
                } 
?>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
