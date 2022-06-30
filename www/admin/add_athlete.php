<?php
include '../includes/db.php';
session_start();
include '../includes/admin_auth.php';
//include '../includes/admin_header.php';

if(isset($_POST['submit'])){
	$error=array();

	if(empty($_POST['name'])){
		$error['name']="Input Name";
	}

	if(empty($_POST['email'])){
		$error['email']="Input Athlete Email";
	}

	if(empty($_POST['events'])){
		$error['events']="Input Athlete Events";
	}

	if(empty($_POST['hash'])){
		$error['hash']="Input Password";
	}

	if(empty($_POST['country'])){
		$error['country']="Please Specify Country";
	}

	if(empty($error)){
		$stmt=$conn->prepare("SELECT * FROM athletes WHERE name=:nm OR email=:em OR events=:ev OR country=:co");
		$stmt->bindParam(":nm",$_POST['name']);
		$stmt->bindParam(":em",$_POST['email']);
		$stmt->bindParam(":ev",$_POST['events']);
		$stmt->bindParam(":co",$_POST['country']);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			header("location:add_athlete.php?error=Either One of the Data Already Exist");
				exit();
		}else{



		$encrypted=password_hash($_POST['hash'],PASSWORD_BCRYPT);
		$statement=$conn->prepare("INSERT INTO athletes VALUES(NULL,:nm,:em,:ev,:hsh,:co,NOW(),NOW())");
		$data=array(
		":nm"=>$_POST['name'],
		":em"=>$_POST['email'],
		":ev"=>$_POST['events'],
		":hsh"=>$encrypted,
		":co"=>$_POST['country']
		);
		$statement->execute($data);
		header("Location:manage_athlete.php");
		exit();
}
	}




}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Atheletes</title>
<style media="screen">
	body{
		background-color: pink;
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
<?php   if(isset($error['email'])){
	echo $error['email'];
}?>
<p>Email:<input type="text" name="email"  /></p>
<?php   if(isset($error['events'])){
	echo $error['events'];
}?>
<p>Events:<input type="text" name="events"  /></p>
<?php   if(isset($error['hash'])){
	echo $error['hash'];
}?>
<p>Password:<input type="password" name="hash"  /></p>
<?php   if(isset($error['country'])){
	echo $error['country'];
}?>
<p>Country:<input type="text" name="country"  /></p>
<input type="submit" name="submit" value="Add Athletes" />
</form>




</body>
</html>
