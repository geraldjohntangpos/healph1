<?php
		session_start();

		if(!isset($_SESSION['USERID']) && !isset($_SESSION['USERNAME']) && !isset($_SESSION['NAME']) && !isset($_SESSION['TYPE'])) {
				session_destroy();
				header('Location: login.php?q=loginfirst');
		}
		else {
				if($_SESSION['TYPE'] == "Admin") {
						header('Location: adminPages/adminLogin.php');
				}
				else if($_SESSION['TYPE'] == "Healer") {
						header('Location: healerPages/loginHealer.php');
				}
		}

		require 'queries/connection.php';

		if(isset($_GET['accountid'])) {

				$accountid = $_GET['accountid'];

				$sql = "SELECT A.ACCT_ID, A.TYPE, C.ACCT_ID, C.CLIENT_ID, C.LASTNAME, C.FIRSTNAME, C.EMAIL_ADDRESS, C.MOBILE FROM account AS A inner join client AS C ON A.ACCT_ID = C.ACCT_ID WHERE C.ACCT_ID = '$accountid'";

				$retrieve = $conn->query($sql)->fetchAll();

				if($retrieve) {
						foreach($retrieve as $row) {
								$name = $row['LASTNAME']. ", " .$row['FIRSTNAME'];
								$emailadd = $row['EMAIL_ADDRESS'];
								$mobile = $row['MOBILE'];
								$type = $row['TYPE'];
						}
				}
				else {
						header('Location: promotion.php');
				}
				if($type != "Client") {
						header('Location: promotion.php');
				}
		}
		else {
				header('Location: promotion.php');
		}

		include 'queries/connection.php';
		$clientid = $_SESSION['USERID'];
		$client_notif_count = "";

		$healersql = "SELECT * FROM notification WHERE TYPE_ID = '$clientid' AND STATUS = 'SEEN'";
		$retrievenotif = $conn->query($healersql)->fetchAll();
		if($retrievenotif) {
				$count = 0;
				foreach($retrievenotif as $row) {
						$count++;
				}
				$client_notif_count = $count;
		}

?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
				<title>
						<?php echo $_SESSION['NAME']; ?>
				</title>
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

		<body>
				<!--      logo-->
				<div class="container bgMenu">
						<nav class="navbar1 navbar-inverse1 navbar-fixed-top  wow bounceInUp">
								<div class="row">
										<div class="col-md-3 col-sm-3">
												<a href="promotion.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
										</div>
										<!-- navbar -->
										<div class="col-md-9 col-sm-9">
												<!-- Menu Items -->
														<div class="topUser">
																<ul class="nav navbar-nav">
																		<li>
																				<a href="profile.php?accountid=<?php echo $_SESSION['USERID']; ?>">
																						<?php echo $_SESSION['NAME']; ?> <span class="badge badge-notify"><?php echo $client_notif_count; ?></span> </a>
																		</li>
																		<li> <a href="queries/signout.php">SIGN-OUT</a> </li>
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
												<p class="wow fadeInRight">
												</p>
										</div>
										<div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-8"> <img class="img-responsive wow fadeInUpBig" src="images/client/face.jpg" style="width: 300px; height: 300px;" />
												<p class="wow fadeInUpBig">Healer Name:
														<?php echo $name; ?>
												</p>
												<p class="wow fadeInUpBig">Email Address:
														<?php echo $emailadd; ?>
												</p>
												<p class="wow fadeInUpBig">Mobile:
														<?php echo $mobile; ?>
												</p>
												<p class="wow fadeInUpBig">
													<a href="editprofile.php?accountid=<?php echo $accountid; ?>">Edit Profile</a>
												</p>
												<div class="back hvr-grow">
														<a href="promotion.php"> <img src="assets/images/back.png"></a>
												</div>
										</div>
								</div>
						</div>
				</section>
				<!--comments-->
				<section class="comments">
						<div class="container">
								<div class="row">
										<div class="col-md-12 col-sm-12">
												<h1 class="wow fadeInDown"><hr /><hr /><hr /></h1>

										</div>
								</div>
						</div>
				</section>
				<?php include "footer.php"; ?>
		</body>

		</html>
