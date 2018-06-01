<?php
require "db/connect.php";

		if(isset($_POST["submit"]))
		{
			
			$fname=trim($_POST["fname"]);
			$lname=trim($_POST["lname"]);
			$email=trim($_POST["email"]);
			$password=trim($_POST["password"]);
			$update=$conn->prepare("insert into customer (first_name,last_name,email,password) values (?,?,?,?)");
			$update->bind_param("ssss",$fname,$lname,$email,$password);
			$value=$update->execute();
			if($value)
			{
				header("Location:main.html");
				die();
			}
			else{
					header("Location:registration.php");
					echo "We are having some problems..try again";
					
			}
		}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registration</title>
  </head>
  <style>
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

  </style>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="main.html" class="navbar-brand">Inventory Management System</a>
    </nav>
    <div class="inner text-center">
      <form action="" method="post">
        <label>First Name</label>
        <input type="text" class="form-control" name="fname" placeholder="First Name">
        <label>Last Name</label>
        <input type="text" class="form-control" name="lname" placeholder="Last Name">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <button type="submit" class="btn btn-primary" name="submit">Register</button>
      </form>
	  

    </div>

  </body>
</html>

