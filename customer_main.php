<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="body.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <style >
    li{
      color:white;
      margin-left:20px;
      margin-right:20px;
    }
    .outer{
      background-color: rgba(56, 40, 40,0.7);
      height:500px;
      margin-top: 40px;
      margin-bottom: 40px;
      border-radius: 6%;
    }
    .lists{
      margin-top: 50px;
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
    <div class="container outer">
      <h3 style="color:white;margin-left:55px;padding-top:30px;">Rules:-</h3>
        <ul>

          <li class="lists">Payments should be made on time</li>
          <li class="lists">If an item request is not approved within 30 days contact the owner</li>
          <li class="lists">Provide specific details about your items</li>
          <li class="lists">You can withdraw your items anytime</li>
          <li class="lists">Items should not be stored for more time than what was initially told by the customer</li>
        </ul>
    </div>
  </body>
</html>
