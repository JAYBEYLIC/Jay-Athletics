<?php
session_start();
include '../includes/admin_auth.php';
include '../includes/db.php';

if(!isset($_GET['id'])){
  header("location:manage_coaches.php");
  exit();
}

$statement=$conn->prepare("DELETE  FROM coaches WHERE coach_id=:cid");
$statement->bindParam(":cid",$_GET['id']);
$statement->execute();

header("location:manage_coaches.php");
exit();



 ?>
