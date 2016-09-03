<?php
	session_start();
	include 'connection.php';

	if(isset($_GET['label']) && isset($_GET['labelid']) && isset($_GET['ref'])) {
		$ref = $_GET['ref'];
		$label = $_GET['label'];
		$labelid = $_GET['labelid'];
		$likerid = $_SESSION['USERID'];
		$success = false;

		$sql = "SELECT * FROM reaction WHERE LABEL = '$label' AND LABEL_ID = '$labelid' AND LIKER_ID = '$likerid'";
		$retrieve = $conn->query($sql)->fetchAll();
		if($retrieve) {
			$sqldislike = "DELETE FROM reaction WHERE LABEL = '$label' AND LABEL_ID = '$labelid' AND LIKER_ID = '$likerid'";
			$dislike = $conn->query($sqldislike);
			if($dislike) {
				switch($label) {
					case "healer":
						$sql2 = "UPDATE healer SET RATE = RATE-1 WHERE ACCT_ID = '$labelid'";
						break;
					case "service":
						$sql2 = "UPDATE service SET RATE = RATE-1 WHERE SERVICE_ID = '$labelid'";
						break;
					case "product":
						$sql2 = "UPDATE product SET RATE = RATE-1 WHERE PRODUCT_ID = '$labelid'";
						break;
				}
				$update = $conn->query($sql2);
				if($retrieve2) {
					$success = true;
				}
				else {
					$success = false;
				}
			}
			else {
				$success = false;
			}
		}
		else {
			$sqllike = "INSERT reaction (LABEL, LABEL_ID, LIKER_ID, DATELIKED) VALUES('$label', '$labelid', '$likerid', NOW())";
			$like = $conn->query($sqllike);
			if($like) {
				switch($label) {
					case "healer":
						$sql2 = "UPDATE healer SET RATE = RATE+1 WHERE ACCT_ID = '$labelid'";
						break;
					case "service":
						$sql2 = "UPDATE service SET RATE = RATE+1 WHERE SERVICE_ID = '$labelid'";
						break;
					case "product":
						$sql2 = "UPDATE product SET RATE = RATE+1 WHERE PRODUCT_ID = '$labelid'";
						break;
				}
				$update = $conn->query($sql2);
				if($retrieve2) {
					$success = true;
				}
				else {
					$success = false;
				}
			}
			else {
				$success = false;
			}
		}
		switch($label) {
			case "healer":
				if($success) {
					header('Location: ../healer.php?accountid='.$labelid.'&ref='.$ref);
				}
				else {
					header('Location: ../healer.php?accountid='.$labelid.'&ref='.$ref.'&error');
				}

				break;

			case "product":
				if($success) {
					header('Location: ../product.php?productid='.$labelid.'&ref='.$ref);
				}
				else {
					header('Location: ../product.php?productid='.$labelid.'&ref='.$ref.'&error');
				}
				break;

			case "service":
				if($success) {
					header('Location: ../method.php?methodid='.$labelid.'&ref='.$ref);
				}
				else {
					header('Location: ../method.php?methodid='.$labelid.'&ref='.$ref.'&error');
				}
				break;
		}
	}
?>
