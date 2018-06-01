<?php
session_start();

unset($_SESSION["user"]);
session_destroy();


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
    <meta charset="utf-8">
    <title>Thank you</title>
  </head>
  <style media="screen">
    h1{
      font-family: 'Yanone Kaffeesatz', sans-serif;
      color:white;
      padding:20px;
    }
    .position{
      background-color: rgba(56, 40, 40,0.7);
      margin-right: 250px;
      margin-left:350px;
      margin-top: 250px;

    }

  </style>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a href="main.html" class="navbar-brand">Inventory Management System</a>
    </nav>
    <div class="position text-center">
      <h1>SUCCESSFULLY LOGGED OUT</h1>
    </div>
  </body>
</html>
