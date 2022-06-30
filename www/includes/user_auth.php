<?php
if(!isset($_SESSION['id'])){
	header("Location:login.php?error=This Page requires a login");
	die();
}
?>
