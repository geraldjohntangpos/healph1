<?php
	include 'connection.php';

	$sql = "SELECT * FROM product WHERE STATUS = 'ACTIVE' ORDER BY RATE DESC LIMIT 5";
	
	$retrieve = $conn->query($sql)->fetchAll();
	$slots = 5;
	
	if($retrieve) {
		foreach($retrieve as $row) {
			$name = $row['NAME'];
			$productid = $row['PRODUCT_ID'];
			echo "<li><a href='product.php?productid=" .$productid. "&ref=promotion' style='color:darkgreen;'>" .$name. "</a></li>";
			$slots--;
		}
		if($slots!=0) {
			while($slots!=0) {
				echo "<li>N/A</li>";
				$slots--;
			}
		}
	}
	else {
?>
		<li>No available products yet.</li>
<?php
	}
?>
