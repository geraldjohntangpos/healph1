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

	include 'queries/connection.php';

	//	Check if the get variables are set.

	if(isset($_GET['methodid']) && isset($_GET['ref'])) {
		$methodid = $_GET['methodid'];
		$ref = $_GET['ref'];
		$backlink;
		
		//		Check if the variable ref is recognized.
		
		if($ref == "promotion") {
			$backlink = $ref;
		}
		else if($ref == "allMethods") {
			$backlink = $ref;
		}
		else {

			//			if not recognized.
			
			$backlink = "promotion";
		}

		//		fetch the method if it exist.
		
		$sql = "SELECT S.ACCT_ID, S.SERVICE_ID, S.PICTURE, S.NAME, S.DESCRIPTION, S.PRICE, S.SRVCTYPE_ID, T.SRVCTYPE_ID, T.SRVCTYPE FROM service AS S INNER JOIN service_type AS T ON S.SRVCTYPE_ID = T.SRVCTYPE_ID WHERE SERVICE_ID = '$methodid'";
		$retrieve = $conn->query($sql)->fetchAll();
		if($retrieve) {
			foreach($retrieve as $row) {
				//fetch the data of a certain method.
				$accountid = $row['ACCT_ID'];
				$picture = $row['PICTURE'];
				$details = $row['DESCRIPTION'];
				$name = $row['NAME'];
				$price = $row['PRICE'];
				$type = $row['SRVCTYPE'];
			}
		}
		else {

			//			if method does not exist.
			
			header('Location: ' .$backlink. '.php');
		}
	}
	else {

		//		if get variables are not set.
		
		header('Location: promotion.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Method </title>
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
                        <ul class="nav navbar-nav">
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
    <!--about method        -->
    <section class="healerPage">
        <div class="container">
            <!-- picture method -->
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-push-4 col-sm-4">

                        <p class="wow fadeInRight"><?php echo $details; ?></p>

                </div>
                <div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-8"> <img class="img-responsive wow fadeInUpBig" src="images/service/<?php echo $accountid. "/" .$picture; ?>" style="width: 300px; height: 300px;" />
                        <p class="wow fadeInUpBig">Method Name: <?php echo $name; ?></p>
                        <p class="wow fadeInUpBig">Method Type: <?php echo strtoupper($type); ?></p>
                        <p class="wow fadeInUpBig">Price: <?php echo $price; ?></p>

                    <div class="back hvr-grow">
                        <a href="<?php echo $backlink; ?>.php"> <img src="assets/images/back.png"></a>
                    </div>
												<a href="" style="padding 15px; font-size:24px;">Book Now</a>
                </div>

            </div>
        </div>
    </section>
    <!--comments-->
    <section class="comments">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="wow fadeInDown">Comments</h1>
                    <ul class="wow fadeInDown">
											<iframe src="queries/getmethodcomments.php?methodid=<?php echo $methodid; ?>" style="width: 450px; height: 450px;">
											
											</iframe>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
