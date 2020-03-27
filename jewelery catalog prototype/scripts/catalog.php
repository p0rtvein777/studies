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