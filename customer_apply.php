<?php
session_start();

require "db/connect.php";
//require "customer_login.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$counter=0;
if(isset($_POST["submit"]))
{
	$type=trim($_POST["type"]);
	$quantity=trim($_POST["quantity"]);
	$duration=trim($_POST["duration"]);
	$email=$_SESSION["user"];
	$insert=$conn->prepare("insert into item (type,quantity,duration,email) values(?,?,?,?)");
	$insert->bind_param("siis",$type,$quantity,$duration,$email);
	$check=$insert->execute();
	$checker=$conn->prepare("select id from item where type=? and quantity=? and duration=? and email=?");
	$checker->bind_param("siis",$type,$quantity,$duration,$email);
	$checker->execute();
	$checker->bind_result($id);
	$checker->fetch();
	$p_id=$id;
	$email=$_SESSION["user"];
	$checker->close();
	$new=$conn->prepare("select first_name,last_name,password from customer where email=?");
	$new->bind_param("s",$email);
	$new->execute();
	$new->bind_result($first,$last,$pass);
	$new->fetch();
	$first_name=$first;
	$last_name=$last;
	$password=$pass;
	$new->close();
	if($newinsert=$conn->prepare("insert into inventory.customer (first_name,last_name,email,password,p_id) values(?,?,?,?,?) "))
	{
		$newinsert->bind_param("ssssi",$first_name,$last_name,$email,$password,$p_id);
		$newinsert->execute();
		header("Location:customer_main.php");
		die();
	}	
	 else {
		$error = $conn->errno . ' ' . $conn->error;
		echo $error;
	}
	if(!$check)
	$counter=1;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="body.css">
    <title>Apply for item</title>
  </head>
    <style media="screen">
  li{
    color:white;
    margin-left:20px;
    margin-right:20px;
  }
  label{
    color:white;
  }
  .inner{
    background-color: rgba(56, 40, 40,0.7);
    margin:auto;
    margin-top:100px;
    }
  </style>
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
    <div class="container inner">
      <form class="text-center" style="padding:50px;" action="" method="post">
	  <?php 
	  if($counter)
	  echo "There were some problems";?>
        <label>Item Type</label>
        <select id="inputState" name="type" class="form-control">
        <option selected>Choose...</option>
        <option value="steel">Steel</option>
        <option value="cardboard">Cardboard</option>
        <option value="wood">Wood</option>
        <option value="other">Other</option>
      </select>
        <label style="margin-top:20px;">Quantity</label>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity in metre cube">
        <label style="margin-top:20px;">Duration</label>
        <input type="text" name="duration" class="form-control" placeholder="Duration in months">
        <button type="submit" style="margin-top:20px;" class="btn btn-primary" name="submit">Submit</button>
      </form>

    
	</div>
  </body>
</html>
