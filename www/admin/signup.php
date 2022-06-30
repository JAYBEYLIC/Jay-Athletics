<?php
session_start();
include '../includes/db.php';

//var_dump ($conn);

	if(isset($_POST['submit'])){
		$error=array();

		if(empty($_POST['name'])){
			$error['name']="Enter Name";
		}

		if(empty($_POST['email'])){
			$error['email']="Enter Email";
		}

		if(empty($_POST['hash'])){
			$error['hash']="Enter Password";
		}

		if(empty($_POST['confirm_hash'])){
			$error['confirm_hash']="Confirm Password";
		}elseif($_POST['confirm_hash'] !== $_POST['hash']){
				$error['confirm_hash']="Password Mismatch";
		}

		if(empty($error)){
			$stmt=$conn->prepare("SELECT * FROM admin WHERE name=:nm OR email=:em");
			$stmt->bindParam(":nm",$_POST['name']);
			$stmt->bindParam(":em",$_POST['email']);
			$stmt->execute();

			if($stmt->rowCount () > 0){
				header("Location:signup.php?error=Admin Already Exist");
				exit();
			}else{
			$encrypted=password_hash($_POST['hash'],PASSWORD_BCRYPT);

			$stmt=$conn->prepare("INSERT INTO admin VALUES(NULL,:nm,:em,:hsh,NOW(),NOW() )");

			$data=array(
			":nm"=>$_POST['name'],
			":em"=>$_POST['email'],
			":hsh"=>$encrypted
			);

			$stmt->execute($data);
			header("Location:Login.php");
			exit();
				}
		}


	}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jay Signup</title>
<style>
body{
background-color:#FC0;
}

</style>
</head>

<body>
<h1 align="center">OSHEKU ATHLETICS ACADEMY </h1>
<hr />
<form action="" method="post">
<?php
if(isset($error['name'])){
	echo $error['name'];
}
?>

<p>Name:<input type="text" name="name"   /></p>
<?php
if(isset($error['email'])){
	echo $error['email'];
}
?>

<p>Email:<input type="text" name="email" /></p>
<?php
if(isset($error['hash'])){
	echo $error['hash'];
}
?>

<p>Password:<input type="password" name="hash" /></p>

<?php
if(isset($error['confirm_hash'])){
	echo $error['confirm_hash'];
}
?>
<p>Confirm Password: <input type="password" name="confirm_hash"  /></p>
<input type="submit" name="submit" value="Signup" />


</form>
</body>
</html>
