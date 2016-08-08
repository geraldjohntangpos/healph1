<?php
	session_start();
	
	include 'connection.php';

	//let's see first if this will work.
	if(isset($_GET['methodid'])) {
		$labelid = $_GET['methodid'];
	}
	
	//check if the comment was inputted.
	if(isset($_REQUEST['comment'])) {
		$comment = $_REQUEST['comment'];

		//declare the account id which is used in the session as USERID.
		$accountid = $_SESSION['USERID'];
		
		//since we need the id of the certain label, 
		//we will retrieve the client id of this loged in account.
		$sql = "SELECT * FROM client WHERE ACCT_ID = '$accountid'";
		$retrieve = $conn->query($sql)->fetchAll();

		//let's check whether data exist or not.
		if($retrieve) {
			foreach($retrieve as $row) {
				
				//get the value of CLIENT_ID
				$clientid = $row['CLIENT_ID'];
			}
		}
		
		$sql = "INSERT INTO client_feedback(COMMENT, CLIENT_ID, LABEL, LABEL_ID, DATEADDED) VALUES('$comment', '$clientid', 'method', '$labelid', NOW())";
		$insert = $conn->query($sql);
		if($insert) {
			header('Location: getmethodcomments.php?methodid='.$labelid);
		}
		else  {
			die("Error commeting.");
		}
	}
?>
<table style="width: 100%;" cellspacing="6px" >
	<?php
		if($_SESSION['TYPE'] == 'Client') {
	?>
	<tr style="width: 100%;">
		<form action="" method="post">
		<td style="width: 80%; height: 100%;">
			<input type="text" name="comment" style="width: 100%; height: 30px;" placeholder="Enter comment here" required>
		</td>
		<td style="width: 20%; padding: 1px;">
			<input type="submit" value="Send" style="width: 100%; height: 100%; background-color: darkgreen; border: 0px;">
		</td>
		</form>
	</tr>
	
	<?php
		}
		//retrieve the comments
		$sql = "SELECT * FROM client_feedback WHERE LABEL = 'method' AND LABEL_ID = '$labelid' ORDER BY DATEADDED DESC";
		$retrieve = $conn->query($sql)->fetchAll();
		if($retrieve) {
			foreach($retrieve as $row) {
				$clientid = $row['CLIENT_ID'];
				$comment = $row['COMMENT'];
				$date = $row['DATEADDED'];
				
				//get the name of the client.
				$sql2 = "SELECT * FROM client WHERE CLIENT_ID = '$clientid'";
				$retrieve2 = $conn->query($sql2)->fetchAll();
				
				if($retrieve2) {
					foreach($retrieve2 as $row2) {
						$name = $row2['LASTNAME']. ", " .$row2['FIRSTNAME'];
					}
				}
?>
	<tr style="width: 100%; min-height: 90px; background-color: #fff;">
		<td style="padding: 15px;" colspan="2"><span style="font-weight: bold; font-style: underline; font-size: 18px;"><?php echo $name; ?>:</span> <span style="font-style: italic; font-size: 18px;"><?php echo $comment; ?></span><br /><p style="font-size: 12px; line-height: 6px;"><i>Sent: <?php echo $date; ?></i></p></td>
	</tr>
				
<?php
			}
		}
		else {
?>
			<tr style="width: 100%; min-height: 90px; background-color: #fff;">
				<td style="padding: 15px;" colspan="2"><span style="font-style: italic; font-size: 18px;">No comment yet.</span></td>
			</tr>
<?php
		}
	?>
</table>
