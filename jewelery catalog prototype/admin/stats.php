<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
try{
	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e){
	echo"Database connections problems...<br>";
	die(print_r( $e->getMessage()));
}

try{
	$sql_sum = "SELECT
    					((SELECT COUNT(*) FROM bracelets) +
    					(SELECT COUNT(*) FROM earrings) +
    					(SELECT COUNT(*) FROM necklace) +
    					(SELECT COUNT(*) FROM rings))";
	$getResult = $conn->prepare ($sql_sum);
	$getResult->execute();
	$result = $getResult->fetchAll();
	$echo = array_values($result)[0][0];
	echo nl2br("Total number of jewelery in catalog - $echo\r\n\r\n");


	$sql_sum = "SELECT COUNT(*) FROM bracelets";
	$getResult = $conn->prepare ($sql_sum);
	$getResult->execute();
	$result = $getResult->fetchAll();
	$echo = array_values($result)[0][0];
	echo nl2br("Total number of bracelets in catalog - $echo\r\n");

	$sql_sum = "SELECT COUNT(*) FROM earrings";
	$getResult = $conn->prepare ($sql_sum);
	$getResult->execute();
	$result = $getResult->fetchAll();
	$echo = array_values($result)[0][0];
	echo nl2br("Total number of earrings in catalog - $echo\r\n");

	$sql_sum = "SELECT COUNT(*) FROM necklace";
	$getResult = $conn->prepare ($sql_sum);
	$getResult->execute();
	$result = $getResult->fetchAll();
	$echo = array_values($result)[0][0];
	echo nl2br("Total number of necklace in catalog - $echo\r\n");

	$sql_sum = "SELECT COUNT(*) FROM rings";
	$getResult = $conn->prepare ($sql_sum);
	$getResult->execute();
	$result = $getResult->fetchAll();
	$echo = array_values($result)[0][0];
	echo nl2br("Total number of rings in catalog - $echo\r\n");
}
catch (PDOException $e2){
	echo "Something went wrong...<br><br><a href='adding.hmtl'>
			Try again.</a><br>";
	die(print_r($e2->getMessage()));
}
?>
</body>
</html>