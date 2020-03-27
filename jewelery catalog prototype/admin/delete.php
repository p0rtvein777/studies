<?php
POST:
$type = $_POST['type'];
$id = $_POST['id'];

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
		$sql_check = "SELECT * FROM bracelets";
		$sql_delete = "DELETE FROM bracelets where id='".$id."'";
		$sql_clear = "ALTER TABLE bracelets AUTO_INCREMENT = 1";
	}
	else if ($type = "earrings") {
		$sql_check = "SELECT * FROM earrings";
		$sql_delete = "DELETE FROM earrings where id='".$id."'";
		$sql_clear = "ALTER TABLE bracelets AUTO_INCREMENT = 1";
	}
	else if ($type = "necklace") {
		$sql_check = "SELECT * FROM necklace";
		$sql_delete = "DELETE FROM necklace where id='".$id."'";
		$sql_clear = "ALTER TABLE bracelets AUTO_INCREMENT = 1";
	}
	else {
		$sql_check = "SELECT * FROM rings";
		$sql_delete = "DELETE FROM rings where id='".$id."'";
		$sql_clear = "ALTER TABLE bracelets AUTO_INCREMENT = 1";
	}

	$getResult = $conn->prepare($sql_check);
	$getResult->execute();
	$result = $getResult->fetchAll();

	$final = null;

	foreach ($result as $user) {
		if (in_array($id, $user)){
			$final = $user;
		}
	}

	if (is_null($final)){
		echo"There is no such jewelery.<br><a href='delete.html'>Try again...</a>";
	} 
	else {
		$getResult = $conn->prepare($sql_delete);
		$getResult->execute();
		$clear = $conn->prepare($sql_clear);
		$clear->execute();
		echo "Successfully deleted.<br><a href='adding.html'>Get back.</a>";
	}
}
catch (PDOException $e2){
	die(print_r($e2->getMessage()));
}
?>
