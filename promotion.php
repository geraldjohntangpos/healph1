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
								else if($_SESSION['TYPE'] == "Admin") {
												header('Location: adminpages/adminlogin.php');
								}
								else {
									$accountid = $_SESSION['USERID'];
								}
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
						<div class="row">
								<div class="col-md-3 col-sm-3">
										<a href="index.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
								</div>
								<!-- navbar -->
								<div class="col-md-9 col-sm-9">
										<nav class="navbar1 navbar-inverse1  wow bounceInUp">
												<!-- Menu Items -->
												<div class="topUser">
														<ul class="nav navbar-nav">
																<div class="dropdown">
																		<button onclick="myFunction()" class="dropbtn" style="color:white">Menu<span class="caret"></span></button>
																		<div id="myDropdown" class="dropdown-content"> <a href="allHealers.php">All Healers</a> <a href="allMethods.php">All Methods</a> <a href="allProducts.php">All Products</a> </div>
																</div>
																<li>
																		<a href="profile.php?accountid=<?php echo $accountid; ?>">
																				<?php echo $_SESSION['NAME']; ?>
																		</a>
																</li>
																<li> <a>|</a> </li>
																<li> <a href="queries/signout.php">SIGN-OUT</a> </li>
														</ul>
												</div>
										</nav>
								</div>
						</div>
				</div>
				<!--end nav bar-->
				<section class="trending1">
						<div class="container">
								<div class="row">
										<div class="col-md-12 col-sm-12">
												<h1 class="wow tada">Trending Now!</h1>
										</div>
								</div>
				<div class="trending">
						<div class="row">
										<div class="col-md-4 col-sm-4">
												<!--                        trending healers-->
												<div class="trendWrap">
														<h2 class="wow rollIn">Trending Healers</h2>
																<ul class="wow tada">
																		<?php
																				include 'queries/disptophealers.php';
																		?>
																</ul>
												</div>
										</div>
										<!--                        trending methods-->
										<div class="col-md-4 col-sm-4">
												<div class="trendWrap">
														<h2 class="wow rollIn">Trending Methods</h2>
																<ul class="wow tada">
																		<?php
																				include 'queries/disptopmethods.php';
																		?>
																</ul>
												</div>
										</div>
										<!--                        trending products-->
										<div class="col-md-4 col-sm-4">
												<div class="trendWrap">
														<h2 class="wow rollIn">Trending Products</h2>
																<ul class="wow tada">
																		<?php
																				include 'queries/disptopproducts.php';
																		?>
																</ul>
												</div>
										</div>
							 </div>
						</div>
				</div>
		</section>

				<?php
				include 'footer.php';
?>
				<!--script-->
				<script>
						function myFunction() {
								document.getElementById("myDropdown").classList.toggle("show");
						}
						//    closing the menu
						window.onclick = function (event) {
								if (!event.target.matches('.dropbtn')) {
										var dropdowns = document.getElementsByClassName("dropdown-content");
										var i;
										for (i = 0; i < dropdowns.length; i++) {
												var openDropdown = dropdowns[i];
												if (openDropdown.classList.contains('show')) {
														openDropdown.classList.remove('show');
												}
										}
								}
						}
				</script>
				<!--end script-->
		</body>

		</html>
