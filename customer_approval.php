<?php
require "db/connect.php";
session_start();


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
      background-color: rgba(56, 40, 40,0.7);
      margin-top:100px;
    }
    li{
      color:white;
      margin-left:20px;
      margin-right:20px;
    }
    table{
      color:white;
      margin-left:60px;
    }
    td{
		padding-left:40px;
		padding-right:40px;
		width:25%;
    }
    </style>
  </head>
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
    <div class="container inner text-center">
      <table>
        <thead>
          <td><b>Item/Quantity/Duration</b></td>
		  <td><b>Approved/Rejected</b></td>
        </thead>
		<?php
		$email=$_SESSION["user"];
		$result=$conn->prepare("select item.approved,item.type,item.quantity,item.duration from customer inner join item on item.id=customer.p_id where customer.email=?");
		$result->bind_param("s",$email);
		$result->execute();
		$result->bind_result($approved,$type,$quantity,$duration);
		while($result->fetch())
		{
			if($approved===Approved)
			{ ?><tr><td><?php echo $type,"/",$quantity,"/",$duration; ?></td><td><?php echo "Approved" ;} ?></td></tr><?php
			
			if($approved===Rejected)
				{	?><tr><td><?php echo $type,"/",$quantity,"/",$duration; ?></td><td><?php echo "Rejected" ; } ?></td></tr><?php
			if($approved===NULL)
			{	?><tr><td><?php echo $type,"/",$quantity,"/",$duration; ?></td><td><?php echo "Pending" ; } ?></td></tr><?php
		}	
		
		?>

      </table>

    </div>


  </body>
</html>
