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
	$sql = "SELECT * FROM regs";
	$getResult = $conn->prepare($sql);
	$getResult->execute();
	$result = $getResult->fetchAll();

	$final = null;

	foreach ($result as $user) {
			if (password_verify($password, $user['password'])){
			$final = $user;
		}
	}
}
catch (PDOException $e2){
	die(print_r($e2->getMessage()));
}
if (is_null($final)){
	echo"Error! Check the your login information or if CAPS LOCK is off.";
}
else{
	echo $final['login']."Login successful!<br><a href='http://localhost/website.users/'>Get back</a>";
}

?>
