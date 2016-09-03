<?php
	session_start();

	if(!isset($_SESSION['USERID']) && !isset($_SESSION['USERNAME']) && !isset($_SESSION['NAME']) && !isset($_SESSION['TYPE'])) {
		session_destroy();
		header('Location: ../login.php?q=loginfirst');
	}
	else {
		if($_SESSION['TYPE'] == "Admin") {
			header('Location: ../adminpages/adminLogin.php');
		}
		else if($_SESSION['TYPE'] == "Client") {
			header('Location: ../promotion.php');
		}
	}
	require '../queries/connection.php';
	$accountid = $_SESSION['USERID'];

	if(isset($_GET['accountid'])) {
		$accountid = $_GET['accountid'];
		$sql = "SELECT * FROM healer WHERE ACCT_ID = '$accountid'";

		$retrieve = $conn->query($sql)->fetchAll();

		if($retrieve) {
			foreach($retrieve as $row) {
				$picture = $row['PICTURE'];
				$healerid = $row['HEALER_ID'];
			}
		}
	}
	else {
		header('Location: loginHealer.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title> Edit Profile - <?php echo $_SESSION['NAME']; ?> </title>
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

<body class="addHealer">
		<!--      logo-->
		<div class="container">
				<div class="row">
						<div class="col-md-3 col-sm-3">
								<a href="loginHealer.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="../assets/images/logo.png" /></a>
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
															<a href="../queries/signout.php">SIGN-OUT</a>
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
												<h1 class="wow slideInDown">Edit Profile</h1>
												<!--            registration form    -->
												<form class="center-block" action="../queries/editprofile.php" method="post" enctype="multipart/form-data" >
														<!--    Service id-->
														<div class="form-group">
																<input class="form-control wow lightSpeedIn" id="productid" name="productid" value="<?php echo $healerid; ?>" placeholder="Healer ID" type="text" required readonly > </div>
														<div class="message" id="sidMessage"></div>
														<!--    name-->
														<div class="form-group">
															Shedule:<br />
																	<input type="checkbox" name="frequency[]" value="Everyday" id="everyday" ><label for="everyday">Everyday</label><br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Monday" id="monday" >
																<label for="monday"> Monday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Tuesday" id="tuesday" >
																<label for="tuesday"> Tuesday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Wednesday" id="wednesday" >
																<label for="wednesday"> Wednesday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Thursday" id="thursday" >
																<label for="thursday"> Thursday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Friday" id="friday" >
																<label for="friday"> Friday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Saturday" id="saturday" >
																<label for="saturday"> Saturday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
															<input type="checkbox" name="days[]" value="Sunday" id="sunday" >
																<label for="sunday"> Sunday</label>
															<br />
																&nbsp;&nbsp;&nbsp;
																<span class="req" style="color: #f00"></span>From:
																<input type="time" name="from" >
																&nbsp;&nbsp;&nbsp;
																<span class="req" style="color: #f00"></span>To: <input type="time" name="to" >
															<br />
														<div class="message" id="timeMessage">*If schedule not specified, default time would be 24/7.</div>
														<!--                    caption of product-->

														<!-- Set daily limit appointments -->
														<div class="form-group">
																<input class="form-control wow lightSpeedIn" value="" id="limit" name="limit" placeholder="Daily appointments limit" type="number" required > </div>
														<div class="message" id="limitMessage"></div>
														<!-- End set daily limit appointments -->

														<!--upload picture-->
														<div class="form-group">
															<img src="../images/healer/<?php echo $picture; ?>" style="width: 90px; height: 90px;" />
															Edit picture? <input type="radio" name="confirmedit" onclick="checkSelected(this.value)" id="yes" value="Yes"><label for="yes">Yes</label>
															<input type="radio" name="confirmedit" onclick="checkSelected(this.value)" id="no" value="No" checked ><label for="no">No</label>
															<input class="form-control wow lightSpeedIn" type="file" name="picture" value="" id="picture" disabled required />
														</div>
														<div class="message" id="pictureMessage"></div>
												<!--button submit-->
												<input class="btn btn-danger wow bounceInRight hvr-grow" type="submit" id="submit" value="Submit" />
												</form>
												<div class="back2 hvr-float">
														<a href="profile.php?accountid=<?php echo $accountid; ?>"> <img src="../assets/images/back.png"></a>
												</div>
										</div>
								</div>
								<div class="col-md-2 col-sm-2"> </div>
						</div>
				</div>
		</section>
</body>
<script type="text/javascript" src="../jquery/profiletraps.js"></script>
</html>
