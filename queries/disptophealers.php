<?php
	include 'connection.php';

	$sql = "SELECT * FROM healer WHERE STATUS = 'ACTIVE' ORDER BY RATE DESC LIMIT 5";
	
	$retrieve = $conn->query($sql)->fetchAll();
	$slots = 5;
	
	if($retrieve) {
		foreach($retrieve as $row) {
			$name = $row['LASTNAME']. ", " .$row['FIRSTNAME'];
			$accountid = $row['ACCT_ID'];
			echo "<li><a href='healer.php?accountid=" .$accountid. "&ref=promotion' style='color:darkgreen;'>" .$name. "</a></li>";
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
		<li>No available healers yet.</li>
<?php
	}
?>
