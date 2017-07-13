<?php
    include('inc_session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
    <title>Dashboard</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
        <div class="container">
      <div class="row">
        <div class="col-md-3">LOGO</div>
        <div class="col-md-3">Admin Panel</div>
        <div class="col-md-6">Welcome- 
        <span class="glyphicon glyphicon-user">
        </span><?php $user->get_fullname($uid);?>
        <span class="glyphicon glyphicon-off">
        </span>Logout</div>
      </div>

      <div class="row">
        <div class="col-md-12" style="background-color:#cccddd; float:right; color:#ffffff; font-weight:900; ">
        <p style="text-align:right"> <span class="glyphicon glyphicon-home"></span> <a href="dashboard.php">Dashboard</a></p>
        </div>
      </div>