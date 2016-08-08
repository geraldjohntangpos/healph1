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
<div class="logo">
    <a href="index.php" class="navbar-brand"><img class="img-responsive" src="assets/images/logo.png" /></a>
</div>

<body>
    <section class="login">
        <div class="container">
            <!-- picture book review -->
            <div class="row">
                <div class="col-md-2 col-sm-2"></div>
                <div class="col-md-8 col-sm-8">
                    <div id="loginForm">
                        <h1 class="wow fadeInDown">Registration Form</h1>
                        <!--            registration form    -->
                        <form class="center-block" action="queries/registration.php" method="post">
                            <!--    username-->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="username" id="username" placeholder="Username" type="text" required autofocus > </div>
														<div class="message" id="usernameMessage"></div>
                            <!--password                                -->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="password" id="password" placeholder="Password" type="Password" required > </div>
														<div class="message" id="passwordMessage"></div>
                            <!--firstname                                -->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="firstname" id="firstname" placeholder="First Name" type="text" required > </div>
														<div class="message" id="firstnameMessage"></div>
                            <!--lastname    -->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="lastname" id="lastname" placeholder="Last Name" type="text" required > </div>
														<div class="message" id="lastnameMessage"></div>
                            <!--email add-->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="emailadd" id="emailadd" placeholder="Email address" type="email" required > </div>
														<div class="message" id="emailaddMessage"></div>
                            <!--mobile number-->
                            <div class="form-group">
                                <input class="form-control wow lightSpeedIn" name="mobile" id="mobile" placeholder="Mobile number" type="number" min="9111111111" required > </div>
 														<div class="message" id="mobileMessage"></div>
                            <div class="form-group">
															<select class="form-control wow lightSpeedIn" name="type" id="type" required >
																<option value="Client">Client</option>
															</select>
														</div>
 														<div class="message" id="typeMessage"></div>
                        <input class="btn btn-danger wow fadeInLeft" id="register" type="submit" value="Submit" >
                       </form>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2"> </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="jquery/trapinput.js"></script>
</html>
