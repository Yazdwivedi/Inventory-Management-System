<?php

session_start();
require "db/connect.php";
$counter=0;
if(isset($_POST["submit"]))
{
	$opassword=trim($_POST["opassword"]);
	$npassword=trim($_POST["npassword"]);
	$email=$_SESSION["user"];
	$result=$conn->prepare("select password from customer where email=?");
	$result->bind_param("s",$email);
	$result->execute();
	$result->bind_result($pass);
	$result->fetch();
	$password=$pass;
	$result->close();
	if($password===$opassword)
	{
		$check=$conn->prepare("update customer set password=? where email=?");
		$check->bind_param("ss",$npassword,$email);
		$check->execute();
		header("Location:customer_main.php");
		die();
	}
	else
		$counter=1;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="body.css">
    <meta charset="utf-8">
    <title>Customer Approval</title>
    <style media="screen">
    .inner{
      color:white;
      width:50%;
      margin: auto;
      margin-top: 80px;
      background-color: rgba(56, 40, 40,0.7);
      padding:70px;
      border-radius: 6%;
    }
    button{
      margin-top: 30px;
    }
      li{
        color:white;
        margin-left:20px;
        margin-right:20px;
      }
    </style>
  </head>
  <body>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="customer_main.php">Inventory Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="customer_apply.php">Apply for items</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="customer_approval.php">Check for approval</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="customer_update.php">Update Information</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="customer_password.php">Change Password</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="customer_logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="inner text-center">
        <form action="" method="post">
		  <?php 
			if($counter)
			  echo "Old password must match<br>";?>
          <label style="margin-top:20px;">Old Password</label>
          <input type="password" class="form-control" name="opassword" placeholder="Old Password">
          <label style="margin-top:20px;">New Password</label>
          <input type="password" class="form-control" name="npassword" placeholder="New Password">
          <button type="submit" class="btn btn-primary" name="submit">Change</button>
        </form>

      </div>
</body>
</html>
