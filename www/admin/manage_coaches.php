<?php
include '../includes/db.php';
session_start();
include '../includes/admin_auth.php';

$stmt = $conn->prepare("SELECT * FROM coaches");
$stmt->execute();

$records=[];

while($row=$stmt->fetch(PDO::FETCH_BOTH)){
  $records[]=$row;
}
//var_dump($records);
//exit();

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Coaches</title>
    <style media="screen">
      body{
        background-color:#00AFEF;
      }
    </style>
  </head>
  <body>
    <h1 align="center">OSHEKU ATHLETICS ACADEMY</h1>
    <hr>

    	<?php include '../includes/admin_header.php' ?>
    <form action="" method="post">
      <table border="2">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Events</th>
          <th>Country</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Date Created</th>
          <th>Time Created</th>
        </tr>
<?php foreach($records as $value): ?>
  <td><?=$value['name'] ?></td>
    <td><?=$value['email'] ?></td>
    <td><?=$value['events'] ?></td>
    <td><?=$value['country'] ?></td>
    <td> <a href="edit_coaches.php?id=<?= $value['coach_id']?>">Edit</a> </td>
    <td> <a href="delete_coaches.php?id=<?= $value['coach_id']?>">Delete</a> </td>
    <td><?=$value['date_created'] ?></td>
    <td><?=$value['time_created'] ?></td>
</tr>
<?php endforeach; ?>
      </table>
    </form>


  </body>
</html>
