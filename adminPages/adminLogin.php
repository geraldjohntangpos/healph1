<?php
		session_start();

		if(!isset($_SESSION['USERID']) && !isset($_SESSION['USERNAME']) && !isset($_SESSION['NAME']) && !isset($_SESSION['TYPE'])) {
				session_destroy();
				header('Location: ../login.php?q=loginfirst');
		}
		else {
				if($_SESSION['TYPE'] == "Healer") {
						header('Location: ../healerpages/loginhealer.php');
				}
				else if($_SESSION['TYPE'] == "Client") {
						header('Location: ../promotion.php');
				}
		}
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
				<title> Home </title>
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
										<a href="../index.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="../assets/images/logo.png" /></a>
								</div>
								<!-- navbar -->
								<div class="col-md-9 col-sm-9">

												<!-- Menu Items -->
												<div class="topUser">
														<ul class="nav navbar-nav">
																<li>
																		<a href="#">
																				<?php echo $_SESSION['NAME']; ?>
																		</a>
																</li>
																<li> <a href="../queries/signout.php">SIGN-OUT</a> </li>
														</ul>
												</div>

								</div>
								</div>
						</nav>

				</div>
				<!--end nav bar-->
				<section class="admin">
						<div class="container">
								<!-- picture book review -->
								<div class="adminWrapper">
								<div class="row">
										<div class="col-md-1 col-sm-1"></div>
										<div class="col-md-10 col-sm-10">
												<div class="wow bounceInDown">
														<h1>What do you want to do?</h1>
												</div>
										</div>
										<div class="col-md-1 col-sm-1"></div>
								</div>

								<div class="row">
										<div class="col-md-12 col-sm-12">

														<button class="btn btn-danger center-block wow bounceInRight hvr-wooble-skew" type="button">
																<a href="addHealer.php">
																<p>Add Traditional Healer</p>
																</a>
														</button>

														<button class="btn btn-danger center-block wow bounceInRight" type="button">
																<a href="viewhealer.php">
																<p>Manage Traditional Healer</p>
																</a>
														</button>

														<button class="btn btn-danger center-block wow bounceInRight" type="button">
																<a href="viewinquiries.php">
																<p>Manage Inquiries</p>
																</a>
														</button>

										</div>
								</div>
								</div>
						</div>
				</section>
				<?php
						include "../footer.php";
				?>
		</body>

		</html>
