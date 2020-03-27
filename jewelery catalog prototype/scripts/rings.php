<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="catalog.css">
<title>Jewelery catalog</title>
</head>
<body>
<h1>
	<p>Silver Rush rings table</p>
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql_rings = "SELECT * FROM rings";
		$getResult_rings = $conn->prepare($sql_rings);
		$getResult_rings->execute();
		$result_rings = $getResult_rings->fetchAll();
	
       echo "
       <table align='center'>
    		<th>Category_id</th>
    		<th>ID</th>
    		<th>Price</th>
    		<th>Weight</th>
    		<th>Info</th>";
		foreach($result_rings as $row) {
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
		<p><img src='media/rings/01.jpg' width='150' height='150' alt='ring'></p>
		<figcaption>Ring #1</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/rings/02.jpg' width='150' height='150' alt='ring'></p>
		<figcaption>Ring #2</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/rings/03.jpg' width='150' height='150' alt='ring'></p>
		<figcaption>Ring #3</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/rings/04.jpg' width='150' height='150' alt='ring'></p>
		<figcaption>Ring #4</figcaption>
	</figure>
	<figure class='sign'>
		<p><img src='media/rings/05.jpg' width='150' height='150' alt='ring'></p>
		<figcaption>Ring #5</figcaption>
	</figure>
</fieldset>
</body>
</html>