<?php
session_start();
require "db/connect.php";

$lcount=1;
if(isset($_POST["submit"]))
{
	$email1=trim($_POST["email"]);
	$password1=trim($_POST["password"]);
	$check=$conn->prepare(" select email,password from customer where email=? and password=? ");
	$check->bind_param("ss",$email1,$password1);
	$check->execute();
	$check->bind_result($email2,$password2);
	while($check->fetch())
	{
		if($email1===$email2 and $password1===$password2)
		{
			$_SESSION["user"]=$email1;
			header("Location:customer_main.php");
			die();
		}	
	}	
	$count=1;
	
	
}
if($lcount)
{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="body.css">
      <link rel="stylesheet" href="admin_login.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Customer Login</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="main.html" class="navbar-brand">Inventory Management System</a>
    </nav>
    <form class="inner text-center" action="" method="post">
      <div class="inside text-center">
        <div class="form-group form-row text-center">
          <div class="col-mid-6">
		  <?php {
		if($count===1)	  
		echo "Wrong Email or password";
	}?>
              <label for="inputAddress"><span class="color">E-mail</span></label>
              <input type="text" class="form-control" id="inputAddress" name="email" placeholder="Name">
          </div>
        </div>
        <div class="form-group form-row text-center">
          <div class="col-mid-12">
            <label for="exampleInputPassword1"><span class="color"><span class="color">Password</span></span></label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary text-center" name="submit">Submit</button>
      </div>

    </form>

  </body>
</html>
<?php }?>