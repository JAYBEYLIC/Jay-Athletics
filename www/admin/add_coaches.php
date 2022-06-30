<?php
session_start();
include '../includes/admin_auth.php';
include '../includes/db.php';
include '../includes/function.php';
//include  '../includes/admin_header.php';
if(isset($_POST['submit'])){
	$error=array();

	if(empty($_POST['name'])){
		$error['name']="Input Name";
	}

	if(empty($_POST['email'])){
		$error['email']="Input Coach Email";
	}

	if(empty($_POST['events'])){
		$error['events']="Input Coach Events";
	}

	if(empty($_POST['hash'])){
		$error['hash']="Input Password";
	}

	if(empty($_POST['country'])){
		$error['country']="Please Specify Country";
	}

	if(empty($error)){



	//add to db
	addCoachesDetails($conn,$_POST);
	header("Location:manage_coaches.php");
	exit();
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Coaches</title>
<style media="screen">
	body{
		background-color:gold;
	}
</style>
</head>
<body>
	<h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
	<hr />

	<?php include '../includes/admin_header.php' ?>

<form action="" method="post">
<?php   if(isset($error['name'])){
	echo $error['name'];
}?>
<p>Name:<input type="text" name="name" /></p>
<?php if(isset($error['email'])){
	echo $error['email'];
} ?>
<p>Email:<input type="text" name="email"  /></p>
<?php if(isset($error['events'])){
	echo $error['events'];
} ?>
<p>Events:<input type="text" name="events"  /></p>
<?php if(isset($error['hash'])){
	echo $error['hash'];
} ?>
<p>Password:<input type="password" name="hash"  /></p>
<?php if(isset($error['country'])){
	echo $error['country'];
} ?>
<p>Country:<input type="text" name="country"  /></p>
<input type="submit" name="submit" value="Add Coaches" />
</form>


</body>
</html>
