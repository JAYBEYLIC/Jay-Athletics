<?php
session_start();
include '../includes/db.php';



if(isset($_POST['submit'])){
	$error=array();

	if(empty($_POST['email'])){
		$error['email']="Enter Email";
	}

	if(empty($_POST['hash'])){
		$error['hash']="Enter Password";
	}

	if(empty($error)){
		$stmt=$conn->prepare("SELECT * FROM admin where email=:em");
		$stmt->bindParam(":em",$_POST['email']);
		$stmt->execute();

		$fetch=$stmt->fetch(PDO::FETCH_BOTH);

		if($stmt->rowCount () > 0 && password_verify ($_POST['hash'],$fetch['hash'])){
			$_SESSION['admin_id']=$fetch['admin_id'];
				header("Location:dashboard.php");
				exit();
		}else{
			// die("here");
			header("Location:login.php?error=Either Email or Password Incorrect");
			exit();
		}

	}



}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<style media="screen">
	body{
		background-color:#7F7f7F;
	}
</style>

</head>

<body>
	<h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
	<hr />
<form action="" method="post">

<?php if(isset($error['email'])){
		echo $error['email'];
}?>
<p>Email:<input type="text" name="email" /></p>
<?php if(isset($error['hash'])){
		echo $error['hash'];
}?>

<p>Password:<input type="password" name="hash" /></p>

<input type="submit" name="submit" value="Login" />


</form>
</body>
</html>
