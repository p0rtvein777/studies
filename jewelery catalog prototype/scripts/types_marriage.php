<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="categories.css">
<title>Jewelery catalog</title>
</head>
<body>
<h1>
	Silver Rush marriage jewelery
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql = "SELECT * FROM bracelets WHERE category_id = 'mrg' 
				UNION 
				SELECT * FROM earrings WHERE category_id = 'mrg' 
				UNION 
				SELECT * FROM necklace WHERE category_id = 'mrg' 
				UNION 
				SELECT * FROM rings WHERE category_id = 'mrg'";
		$getResult = $conn->prepare($sql);
		$getResult->execute();
		$result = $getResult->fetchAll();

		$counter = 0;

      	echo "
      	<table align='center'>
    			<th>ID</th>
    			<th>Price</th>
    			<th>Size</th>
    			<th>Info</th>";
			foreach($result as $row) {
				if($counter == 0 || $counter == 2)
				{
					echo "
							<tr>
								<td>".$row['id']."</td>
					        	<td>".$row['price']."</td>
					        	<td>".$row['length']."</td>
					        	<td>".$row['info']."</td>
					        </tr>";
				}			        
			    if($counter == 1 || $counter == 3) {
			    	echo "
							<tr>
								<td>".$row['id']."</td>
					        	<td>".$row['price']."</td>
					        	<td>".$row['weight']."</td>
					        	<td>".$row['info']."</td>
					        </tr>";
				}

			}
			echo"</table>";
      	  ?>
</body>
</html>