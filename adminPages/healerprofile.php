<?php
	session_start();

	if(!isset($_SESSION['USERID']) && !isset($_SESSION['USERNAME']) && !isset($_SESSION['NAME']) && !isset($_SESSION['TYPE'])) {
		session_destroy();
		header('Location: login.php?q=loginfirst');
	}
	else {
		if($_SESSION['TYPE'] == "Healer") {
			header('Location: healerpages/loginhealer.php');
		}
		else if($_SESSION['TYPE'] == "Client") {
			header('Location: ../promotion.php');
		}
	}

	require '../queries/connection.php';

	if(isset($_GET['accountid'])) {

		$accountid = $_GET['accountid'];

		$sql = "SELECT A.ACCT_ID, A.TYPE, H.ACCT_ID, H.HEALER_ID, H.LASTNAME, H.FIRSTNAME, H.ADDRESS, H.CONTACT, H.PICTURE, H.DETAILS FROM account AS A inner join healer AS H ON A.ACCT_ID = H.ACCT_ID WHERE H.ACCT_ID = '$accountid'";

		$retrieve = $conn->query($sql)->fetchAll();

		if($retrieve) {
			foreach($retrieve as $row) {
				$name = $row['LASTNAME']. ", " .$row['FIRSTNAME'];
				$address = $row['ADDRESS'];
				$contact = $row['CONTACT'];
				$picture = $row['PICTURE'];
				$type = $row['TYPE'];
				$details = $row['DETAILS'];
			}
		}
		else {
			header('Location: adminLogin.php');
		}
		if($type != "Healer") {
			header('Location: adminLogin.php');
		}
	}
	else {
		header('Location: adminLogin.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title> Healer </title>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<link rel="icon" href="../assets/images/icon.png" />
		<link href="../assets/css/main.css" rel="stylesheet" />
		<script src="../bower_components/jquery/dist/jquery.min.js"></script>
		<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
		<script src="../bower_components/wow/dist/wow.min.js"></script>
		<script>
				new WOW().init();
		</script>
</head>

<body>
		<!--      logo-->
		<div class="container bgMenu">
			<nav class="navbar1 navbar-inverse1 navbar-fixed-top  wow bounceInUp">
				<div class="row">
						<div class="col-md-3 col-sm-3">
								<a href="promotion.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="../assets/images/logo.png" /></a>
						</div>
						<!-- navbar -->
						<div class="col-md-9 col-sm-9">

										<!-- Menu Items -->
										<div class="topUser">
												<ul class="nav navbar-nav">
														<li>
															<a href="#"><?php echo $_SESSION['NAME']; ?></a>
														</li>
														<li>
															<a href="../queries/signout.php">SIGN-OUT</a>
														</li>
												</ul>
										</div>

						</div>
				</div>
			</nav>
		</div>
		<!--end nav bar-->
		<!--about healer        -->
		<section class="healerPage">
				<div class="container">
						<!-- picture healer -->
						<div class="row">
								<div class="col-md-8 col-sm-8 col-md-push-4 col-sm-4">

												<p class="wow fadeInRight"><?php echo $details; ?></p>

								</div>
								<div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-8"> <img class="img-responsive wow fadeInUpBig" src="../images/healer/<?php echo $picture; ?>" />
												<p class="wow fadeInUpBig">Healer Name: <?php echo $name; ?></p>
												<p class="wow fadeInUpBig">Location: <?php echo $address; ?></p>
												<p class="wow fadeInUpBig">Contact Number: <?php echo $contact; ?></p>

										<div class="back hvr-grow">
												<a href="viewhealer.php"> <img src="../assets/images/back.png"></a>
										</div>
								</div>

						</div>
				</div>
		</section>

	<?php include "../footer.php";?>
</body>

</html>
