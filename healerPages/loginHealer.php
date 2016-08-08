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
    <section class="healer">
        <div class="container">
            <!-- picture book review -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="wow bounceInDown">
                        <h1>What do you want to do?</h1> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a href="viewProducts.php">
                        <button class="btn btn-danger1 center-block wow bounceInRight" type="button">
                            <p>View Products</p>
                        </button>
                    </a>
                    <a href="postProducts.php">
                        <button class="btn btn-danger1 center-block wow bounceInRight" type="button">
                            <p>Post Products</p>
                        </button>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <a href="viewServices.php">
                        <button class="btn btn-danger2 center-block wow bounceInRight" type="button">
                            <p>View Services</p>
                        </button>
                    </a>
                    <a href="postServices.php">
                        <button class="btn btn-danger2 center-block wow bounceInRight" type="button">
                            <p>Post Services</p>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
