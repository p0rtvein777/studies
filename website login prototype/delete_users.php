<?php
POST:
$login = $_POST['login'];
$password = $_POST['password'];

try{
	$conn = new PDO("mysql:host=localhost;dbname=siteusers", "dbwebreg", "mysqlweb");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo"Database connections problems...<br>";
	die(print_r( $e->getMessage()));
}

try{
	$sql2 = "SELECT * FROM regs";
	$getResult = $conn->prepare($sql2);
	$getResult->execute();
	$result = $getResult->fetchAll();

	$final = null;

	foreach ($result as $user) {
		if (in_array($login, $user)){
			$final = $user;
		}
	}

	if (is_null($final)){
		echo"There is no user with such login.<br><a href='http://localhost/website.users/delete_users.html'>Try again...</a>";
	} else {
		$sql1 = "DELETE FROM regs where login='".$login."'";
		$getResult = $conn->prepare($sql1);
		$getResult->execute();
		echo $final['login'].", your user profile was successfully deleted.<br><a href='http://localhost/website.users/'>Get back.</a>";
	}
}
catch (PDOException $e2){
	die(print_r($e2->getMessage()));
}
?>
