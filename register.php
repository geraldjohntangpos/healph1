<?php
		session_start();

		if(isset($_SESSION['USERID']) && isset($_SESSION['USERNAME']) && isset($_SESSION['NAME']) && isset($_SESSION['TYPE'])) {
				if($_SESSION['TYPE'] == "Client") {
						header('Location: promotion.php');
				}
				else if($_SESSION['TYPE'] == "Healer") {
						header('Location: healerpages/loginhealer.php');
				}
				else {
						header('Location: adminPages/adminLogin.php');
				}
		}

?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
				<title> Registration </title>
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
				<section class="register">
						<div class="container">
								<!-- picture book review -->
								<div class="row">
										<div class="col-md-2 col-sm-2"></div>
										<div class="col-md-8 col-sm-8">
												<div id="registerForm">
														<div class="wrapForm">
																<h1 class="wow fadeInDown">Registration Form</h1>
																<!--            registration form    -->
																<form class="center-block" action="queries/registration.php" method="post">
																		<div class="row">
																			<div class="col-md-6 col-sm-6">

																				<!--    username-->
																				<input class="form-control wow lightSpeedIn" name="username" id="username" placeholder="Username" type="text" required autocomplete="off" autofocus>
																				<div class="message" id="usernameMessage"></div>
																			</div>
																				<!--password                                -->
																			<div class="col-md-6 col-sm-6">
																				<input class="form-control wow lightSpeedIn" name="password" id="password" placeholder="Password" type="Password" required>
																				<div class="message" id="passwordMessage"></div>
																			</div>
																		</div>

<!--																		check lng-->
																	<div class="row">
																		<div class="col-md-6 col-sm-6">
																				<!--firstname                                -->
																				<input class="form-control wow lightSpeedIn" name="firstname" id="firstname" placeholder="First Name" type="text" required>
																				<div class="message" id="firstnameMessage"></div>
																		</div>
																		<div class="col-md-6 col-sm-6">
																					<!--lastname    -->
																				<div class="form-group">
																						<input class="form-control wow lightSpeedIn" name="lastname" id="lastname" placeholder="Last Name" type="text" required>
																						<div class="message" id="lastnameMessage"></div>
																				</div>
																		</div>

<!--																		laen-->
																		<div class="row">
																			<div class="col-md-6 col-sm-6">
																				<!--email add-->
																				<input class="form-control wow lightSpeedIn" name="emailadd" id="emailadd" placeholder="Email address" type="email" required>
																				<div class="message" id="emailaddMessage"></div>
																			</div>

																			<!--mobile number-->
																			<div class="col-md-6 col-sm-6">
																					<input class="form-control wow lightSpeedIn" name="mobile" id="mobile" placeholder="Mobile number" type="number" min="9111111111" required>
																						<div class="message" id="mobileMessage"></div>
																						<select class="form-control wow lightSpeedIn" name="type" id="type" required>
																								<option value="Client">Client</option>
																						</select>
																			</div>
																		<div class="message" id="typeMessage"></div>
																			<div class="col-md-6 col-sm-6">
																				<input type="checkbox" name="accepteula" id="accepteula">
																				<label for="accepteula">I agree with the End User Liscence Agreement</label>
																			</div>
																		<input class="btn btn-danger wow fadeInLeft" id="register" type="submit" value="Submit">
																		</div>
																			</div>
																		</div>


																</form>
																		<p> Already have an account?</p>
																		<p><a href="login.php">Log-in Here</a></p>
														</div>
												</div>
										</div>
										<div class="col-md-2 col-sm-2"></div>
								</div>
						</div>
				</section>
		</body>
		<script type="text/javascript" src="jquery/trapinput.js"></script>

		</html>
