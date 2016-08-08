<?php

	include 'connection.php';
		$sql = "SELECT * FROM service WHERE STATUS = 'ACTIVE'";
		
		$retrieve = $conn->query($sql)->fetchAll();
		
		if($retrieve) {
			foreach($retrieve as $row) {
				$name = $row['NAME'];
				$methodid = $row['SERVICE_ID'];
				$accountid = $row['ACCT_ID'];
				?>
					<tr style="width:100%">
						<a name="<?php echo $accountid; ?>"></a>
						<td style="width:70%;text-align:left;"><?php echo $name; ?></td>
						<td style="width:10%;text-algin:right;"><?php echo '<a href="method.php?methodid=' .$methodid. '&ref=allMethods" style="color:green;">View</a>'; ?></td>
					</tr>
				<?php
			}
		}
	
?>
