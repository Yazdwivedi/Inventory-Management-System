<?php
require "db/connect.php";
session_start();
$counter=0;
if(isset($_POST["submit"]))
{
	$name=trim($_POST["name"]);
	$password=trim($_POST["password"]);
	$check=$conn->query("select * from admin");
	$row=$check->fetch_object();
	
	if($name===$row->name and $password===$row->password)
	{
		$_SESSION["admin"]=name;
		header("Location:admin_main.html");
		die();
	}
	else
	$counter=1;
}	

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin_login.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="main.html" class="navbar-brand">Inventory Management System</a>
    </nav>
    <form class="inner text-center" action="" method="post">
      <div class="inside text-center">
        <div class="form-group form-row text-center">
          <div class="col-mid-6">
		  <?php
		  if($counter)
			  echo "Username or Password is incorrect <br>";
		  ?>
              <label for="inputAddress"><span class="color">Name</span></label>
              <input type="text" class="form-control" name="name" id="inputAddress" placeholder="Name">
          </div>
        </div>
        <div class="form-group form-row text-center">
          <div class="col-mid-12">
            <label for="exampleInputPassword1"><span class="color"><span class="color">Password</span></span></label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
      </div>

    </form>

  </body>
</html>
