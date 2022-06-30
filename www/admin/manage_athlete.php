<?php
include '../includes/db.php';
session_start();
include '../includes/admin_auth.php';
//include '../includes/admin_header.php';




$stmt=$conn->prepare("SELECT * FROM athletes");
$stmt->execute();



$records=array();

while($row=$stmt->fetch(PDO::FETCH_BOTH)){
	$records[]=$row;
}

//var_dump($records);
//exit();




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Athletes</title>
<style media="screen">
	body{
		background-color: #12F1C5;
	}
</style>
</head>

<body>
	<h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
	<hr />

	<?php include '../includes/admin_header.php' ?>

<form action="" method="post">
<table border="2">
<tr>
		<th>Name</th>
		<th>Email</th>
    <th>Events</th>
 		<th>Edit</th>
		<th>Delete</th>
		<th>Country</th>
		<th>Date Created</th>
		<th>Time Created</th>
</tr>
<?php foreach($records as $value): ?>
<tr>
	<td><?=$value['name'] ?></td>
    <td><?=$value['email'] ?></td>
	<td><?=$value['events'] ?></td>
	<td> <a href="edit_athletes.php?id=<?= $value['athlete_id']?>">Edit</a> </td>
	<td> <a href="delete_athletes.php?id=<?= $value['athlete_id']?>">Delete</a> </td>
    <td><?=$value['country'] ?></td>
		<td><?=$value['date_created'] ?></td>
		<td><?=$value['time_created'] ?></td>


</tr>
<?php endforeach;     ?>
</table>





</form>
</body>
</html>
