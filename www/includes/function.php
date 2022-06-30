<?php
function addCoachesDetails($dbconn,$post){
	$encrypted=password_hash($_POST['hash'],PASSWORD_BCRYPT);
	$statement=$dbconn->prepare("INSERT INTO coaches VALUES(NULL,:nm,:em,:ev,:hsh,:co,NOW(),NOW())");
	$statement->bindParam(":nm",$post['name']);
	$statement->bindParam(":em",$post['email']);
	$statement->bindParam(":ev",$post['events']);
	$statement->bindParam(":hsh",$encrypted);
	$statement->bindParam(":co",$post['country']);
	$statement->execute();
}

if(empty($error)){
$stmt=$conn->prepare("SELECT * FROM coaches WHERE name=:nm OR email=:em OR events=:ev OR country=:co");
$stmt->bindParam(":nm",$_POST['name']);
$stmt->bindParam(":em",$_POST['email']);
$stmt->bindParam(":ev",$_POST['events']);
$stmt->bindParam(":co",$_POST['country']);
$stmt->execute();



if($stmt->rowCount () > 0 ){
	header("location:add_coaches.php?error=Either One Of The Data Already Exist");
	exit();
}



}
