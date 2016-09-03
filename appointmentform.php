<?php
	session_start();

	if(!isset($_SESSION['USERID']) && !isset($_SESSION['USERNAME']) && !isset($_SESSION['NAME']) && !isset($_SESSION['TYPE'])) {
		session_destroy();
		header('Location: login.php?q=loginfirst');
	}
	else {
		if($_SESSION['TYPE'] == "Admin") {
			header('Location: adminpages/adminLogin.php');
		}
		else if($_SESSION['TYPE'] == "Healer") {
			header('Location: healerPages/loginHealer.php');
		}
	}
	require 'queries/connection.php';
	$accountid = $_SESSION['USERID'];

	if(isset($_GET['id'])) {
		$accountid = $_GET['id'];
		$sql = "SELECT * FROM healer WHERE ACCT_ID = '$accountid'";

		$retrieve = $conn->query($sql)->fetchAll();

		if($retrieve) {
			foreach($retrieve as $row) {
				$name = $row['LASTNAME']. ", " .$row['FIRSTNAME'];
				$clinichours = $row['CLINICHOURS'];
				$picture = $row['PICTURE'];
			}
		}
	}
	else {
		header('Location: viewProducts.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title> New Appointment Form </title>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<link rel="icon" href="assets/images/icon.png" />
		<link href="assets/css/main.css" rel="stylesheet" />
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
		<script src="bower_components/wow/dist/wow.min.js"></script>
		<script>
				new WOW().init();
		</script>
</head>

<body class="addHealer">
		<!--      logo-->
		<div class="container">
				<div class="row">
						<div class="col-md-3 col-sm-3">
								<a href="loginHealer.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
						</div>
						<!-- navbar -->
						<div class="col-md-9 col-sm-9">
								<nav class="navbar navbar-inverse  wow bounceInUp">
										<!-- Menu Items -->
										<div class="topUser">
												<ul class="nav navbar-nav">
														<li>
															<a href="profile.php?accountid=<?php echo $_SESSION['USERID']; ?>"><?php echo $_SESSION['NAME']; ?></a>
														</li>
														<li>
															<a href="queries/signout.php">SIGN-OUT</a>
														</li>
												</ul>
										</div>
								</nav>
						</div>
				</div>
		</div>
		<!--end nav bar-->
		<section class="login">
				<div class="container">
						<!-- picture book review -->
						<div class="row">
								<div class="col-md-2 col-sm-2"></div>
								<div class="col-md-8 col-sm-8">
										<div id="loginForm">
												<h1 class="wow slideInDown">New Appointment Form</h1>
												<!--            registration form    -->
												<form class="center-block" action="queries/addappointment.php" method="post">
														<!--    Service id-->
														<div class="form-group">
																Healer's ID
																<input class="form-control wow lightSpeedIn" id="accountid" name="accountid" value="<?php echo $accountid; ?>" placeholder="Account ID" type="text" required readonly > </div>
														<div class="message" id="hidMessage"></div>
														<!--    name-->
														<div class="form-group">
																Healer's Name
																<input class="form-control wow lightSpeedIn" id="healername" name="healername" value="<?php echo $name; ?>" placeholder="Name of Service" type="text" required readonly > </div>
														<div class="message" id="healernameMessage"></div>
														<!--price-->
														<div class="form-group">
																Clinic Hours
																<input class="form-control wow lightSpeedIn" value="<?php echo $clinichours; ?>" id="clinichours" name="clinichours" placeholder="Clinic hours" type="text" required readonly > </div>
														<div class="message" id="clinichoursMessage"></div>
														<!--quantity-->
														<div class="form-group">
																Appointed Date
																<input class="form-control wow lightSpeedIn" value="" id="appointeddate" name="appointeddate" placeholder="Appointed Date" type="date" required > </div>
														<div class="message" id="adMessage"></div>
												<!--button submit-->
												<input class="btn btn-danger wow bounceInRight hvr-grow" type="submit" id="submit" value="Submit" />
												</form>
												<div class="back2 hvr-float">
														<a href="healer.php?accountid=<?php echo $accountid; ?>&ref=promotion"> <img src="assets/images/back.png"></a>
												</div>
										</div>
								</div>
								<div class="col-md-2 col-sm-2"> </div>
						</div>
				</div>
		</section>
</body>
</html>
