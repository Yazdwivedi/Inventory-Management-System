<?php
session_start();
require "db/connect.php";
$counter=0;
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
      margin-top:60px;
	  padding:40px;
    }
    li{
      color:white;
      margin-left:20px;
      margin-right:20px;
    }
    table{
	  padding:20px;
      color:white;
      margin-left:8px;
    }
    td{
	  padding-left:70px;
	  padding-right:40px;
      width:40%;
	  border:2px solid white;
    }
	.type{
		width:80px;
		margin:10px;
	
	}
	.ab{
		width:100px;
	}
    </style>
  </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admin_main.html">Inventory Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="admin_customer.php">List of Customers</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="admin_approve.php">Approve</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="admin_password.php">Change Password</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="customer_logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container inner">  
        <table>
          <thead>
            <td><b>Customer</b></td>
            <td><b>Item/Quantity/Duration</b></td>
            <td><b>Approve/Delete</b></td>
          </thead>
		  <?php
		  if($result=$conn->query("select customer.first_name,customer.email,item.type,item.quantity,item.duration,item.id from customer inner join item on customer.p_id=item.id where item.approved is null"))
		  {
			 echo "";  
		  }	  
		else
		{
			$error = $conn->errno . ' ' . $conn->error;
			echo $error; // 1054 Unknown column 'foo' in 'field list'
		}
	  
		while($row=$result->fetch_object())
		{ 
			$id=$row->id;

			?>
		  <tr>
			<td><?php echo $row->first_name,"(",$row->email,")";?></td>
			<td><?php echo $row->type,"/",$row->quantity,"/",$row->duration;?></td>
			<form method="post">
			<td class="ab"><button type="submit" name="submit1" class="btn btn-primary type">Approve</button>
			<input type="hidden" name="submit1h" value="<?php echo $id; ?>">
			<?php
			if(isset($_POST["submit1"]))
			{	
			$temp=$_POST["submit1h"];
			$check=$conn->prepare("update item set approved='Approved' where id=?");
			$check->bind_param("i",$temp);
			$check->execute();
			echo "Approved";
			$_POST[]=array();
			header("Location:admin_approve.php");
			die();
			$check->close();
			}
	
			
			?>
			</form>
			<form method="post">
			<button type="submit" name="submit2" class="btn btn-danger type">Reject</button>	
			<input type="hidden" name="submit2h" value="<?php echo $id; ?>">
			<?php
			if(isset($_POST["submit2"]))
			{
			$temp=$_POST["submit2h"];
			$check=$conn->prepare("update item set approved='Rejected' where id=?");
			$check->bind_param("i",$temp);
			$check->execute();
			echo "Rejected";
			$_POST[]=array();
			header("Location:admin_approve.php");
			die();
			$check->close();
			
			}
			
			
			?>
			</form>
			</td>
		  </tr>
		  <?php 
		   } 
		   ?>
			</table>	


      </div>

</body>
</html>
