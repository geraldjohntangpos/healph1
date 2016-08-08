<?php

	require 'connection.php';

	if(isset($_GET['q']) && isset($_GET['id'])) {
		$q = $_GET['q'];
		$id = $_GET['id'];
		
		if($q == "service") {
			$link = "viewServices.php";
			$sql = "UPDATE $q SET STATUS = 'INACTIVE' WHERE SERVICE_ID = '$id'";
		}
		else {
			$link = "viewProducts.php";
			$sql = "UPDATE $q SET STATUS = 'INACTIVE' WHERE PRODUCT_ID = '$id'";
		}
		
		$delete = $conn->query($sql);
		if($delete) {
			header ('Location: ../healerPages/' .$link. '?deletesuccess');
		}
		else {
			header ('Location: ../healerPages/' .$link. '?deletefailed');	
		}
		
	}
	else {
		header('Location: ../healerPages/loginHealer.php');
	}

?>
