<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="catalog.css">
<title>Jewelery catalog</title>
</head>
<body>

<h1>
	<p>Silver Rush earrings table</p>
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql_earrings = "SELECT * FROM earrings";
		$getResult_earrings = $conn->prepare($sql_earrings);
		$getResult_earrings->execute();
		$result_earrings = $getResult_earrings->fetchAll();
	
       echo "
       <table align='center'>
    		<th>Category_id</th>
    		<th>ID</th>
    		<th>Price</th>
    		<th>Weight</th>
    		<th>Info</th>";
		foreach($result_earrings as $row) {
		echo "
				<tr>
					<td>".$row['category_id']."</td>
					<td>".$row['id']."</td>
		        	<td>".$row['price']."</td>
		        	<td>".$row['weight']."</td>
		        	<td>".$row['info']."</td>
		        </tr>";}
		echo"</table>";
        ?>
<fieldset>
	<figure class='sign'>
		<p><img src='media/earrings/01.jpg' width='150' height='150' alt='Earrings'></p>
		<figcaption>Earrings #1</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/earrings/02.jpg' width='150' height='150' alt='Earrings'></p>
		<figcaption>Earrings #2</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/earrings/03.jpg' width='150' height='150' alt='Earrings'></p>
		<figcaption>Earrings #3</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/earrings/04.jpg' width='150' height='150' alt='Earrings'></p>
		<figcaption>Earrings #4</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/earrings/05.jpg' width='150' height='150' alt='Earrings'></p>
		<figcaption>Earrings #5</figcaption>
	</figure>
</fieldset>
</body>
</html>