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
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Trending Methods </title>
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
                <a href="promotion.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
            </div>
            <!-- navbar -->
            <div class="col-md-9 col-sm-9">
                <nav class="navbar navbar-inverse  wow bounceInUp">
                    <!-- Menu Items -->
                    <div class="topUser">
                        
											<div class="dropdown">
															<button onclick="myFunction()" class="dropbtn">Menu</button>
															<div id="myDropdown" class="dropdown-content"> <a href="allHealers.php">All Healers</a> <a href="allMethods.php">All Methods</a> <a href="allProducts.php">All Products</a> </div>
                    		</div>
												
												<ul class="nav navbar-nav">
														<li>
															<a>|</a>
														</li>
														<li>
															<a href="promotion.php"><?php echo $_SESSION['NAME']; ?></a>
														</li>
														<li>
															<a>|</a>
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
    <!--search box-->
    <section class="searchBox">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5"> </div>
                <div class="col-md-5 col-sm-5"> </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <input class="form-control wow lightSpeedIn" id="email" placeholder="Search" type="text"> </div>
                </div>
            </div>
        </div>
    </section>
    <!--end search box        -->
<section class="deleteHealer">
        <div class="container">
            <!-- picture book review -->
            <div class="row">
                <div class="col-md-2 col-sm-2"></div>
                <div class="col-md-8 col-sm-8">
                    <div id="loginForm">
                        <h1>Traditional Method's List</h1>
                          <div class="back2 hvr-hang">
                              <a href="promotion.php">
                              <img src="assets/images/back.png"></a>
                          </div>
				<!--            list of healers    -->
											<div class="listHealer wow rollIn">
												<table style="width:100%;">
													<?php
														include 'queries/getallmethods.php';
													?>
												</table>
											</div>
                    </div>
                  </div>
                <div class="col-md-2 col-sm-2"> </div>


            </div>
        </div>
    </section>
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
