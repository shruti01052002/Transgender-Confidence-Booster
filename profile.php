<?php
$insert = false;
if(isset($_POST['first_name'])){
    //Set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";

    //Create a database connection
    $con = mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    //echo "Sucess connecting to the db";

    //Collect post variables
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `final`.`profile` (`first_name`, `last_name`, `dob`, `age`, `phone`, `address`, `created_at`) VALUES ('$first_name', '$last_name', '$dob', '$age', '$phone', '$address', current_timestamp());";
    //echo $sql;

    //Execute the query
    if($con->query($sql) == true){

        //Flag for successfull insertion
        $insert = true;
        //echo "Successfully inserted";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    //Close the database connection
    $con->close();
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>CodeHers</title>
  </head>
  <body style="background-color:black">
  <nav class="navbar navbar-expand-lg" style="background-color:#000000;">
  <a class="navbar-brand" href="index.html" ><img src='logo.jpg' width="70" height="35"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color:#FF63B1" href="success.html">Sucess Stories<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:#FF63B1" href="about.html">About us</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" style="color:#FF63B1" href="contact.html">Contact us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:#FF63B1" href="domain.html">Domain Of Interest</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    </form>
  </div>
</nav>


  <div class="container">
  <?php
        if($insert == true){
        echo "<p style='color:white' class='submitMsg'>Your profile has been updated.</p>";
        }
        ?>
  <form action="profile.php" method="post">
    <div class="form-row my-2">
      <img src="https://i.stack.imgur.com/YQu5k.png">
    </div>
    <div class="form-row my-3">
      <div class="col">
      <input type="file" id="img" name="img" accept="image/*">
      </div>
    </div>
  <div class="form-row my-2">
    <div class="col">
      <input type="text" name="first_name" class="form-control" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" name="last_name" class="form-control" placeholder="Last name">
    </div>
  </div>
  <div class="form-row my-3">
    <div class="col-4">
      <input type="date" name="dob" class="form-control" placeholder="DOB">
    </div>
    <div class="col-4">
      <input type="number" name="age" class="form-control" placeholder="AGE">
    </div>
      <div class="col-4">
      <input type="text" name="phone" class="form-control" placeholder="PHONE">
    </div>
  </div>
    <div class="form-row my-3">
      <div class="col">
      <input type="textarea" name="address" class="form-control" placeholder="Address">
        </div>
  </div>
    <button class="btn btn-success">Add to profile</button>
</form>
      </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>