<?php
session_start();
include '../includes/admin_auth.php';
include '../includes/db.php';
//var_dump($conn);

if(isset($_GET['id'])){
  $athlete_id=$_GET['id'];
}else{
    header("location:manage_athlete.php");
}

$stmt=$conn->prepare("SELECT * FROM athletes WHERE athlete_id=:aid");
$stmt->bindParam(":aid",$athlete_id);
$stmt->execute();

$records=$stmt->fetch(PDO::FETCH_BOTH);
//var_dump($records);

if($stmt->rowCount() < 1){
  header("location:manage_athlete.php");
  exit();
}


if(isset($_POST['submit'])){
  $error = array();

  if(empty($_POST['name'])){
    $error['name']="Please Fill Name";
  }

if(empty($_POST['email'])){
  $error['email']="please Fill Email";
}

if(empty($_POST['events'])){
  $error['events']="Please Enter Events";
}

if(empty($_POST['country'])){
  $error['country']="Please Fill Country";
}


if(empty($error)){
  $statement=$conn->prepare("UPDATE athletes SET name=:nm,email=:em,events=:ev,country=:co WHERE athlete_id=:aid");
  $statement->bindParam(":nm",$_POST['name']);
  $statement->bindParam(":em",$_POST['email']);
  $statement->bindParam(":ev",$_POST['events']);
  $statement->bindParam(":co",$_POST['country']);
  $statement->bindParam(":aid",$athlete_id);
  $statement->execute();

header("location:manage_athlete.php");
exit();
}








}









 ?>








<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Athletes Data</title>
  </head>
  <body>
    <h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
    <hr />
    <?php include '../includes/admin_header.php' ?>

    <form  action="" method="post">
      <?php if(isset($error['name'])){
        echo $error['name'];
      } ?>
      <p>Name: <input type="text" name="name" value="<?=$records['name']?>"> </p>

      <?php if(isset($error['email'])){
        echo $error['email'];
      } ?>
      <p>Email: <input type="text" name="email" value="<?=$records['email'] ?>"> </p>

      <?php if(isset($error['events'])){
        echo $error['events'];
      } ?>
      <p>Events: <input type="text" name="events" value="<?=$records['events']?>"> </p>
      <?php if(isset($error['country'])){
        echo $error['country'];
      } ?>
      <p>Country: <input type="text" name="country" value="<?=$records['country']?>"> </p>
      <input type="submit" name="submit" value="Update">
    </form>




  </body>
</html>
