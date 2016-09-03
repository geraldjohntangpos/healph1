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
				else if($_SESSION['TYPE'] == "Client") {
						header('Location: ../promotion.php');
				}
		}

		require '../queries/connection.php';

		if(isset($_GET['accountid'])) {

				$accountid = $_GET['accountid'];

				$sql = "SELECT A.ACCT_ID, A.TYPE, H.ACCT_ID, H.HEALER_ID, H.LASTNAME, H.FIRSTNAME, H.ADDRESS, H.CONTACT, H.DETAILS, H.PICTURE, H.CLINICHOURS, H.DAILYLIMIT FROM account AS A inner join healer AS H ON A.ACCT_ID = H.ACCT_ID WHERE H.ACCT_ID = '$accountid'";

				$retrieve = $conn->query($sql)->fetchAll();

				if($retrieve) {
						foreach($retrieve as $row) {
								$name = $row['LASTNAME']. ", " .$row['FIRSTNAME'];
								$address = $row['ADDRESS'];
								$contact = $row['CONTACT'];
								$type = $row['TYPE'];
								$details = $row['DETAILS'];
								$picture = $row['PICTURE'];
								$limit = $row['DAILYLIMIT'];
								$clinichours = $row['CLINICHOURS'];
						}
				}
				else {
						header('Location: adminLogin.php');
				}
				if($type != "Healer") {
						header('Location: adminLogin.php');
				}
		}
		else {
				header('Location: loginHealer.php');
		}

		include '../queries/connection.php';
		$healerid = $_SESSION['USERID'];
		$healer_notif_count = "";

		$healersql = "SELECT * FROM appointment WHERE HEALER_ID = '$healerid' AND STATUS = 'ACTIVE'";
		$retrievenotif = $conn->query($healersql)->fetchAll();
		if($retrievenotif) {
				$count = 0;
				foreach($retrievenotif as $row) {
						$count++;
				}
				$healer_notif_count = $count;
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
				<link rel="icon" href="../assets/images/icon.png" />
				<link href="../assets/css/main.css" rel="stylesheet" />
				<script src="../bower_components/jquery/dist/jquery.min.js"></script>
				<script src="../bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
				<script src="../bower_components/wow/dist/wow.min.js"></script>
				<script src="../bower_components/jquery/dist/underscore-min.js"></script>
				<script src="../bower_components/jquery/dist/jquery.e-calendar.js"></script>
<!--				<script src="../bower_components/jquery/dist/clndr.js"></script>-->
				<script src="../bower_components/jquery/dist/calendar.js"></script>
				<link rel="stylesheet" href="../assets/css/jquery.e-calendar.css">
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
												<a href="loginHealer.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="../assets/images/logo.png" /></a>
										</div>
										<!-- navbar -->
										<div class="col-md-9 col-sm-9">
												<!-- Menu Items -->
														<div class="topUser">
																<ul class="nav navbar-nav">
																		<li>
																				<a href="profile.php?accountid=<?php echo $_SESSION['USERID']; ?>">
																						<?php echo $_SESSION['NAME']; ?> <span class="badge badge-notify"><?php echo $healer_notif_count; ?></span> </a>
																		</li>
																		<li> <a href="../queries/signout.php">SIGN-OUT</a> </li>
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
													<div id="calendar"></div>
<!--
													<script type="text/template" id="template-calendar">
														<div class="clndr-grid">
															<div class="days-of-the-week clearfix">
																<% _.each(daysOfTheWeek, function(day) { %>
																	<div class="header-day"><%= day %></div>
																<% }); %>
															</div>
															<div class="days clearfix">
																<% _.each(days, function(day) { %>
																	<div class="<%= day.classes %>" id="<%= day.id %>">
																		<span class="day-number"><%= day.day %></span>
																	</div>
																<% }); %>
															</div>
														</div>
														<div class="event-listing">
															<div class="event-listing-title">EVENTS THIS MONTH</div>
															<% _.each(eventsThisMonth, function(event) { %>
																	<div class="event-item">
																		<div class="event-item-name"><%= event.name %></div>
																		<div class="event-item-location"><%= event.location %></div>
																	</div>
																<% }); %>
														</div>
													</script>
-->
					<!--													<?php include '../queries/healercalendar.php'; ?>-->
												</p>
										</div>
										<div class="col-md-4 col-sm-4 col-md-pull-8 col-sm-8"> <img class="img-responsive wow fadeInUpBig" id="pp" src="../images/healer/<?php echo $picture; ?>" style="width: 300px; height: 300px; border-radius: 50%;" />
												<p class="wow fadeInUpBig">Healer Name:
														<?php echo $name; ?>
												</p>
												<p class="wow fadeInUpBig">Location:
														<?php echo $address; ?>
												</p>
												<p class="wow fadeInUpBig">Contact Number:
														<?php echo $contact; ?>
												</p>
												<p class="wow fadeInUpBig">Clinic Hours:
														<?php echo $clinichours; ?>
												</p>
												<p class="wow fadeInUpBig">Daily Accommodation limit:
														<?php echo $limit; ?>
												</p>
												<div>
													<a href="editprofile.php?accountid=<?php echo $accountid; ?>" style="color: green;">Edit Profile</a>
												</div>
												<div class="back hvr-grow">
														<a href="loginHealer.php"> <img src="../assets/images/back.png"></a>
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
												<ul class="wow fadeInDown">
														<table style="width: 100%;">
																<tr style="width:100%">
																		<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
																				<a href="../queries/gethealercomments.php?accountid=<?php echo $accountid; ?>&q=comments" target="iframedisp" style="with: 100%; height: 100%"> <i class="fa fa-comment" aria-hidden="true"></i>Comments </a>
																		</td>
																		<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
																				<a href="../queries/gethealercomments.php?accountid=<?php echo $accountid; ?>&q=notification" target="iframedisp" style="with: 100%; height: 100%"> <i class="fa fa-bell" aria-hidden="true"></i>Notification </a>
																		</td>
																		<td style="border:1px solid; background:darkgreen; padding: 3px; font-weight: bold; font-size: 24px;">
																				<a href="../queries/gethealercomments.php?accountid=<?php echo $accountid; ?>&q=confirmed" target="iframedisp" style="width: 100%; height: 100%"> <i class="fa fa-check" aria-hidden="true"></i>Confirmed </a>
																		</td>
																</tr>
																<tr>
																		<td colspan="3">
																				<iframe name="iframedisp" src="../queries/gethealercomments.php?accountid=<?php echo $accountid; ?>&q=comments" style="width: 100%; height: 450px;"> </iframe>
																		</td>
																</tr>
														</table>
												</ul>
										</div>
								</div>
						</div>
				</section>
				<?php include "../footer.php"; ?>
		</body>

		</html>
