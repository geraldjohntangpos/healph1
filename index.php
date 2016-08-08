<?php
	session_start();

	if(isset($_SESSION['USERID'])) {
		header('Location: promotion.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Home </title>
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
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <a href="index.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
            </div>
            <!-- navbar -->
            <div class="col-md-9 col-sm-9">
                <nav class="navbar navbar-inverse  wow bounceInUp">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mainNavBar" data-toggle="collapse" type="button"> <span class="icon-bar">
                            </span> <span class="icon-bar">
                            </span> <span class="icon-bar">
                            </span> </button>
                    </div>
                    <!-- Menu Items -->
                    <div class="collapse navbar-collapse" id="mainNavBar">
                        <ul class="nav navbar-nav">
                            <li> <a href="index.php">
                                    HOME
                                </a> </li>
                            <li> <a href="aboutus.php">
                                    ABOUT
                                </a> </li>
                            <li> <a href="contact.php">
                                    CONTACT US
                                </a> </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--end nav bar-->
    <section class="findHealer">
        <div class="container">
            <!-- picture book review -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="wow bounceInLeft">
                        <h1>Find Healer Now</h1>
                        <p>Your online buddy in finding traditional healers</p>
                    </div>
                    <a href="login.php">
                        <button class="btn btn-danger center-block wow bounceInRight" type="button">
                            LOG-IN / REGISTER
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
