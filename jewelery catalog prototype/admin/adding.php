<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
POST:
$category_id = $_POST['category'];
$price = $_POST['price'];
$size = $_POST['size'];
$info = $_POST['info'];
$type = $_POST['type'];


try{
	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo"Database connections problems...<br>";
	die(print_r( $e->getMessage()));
}

try{
	if ($type = "bracelet") {
			$sql2 = "INSERT INTO bracelets (category_id, price, length, info)
							VALUES ('".$category_id."','".$price."','".$size."','".$info."')";
			$getResult_login = $conn->prepare ($sql2);
			$getResult_login->execute();
			echo "New jewelery added.<br><a href='adding.html'>Get back.</a>";
		}
	else if ($type = "earrings") {
			$sql2 = "INSERT INTO earrings (category_id, price, weight, info)
							VALUES ('".$category_id."','".$price."','".$size."','".$info."')";
			$getResult_login = $conn->prepare ($sql2);
			$getResult_login->execute();
			echo "New jewelery added.<br><a href='adding.html'>Get back.</a>";
		}
	else if ($type = "necklace") {
		$sql2 = "INSERT INTO necklace (category_id, price, length, info)
						VALUES ('".$category_id."','".$price."','".$size."','".$info."')";
		$getResult_login = $conn->prepare ($sql2);
		$getResult_login->execute();
		echo "New jewelery added.<br><a href='adding.html'>Get back.</a>";
	}
	else if ($type = "ring") {
		$sql2 = "INSERT INTO rings (category_id, price, weight, info)
						VALUES ('".$category_id."','".$price."','".$size."','".$info."')";
		$getResult_login = $conn->prepare ($sql2);
		$getResult_login->execute();
		echo "New jewelery added.<br><a href='adding.html'>Get back.</a>";
	}
	else {
	  echo "Something went wrong!";
	}
}
catch (PDOException $e2){
	echo "Something went wrong...<br><br><a href='adding.hmtl'>
			Try again.</a><br>";
	die(print_r($e2->getMessage()));
}
?>
</body>
</html>