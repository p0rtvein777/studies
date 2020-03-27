<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="catalog.css">
<title>Jewelery catalog</title>
</head>
<body>

<h1>
	<p>Silver Rush necklace table</p>
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql_necklace = "SELECT * FROM necklace";
		$getResult_necklace = $conn->prepare($sql_necklace);
		$getResult_necklace->execute();
		$result_necklace = $getResult_necklace->fetchAll();
	
       echo "
       <table align='center'>
    		<th>Category_id</th>
    		<th>ID</th>
    		<th>Price</th>
    		<th>Length</th>
    		<th>Info</th>";
		foreach($result_necklace as $row) {
		echo "
				<tr>
					<td>".$row['category_id']."</td>
					<td>".$row['id']."</td>
		        	<td>".$row['price']."</td>
		        	<td>".$row['length']."</td>
		        	<td>".$row['info']."</td>
		        </tr>";}
		echo"</table>";
        ?>
<fieldset>
	<figure class='sign'>
		<p><img src='media/necklace/01.jpg' width='150' height='150' alt='Necklace'></p>
		<figcaption>Necklace #1</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/necklace/02.jpg' width='150' height='150' alt='Necklace'></p>
		<figcaption>Necklace #2</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/necklace/03.jpg' width='150' height='150' alt='Necklace'></p>
		<figcaption>Necklace #3</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/necklace/04.jpg' width='150' height='150' alt='Necklace'></p>
		<figcaption>Necklace #4</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/necklace/05.jpg' width='150' height='150' alt='Necklace'></p>
		<figcaption>Necklace #5</figcaption>
	</figure>
</fieldset>
</body>
</html>