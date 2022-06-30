<?php
if(!isset($_SESSION['admin_id']) ){
	header("Location:login.php?error=Login is needed to access to admin page");
	exit();
}
