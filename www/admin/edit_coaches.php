<?php
session_start();
include '../includes/admin_auth.php';
include '../includes/db.php';
if(isset($_GET['id'])){
  $coach_id=$_GET['id'];
}else{
  header("location:manage_coaches.php");
}

$stmt=$conn->prepare("SELECT * FROM coaches WHERE coach_id=:cid");
$stmt->bindParam(":cid",$coach_id);
$stmt->execute();


$records=$stmt->fetch(PDO::FETCH_BOTH);


if($stmt->rowCount() < 1){
  header("location:manage_coaches.php");
  exit();
}

// var_dump($records);
// exit();

if(isset($_POST['submit'])){
$error = array();

if(empty($_POST['name'])){
  $error['name']="Please Fill Name";
}

if(empty($_POST['email'])){
  $error['email']="Please Fill Email";
}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  $error['email']="Enter Valid Email";
}

if(empty($_POST['events'])){
  $error['events']="Please Fill Events";
}

if(empty($_POST['country'])){
  $error['country']="Please Fill Country";
}


if(empty($error)){
$statement = $conn->prepare("UPDATE coaches SET name=:nm,email=:em,events=:ev,country=:co WHERE coach_id=:cid");
$statement->bindParam(":nm",$_POST['name']);
$statement->bindParam(":em",$_POST['email']);
$statement->bindParam(":ev",$_POST['events']);
$statement->bindParam(":co",$_POST['country']);
$statement->bindParam(":cid",$coach_id);
$statement->execute();

header("location:manage_coaches.php");
exit();


    }
}


 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Coaches Data</title>
    <style media="screen">
      body{
        background-color: #F05236;
      }
    </style>
  </head>
  <body>
    <h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
    <hr />
    <?php include '../includes/admin_header.php' ?>
    <h2>Coaches Data</h2>

    <form  action="" method="post">
      <?php if(isset($error['name'])){
        echo $error['name'];
      }?>
      <p>Name: <input type="text" name="name" value="<?=$records['name']  ?>"></p>
      <?php if(isset($error['email'])){
        echo $error['email'];
      }?>
      <p>Email: <input type="text" name="email" value="<?=$records['email']  ?>"></p>
      <?php if(isset($error['events'])){
        echo $error['events'];
      }?>
      <p>Events: <input type="text" name="events" value="<?=$records['events']  ?> "> </p>
      <?php if(isset($error['country'])){
        echo $error['country'];
      }?>
      <p>Country: <input type="text" name="country" value="<?=$records['country']  ?> "></p> <br>
      <input type="submit" name="submit" value="Update">
    </form>




  </body>
</html>
