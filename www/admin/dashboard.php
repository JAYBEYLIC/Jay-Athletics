<?php
session_start();
include '../includes/admin_auth.php';
include '../includes/db.php';
//include '../includes/admin_header.php'
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DashBoard</title>
<style media="screen">
  body{
    background-color: #3B7BDB;
  }

  #logo {
    border:4px solid white;
    width:150px;
    height:150px;
    margin-left:140px;
    margin-top:30px;
    /* padding-top: 21px; */
  }

  #content{
    border:2px solid white;
    width:auto;
    height: 100vh;
    
  }

  #boxes{
    border:2px solid pink;
    width: 90%;
    height:70%;
    margin:auto;
  }
</style>
</head>

<body>
<div id="logo">
<img src="" alt="">
</div>
  <h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
  <hr />
  <?php include '../includes/admin_header.php' ?>
<h3>This is Just a Practice Page for now i will revisit when am a full developer.Now i want to practice Php Function with these Page,Thank You.</h3>

  <div id="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
    <div id="boxes">


    </div>
  </div>














</body>
</html>
