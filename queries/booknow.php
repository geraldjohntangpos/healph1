<?php

	session_start();
	include 'connection.php';

	if(isset($_GET['id']) && isset($_GET['ref'])) {
		
		$methodid = $_GET['id'];
		$ref = $_GET['ref'];
		$clientid = $_SESSION['USERID'];
		
		//Check if the id sent really existed in the database.
		$sql = "SELECT * FROM service WHERE SERVICE_ID = '$methodid' AND STATUS = 'ACTIVE'";
		
		$retrieve = $conn->query($sql)->fetchAll();
		
		if($retrieve) {
			foreach($retrieve as $row) {
				$healerid = $row['ACCT_ID'];
			}
			
			$sql = "SELECT * FROM booking WHERE CLIENT_ID = '$clientid' AND HEALER_ID = '$healerid' AND SERVICE_ID = '$methodid' AND STATUS = 'ACTIVE'";
			
			$check = $conn->query($sql)->fetchAll();
			
			if($check) {
				header('Location: ../method.php?methodid=' .$methodid. '&ref=' .$ref. '&bookingexisted');
			}
			else {
				$sql = "INSERT INTO booking(CLIENT_ID, HEALER_ID, SERVICE_ID, DATEADDED) VALUES('$clientid', '$healerid', '$methodid', NOW())";

				$insert = $conn->query($sql);

				if($insert) {
					$sql = "SELECT * FROM booking WHERE CLIENT_ID = '$clientid' AND HEALER_ID = '$healerid' AND SERVICE_ID = '$methodid' AND STATUS = 'ACTIVE'";
					$retrievebooking = $conn->query($sql)->fetchAll();
					if($retrievebooking) {
						foreach($retrievebooking as $row) {
							$bookingid = $row['BOOKING_ID'];
							$dateadded = $row['DATEADDED'];
						}
					}
					$sql = "INSERT INTO notification (NOTIF_OWNER, TYPE, TYPE_ID, NOTIFDATE) VALUES('$healerid', 'booking', '$bookingid', '$dateadded')";
					$insertnotif = $conn->query($sql);
					if($insertnotif) {
						header('Location: ../method.php?methodid=' .$methodid. '&ref=' .$ref. '&booksuccess');
					}
				}
				else {
					die('Error booking!');
				}
			}
			
		}
		else {
			header('Location: ../promotion.php');
		}
		
	}
	else {
		header('Location: ../promotion.php');
	}

?>
