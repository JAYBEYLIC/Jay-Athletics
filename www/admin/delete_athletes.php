<?php
session_start();
include '../includes/db.php';
include '../includes/admin_auth.php';

if(!isset($_GET['id'])){
  header("location:manage_athlete.php");
  exit();
}


$statement=$conn->prepare("DELETE FROM athletes WHERE athlete_id=:aid");
$statement->bindParam(":aid",$_GET['id']);
$statement->execute();

header("location:manage_athlete.php");
exit();

 ?>
