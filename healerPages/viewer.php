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

	if(isset($_GET['viewtype']) && isset($_GET['viewid'])) {
		$viewtype = $_GET['viewtype'];
		$accountid = $_SESSION['USERID'];
		$viewid = $_GET['viewid'];
		$title;

		if($viewtype == "service") {
			$title = "Service";
			$iframelink = "getmethodcomments.php?methodid=";
			$sql = "SELECT T.SRVCTYPE_ID, T.SRVCTYPE, S.SERVICE_ID, S.SRVCTYPE_ID, S.ACCT_ID, S.NAME, S.DESCRIPTION, S.PRICE, S.STATUS, S.PICTURE FROM service_type AS T INNER JOIN service AS S ON T.SRVCTYPE_ID = S.SRVCTYPE_ID WHERE S.ACCT_ID = '$accountid' AND S.SERVICE_ID = '$viewid'";

			$retrieve = $conn->query($sql)->fetchAll();
			$link = "viewServices";

			if($retrieve) {
				foreach($retrieve as $row) {
					$picture = $row['PICTURE'];
					$description = $row['DESCRIPTION'];
					$name = $row['NAME'];
					$price = $row['PRICE'];
					$theid = $row['SERVICE_ID'];
				}
			}
			else {
				header('Location: viewServices.php');
			}
			$other = "";
		}
		else {
			$title = "Product";
			$iframelink = "getproductcomments.php?productid=";
			$sql = "SELECT T.PRODTYPE_ID, T.PRODTYPE, P.PRODUCT_ID, P.PRODTYPE_ID, P.ACCT_ID, P.DESCRIPTION, P.RATE, P.STATUS, P.PICTURE, P.NAME, P.PRICE, P.QUANTITY FROM product_type AS T INNER JOIN product AS P ON T.PRODTYPE_ID = P.PRODTYPE_ID WHERE P.ACCT_ID = '$accountid' AND P.PRODUCT_ID = '$viewid'";

			$retrieve = $conn->query($sql)->fetchAll();
			$link = "viewProducts";

			if($retrieve) {
				foreach($retrieve as $row) {
					$picture = $row['PICTURE'];
					$description = $row['DESCRIPTION'];
					$name = $row['NAME'];
					$price = $row['PRICE'];
					$quantity = $row['QUANTITY'];
					$theid = $row['PRODUCT_ID'];
				}
			}
			else {
				header('Location: viewServices.php');
			}
			$other = "<p class='wow rotateInDownRight'>Products Available: " .$quantity. "pcs</p>";
		}
	}
	else {
		header('Location: loginHealer.php');
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<title><?php echo $title. "-" .$name; ?></title>
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
								<a href="loginHealer.php" class="navbar-brand"><img class="img-responsive wow slideInleft" src="../assets/images/logo.png" /></a>
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
		<!--about healer        -->
		<section class="healerPage">
				<div class="container">
						<!-- picture healer -->
						<div class="row">
								<div class="col-md-8 col-sm-8 col-md-push-4 col-sm-push-4">
										<p class="wow slideInRight"><?php echo $description; ?></p>
								</div>
								<div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-pull-8"> <img class="img-responsive wow slideInDown" src="../images/<?php echo $viewtype. "/" .$accountid. "/" .$picture; ?>" style="width: 300px; height: 300px;" />
										<p class="wow rotateInDownRight">Product Name: <?php echo $name; ?></p>
										<p class="wow rotateInDownRight">Price: P<?php echo $price; ?></p>
										<?php echo $other; ?>
										<div class="back hvr-grow">
												<a href="<?php echo $link; ?>.php"> <img src="../assets/images/back.png"></a>
										</div>
								</div>

						</div>
				</div>
		</section>
		<!--comments-->
		<section class="comments">
				<div class="container">
						<div class="row">
								<div class="col-md-12 col-sm-12">                    <h1 class="wow fadeInDown"><hr /><hr /><hr /></h1>
										<ul class="wow fadeInDown">
											<table style="width: 100%;" >
												<tr style="width:100%">
													<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
														<a href="../queries/<?php echo $iframelink.$theid; ?>&q=comments" target="iframedisp" style="with: 100%; height: 100%">
															<i class="fa fa-comment" aria-hidden="true"></i>Comments
														</a>
													</td>
													<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
														<a href="../queries/<?php echo $iframelink.$theid; ?>&q=notification" target="iframedisp" style="with: 100%; height: 100%">
															<i class="fa fa-bell" aria-hidden="true"></i>Notification
														</a>
													</td>
													<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
														<a href="../queries/<?php echo $iframelink.$theid; ?>&q=confirmed" target="iframedisp" style="width: 100%; height: 100%">
															<i class="fa fa-check" aria-hidden="true"></i>Confirmed
														</a>
													</td>
												</tr>
												<tr>
													<td colspan="3">
											<iframe name="iframedisp" src="../queries/<?php echo $iframelink.$theid; ?>&q=comments" style="width: 100%; height: 450px;">
											</iframe>
													</td>
												</tr>
											</table>

										</ul>
								</div>
						</div>
				</div>
		</section>
</body>

</html>
