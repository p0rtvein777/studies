<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="catalog.css">
<title>Jewelery catalog</title>
</head>
<body>  		
<h1>
	<p>Silver Rush bracelets table</p>
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql_bracelets = "SELECT * FROM bracelets";
		$getResult_bracelets = $conn->prepare($sql_bracelets);
		$getResult_bracelets->execute();
		$result_bracelets = $getResult_bracelets->fetchAll();
	
       echo "
       <table align='center'>
    		<th>Category_id</th>
    		<th>ID</th>
    		<th>Price</th>
    		<th>Length</th>
    		<th>Info</th>";
		foreach($result_bracelets as $row) {
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
		<p><img src='media/bracelets/01.jpg' width='150' height='150' alt='Bracelet'></p>
		<figcaption>Bracelet #1</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/bracelets/02.jpg' width='150' height='150' alt='Bracelet'></p>
		<figcaption>Bracelet #2</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/bracelets/03.jpg' width='150' height='150' alt='Bracelet'></p>
		<figcaption>Bracelet #3</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/bracelets/04.jpg' width='150' height='150' alt='Bracelet'></p>
		<figcaption>Bracelet #4</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/bracelets/05.jpg' width='150' height='150' alt='Bracelet'></p>
		<figcaption>Bracelet #5</figcaption>
	</figure>
</fieldset>
</body>
</html>