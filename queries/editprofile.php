<?php
	session_start();
	include 'connection.php';

	$accountid = $_SESSION['USERID'];

	if(!isset($_FILES['picture'])) {
		$sched = "";
		$countdays;
		$limit = $_POST['limit'];
		if(!empty($_POST['days'])) {
			$countdays = count($_POST['days']);
			$from = $_POST['from'];
			$to = $_POST['to'];
			if($countdays==7) {
				$sched = $sched. "Everyday ";
			}
			else {
				$counter = 0;
				foreach($_POST['days'] as $key) {
					$sched = $sched. $key;
					$counter++;
					if($counter != $countdays) {
						$sched = $sched. ", ";
					}
					else {
						$sched = $sched. " ";
					}
				}
			}
			$sched = $sched. "(" .$from. " - " .$to. ")";
		}
		else {
			$sched = "24/7";
		}

		$sql = "UPDATE healer SET CLINICHOURS = '$sched', DAILYLIMIT = '$limit' WHERE ACCT_ID = '$accountid'";
	}
	else {
		$sched = "";
		$countdays;
		$limit = $_POST['limit'];
		$picture = $_FILES['picture'];
		if(!empty($_POST['days'])) {
			$countdays = count($_POST['days']);
			$from = $_POST['from'];
			$to = $_POST['to'];
			if($countdays==7) {
				$sched = $sched. "Everyday ";
			}
			else {
				$counter = 0;
				foreach($_POST['days'] as $key) {
					$sched = $sched. $key;
					$counter++;
					if($counter != $countdays) {
						$sched = $sched. ", ";
					}
					else {
						$sched = $sched. " ";
					}
				}
			}
			$sched = $sched. "(" .$from. " - " .$to. ")";
		}
		else {
			$sched = "24/7";
		}

		$target_dir = "../images/healer/";
		if(!is_dir($target_dir)) {
			mkdir($target_dir);
		}
		$target_file = $target_dir . basename($picture["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		$imageNewName;

		 if (move_uploaded_file($picture["tmp_name"], $target_file)) {
			 $imageNewName = rename($target_file, $target_dir. "healer_" .$accountid. "." .$imageFileType);
		 } else {
			 die("Error uploading file.");
		 }

		$filename = "healer_" .$accountid. "." .$imageFileType;

		$sql = "UPDATE healer SET CLINICHOURS = '$sched', PICTURE = '$filename', DAILYLIMIT = '$limit' WHERE ACCT_ID = '$accountid'";
	}

	$update = $conn->query($sql);

	if($update) {
		header('Location: ../healerPages/profile.php?accountid=' .$accountid);
	}
	else {
		die("Error adding to database.");
	}
?>
