<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
POST:
$surname = $_POST['surname'];
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$confirm_password= $_POST['confirm_password'];
$email = $_POST['email'];
$data_of_birth = $_POST['data_of_birth'];
$gender = $_POST['gender'];
$education = $_POST['education'];


try{
	$conn = new PDO("mysql:host=localhost;dbname=siteusers", "dbwebreg", "mysqlweb");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo"Database connections problems...<br>";
	die(print_r( $e->getMessage()));
}


$sql2 = "select * from regs where login='".$login."'";

$getResult = $conn->prepare($sql2);

$getResult->execute();
$result = $getResult->fetchAll();


$final = null;
foreach ($result as $user) {
	if ($user['login'] == $login)
	{
		$final = $user;
	}
}
try{
	$check_login_query = "SELECT * FROM regs";
	$getResult = $conn->prepare($check_login_query);
	$getResult->execute();
	$result = $getResult->fetchAll();

	$userExists = false;
	foreach ($result as $user) {
		if (in_array($login, $user)){
			$userExists = true;
		}
	}

	if (!$userExists) {
		if ($password != $confirm_password){
			echo "Passwords dont match. Get back and try again!";
		} else if (strlen($password) > 15){
			echo "Password is too long. Get back and try again!";
		}
		else {
				$pw = password_hash($password, PASSWORD_DEFAULT);
				$sql2 = "INSERT INTO regs (surname, name, login, password, email, date_of_birth, gender, education)
				VALUES ('".$surname."','".$name."','".$login."','".$pw."','".$email."', '".$data_of_birth."','".$gender."','".$education."')";
				$getResult_login = $conn->prepare ($sql2);
				$getResult_login->execute();
				echo "Congratulations! Successful registration.<br><a href='http://localhost/website.users/'>Get back.</a>";
			}
		}
	else {
	  echo "User already exists!";
	}
}
catch (PDOException $e2){
	echo "Database connections problems...<br><br><a href='index.php'>
			Get back and try again.</a><br>";
	die(print_r($e2->getMessage()));
}
?>
</body>
</html>