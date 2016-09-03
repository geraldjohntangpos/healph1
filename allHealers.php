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
		<title> All Healers </title>
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
		<style>
			html,
			body {
				font-family: Arial, sans-serif;
				height: 100%;
				margin: 0;
				padding: 0;
			}

			#map {
				height: 400px;
				margin-bottom: 100px;
			}
		</style>
</head>

<body>
		<!--      logo-->
		<div class="container bgMenu">
			<nav class="navbar1 navbar-inverse1  wow bounceInUp">
				<div class="row">
						<div class="col-md-3 col-sm-3">
								<a href="index.php" class="navbar-brand"><img class="img-responsive wow slideInLeft" src="assets/images/logo.png" /></a>
						</div>
								<!-- navbar -->
								<div class="col-md-9 col-sm-9">

												<!-- Menu Items -->
												<div class="topUser">
														<ul class="nav navbar-nav">
																<li>
																		<a href="promotion.php">
																				<?php echo $_SESSION['NAME']; ?>
																		</a>
																</li>
																<li> <a>|</a> </li>
																<li> <a href="queries/signout.php">SIGN-OUT</a> </li>
														</ul>
												</div>

								</div>
				</div>
			</nav>
		</div>
		<!--end nav bar-->

<section class="deleteHealer">
				<div class="container">
<!--						delete healer-->
						<div class="row">
								<div class="col-md-1 col-sm-1"></div>
								<div class="col-md-10 col-sm-10">
										<div id="allHealers">
												<h1>Traditional Healer's List</h1>
													<div class="back2 hvr-hang">
															<a href="promotion.php">
															<img src="assets/images/back.png"></a>
													</div>
								<!--            list of healers    -->
																						<div class="listHealer wow rollIn">
																								<table style="width:100%;">
																										<?php
																												include 'queries/getallhealers.php';
																										?>
																								</table>
																						</div>
										</div>
									</div>
								<div class="col-md-1 col-sm-1"></div>
								</div>
	</div>
		</section>
	<secton class="map">
			<div class="container">
				<div class="row">
					<div class="col-md-1 col-sm-1"></div>
					<div class="col-md-10 col-sm-10">
													<!--Start Map	-->
		<div id="map"></div>
		<script>
			var map;

			var markers = [];

			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: 10.3787645, lng: 123.8462947},
					zoom: 12
				});
				//var fuente = {lat: 10.3098553, lng: 123.8887788};
				//var marker = new google.maps.Marker({
				//	position: fuente,
				//	map: map,
				//	title: 'First Marker!'
				//});
				//var infoWindow = new google.maps.InfoWindow({
				//	content: 'Sample info'
				//});
				//marker.addListener('click', function() {
				//	infoWindow.open(map, marker);
				//});
				var locations = [
					{title: 'Sample1', location: {lat: 10.3050311, lng: 123.8939624}},
					{title: 'Sample2', location: {lat: 10.304844, lng: 123.894816}},
					{title: 'Sample3', location: {lat: 10.304606450709395, lng: 123.89417946338654}},
				];
				var largeInfoWindow = new  google.maps.InfoWindow();
				var bounds = new google.maps.LatLngBounds();
				for (var i = 0; i < locations.length; i++) {
							var position = locations[i].location;
								var title = locations[i].title;
								var marker = new google.maps.Marker({
									map: map,
									position: position,
									title: title,
									animation: google.maps.Animation.DROP,
									id: i
								});

								markers.push(marker);

								marker.addListener('click', function() {
									populateInfoWindow(this, largeInfowindow);
								});
								marker.addListener('click', toggleBounce);
								bounds.extend(markers[i].position);
						}
						map.fitBounds(bounds);
			}
			function populateInfoWindow(marker, infowindow) {
						if (infowindow.marker != marker) {
								infowindow.marker = marker;
								infowindow.setContent('<div>' + marker.title + '</div>');
								infowindow.open(map, marker);

								infowindow.addListener('closeclick',function(){
									infowindow.setMarker(null);
								});
						}
					}
		function toggleBounce() {
					if (marker.getAnimation() !== null) {
						marker.setAnimation(null);
					} else {
						marker.setAnimation(google.maps.Animation.BOUNCE);
					}
	}
		</script>
		<script async defer
			src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyA9mZbQVCr0mJKNWiWn_EFqiz-S8YZxv40&v=3&callback=initMap">
		</script>
<!--End Map	-->
						</div>
					<div class="col-md-1 col-sm-1"></div>
				</div>

			</div>
		</secton>


		<?php include 'footer.php'
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
