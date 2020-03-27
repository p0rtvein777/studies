<?php
POST:
$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password= $_POST['confirm_password'];

try{
	$conn = new PDO("mysql:host=localhost;dbname=siteusers", "dbwebreg", "mysqlweb");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo"Database connections problems...<br>";
	die(print_r( $e->getMessage()));
}

if ($password == $confirm_password){
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
		echo "There is no user with such login!<br><a href='http://localhost/website.users/'>Get back.</a>";
	}
	else{
		$pw = password_hash($password, PASSWORD_DEFAULT);
			$sql = "UPDATE regs
					SET 'password' = $password
					WHERE 'login' = $login";
			$getResult_login = $conn->prepare ($sql2);
			$getResult_login->execute();
		echo $final['surname'].", your password was successfully changed.<br><a href='http://localhost/website.users/'>Get back.</a>";
	}
	}
	catch (PDOException $e2){
		die(print_r($e2->getMessage()));
	}
}
else{
	echo "Passwords dont match!<br><a href='http://localhost/website.users/'>Get back.</a>";
}
?>