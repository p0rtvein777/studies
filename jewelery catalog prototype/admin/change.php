<?php
POST:
$category = $_POST['category'];
$price = $_POST['price'];
$size = $_POST['size'];
$info = $_POST['info'];
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
		$sql_update = "UPDATE 
							bracelets 
						SET 
							category_id = '$category', 
							price = $price, 
							length = $size, 
							info = '$info' 
						WHERE 
							id = $id;";
	}
	else if ($type = "earrings") {
		$sql_check = "SELECT * FROM earrings";
		$sql_update = "UPDATE earrings SET category_id = '$category', price = $price, weight = $size, info = '$info' WHERE id = $id;";
	}
	else if ($type = "necklace") {
		$sql_check = "SELECT * FROM necklace";
		$sql_update = "UPDATE necklace SET category_id = '$category', price = $price, length = $size, info = '$info' WHERE id = $id;";
	}
	else {
		$sql_check = "SELECT * FROM rings";
		$sql_update = "UPDATE rings SET category_id = '$category', price = $price, weight = $size, info = '$info' WHERE id = $id;";
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
			$getResult = $conn->prepare ($sql_update);
			$getResult->execute();
		echo "Jewelery was updated.<br><a href='adding.html'>Get back.</a>";
	}
}
catch (PDOException $e2){
	die(print_r($e2->getMessage()));
}
?>