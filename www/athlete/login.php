<?php
session_start();
include ('../includes/db.php');
//include ('../includes/user_auth.php');
// var_dump($conn);
// exit();
if(isset($_POST['submit'])){
  $error=array();

if(empty($_POST['email'])){
  $error['email']="Please Enter Email";
}

if(empty($_POST['email'])){
  $error['email']="Please Enter Email";
}

if(empty($error)){

$stmt=$conn->prepare("SELECT * FROM athletes WHERE email=:em");
$stmt->bindParam(":em",$_POST['email']);
$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_BOTH);

if($stmt->rowCount () > 0 && password_verify ($_POST['hash'],$row['hash'])){

  $_SESSION['id']=$row['athlete_id'];
  header("Location:dashboard.php");
  exit();

}else{
  header("location:login.php?error=Either Email or Password Incorrect");
  exit();
}
}
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Athletes Login</title>
  </head>
  <body>
  <form  action="" method="post">
    <p>Email:<input type="text" name="email"> </p>
    <p>Password:<input type="text" name="hash"> </p>
    <input type="submit" name="submit" value="Login">
  </form>



  </body>
</html>
