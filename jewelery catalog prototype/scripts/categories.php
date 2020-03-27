<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="categories.css">
<title>Jewelery catalog</title>
</head>
<body>
<h1>
	Silver Rush categories
</h1>
    <?php
    	$conn = new PDO("mysql:host=localhost;dbname=juvelir", "dbwebreg", "mysqlweb");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	$sql = "SELECT * FROM categories";
		$getResult = $conn->prepare($sql);
		$getResult->execute();
		$result = $getResult->fetchAll();
	
       echo "
       <table align='center'>
    		<th>id</th>
    		<th>Category</th>";
		foreach($result as $row) {
		echo "
				<tr>
					<td>".$row['id']."</td>
					<td>".$row['category']."</td>
		        </tr>";}
		echo"</table>";
        ?>
<h2>
	Everyday
	<p><br>We create jewelery to suit your beaty in everyday life. Choose rings, bracelets, earrings and necklaces to help you shine even more every day!<br><br></p>
</h2>
<h2>
	Marriage
	<p><br>Marriage is one of the most important moments in our life. We create first-class jewelery so you can edge this outstanding moment in silver shining.<br><br></p>
</h2>
<h2>
	Special
	<p><br>Best jewelery for your special occasions! Your closest's happy birthday? Special date? You need a jewelery piece to outline this moment? We can propose a wide variety of jewelery to help you out.</p>
</h2>
</body>
</html>