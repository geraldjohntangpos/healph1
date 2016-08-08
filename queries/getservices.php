<?php
	require_once 'connection.php';

	$accountid = $_SESSION['USERID'];

	$sql = "SELECT T.SRVCTYPE_ID, T.SRVCTYPE, S.SERVICE_ID, S.SRVCTYPE_ID, S.ACCT_ID, S.NAME, S.DESCRIPTION, S.PRICE, S.STATUS, S.PICTURE FROM service_type AS T INNER JOIN service AS S ON T.SRVCTYPE_ID = S.SRVCTYPE_ID WHERE S.ACCT_ID = '$accountid' AND S.STATUS = 'ACTIVE'";

	$retrieve = $conn->query($sql)->fetchAll();
	
	if(count($retrieve)>0) {
		foreach($retrieve as $row) {
			$servicetype = $row['SRVCTYPE'];
			$description = $row['DESCRIPTION'];
			$picture = $row['PICTURE'];
			$serviceid = $row['SERVICE_ID'];
?>
<!--        subcontent healer-->
      <div class="service-product">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 col-sm-4"> <img style="width: 150px; height: 150px;" class="img-responsive wow wobble" src="../images/service/<?php echo $accountid. "/" .$picture; ?>" /> </div>
                  <div class="col-md-4 col-sm-4">
                      <h2 class="wow fadeIn"><?php echo $servicetype; ?></h2>
                      <p class="wow fadeIn"><?php echo $description; ?></p>
                  </div>
                  <div class="col-md-4 col-sm-4">
                      <a href="../healerPages/editservice.php?serviceid=<?php echo $serviceid; ?>"><button class="btn btn-danger wow bounceInRight hvr-float" type="button">  Edit
                                   </button></a>
                      <a href="viewer.php?viewtype=service&accountid=<?php echo $accountid; ?>&viewid=<?php echo $serviceid; ?>"><button class="btn btn-danger wow bounceInRight hvr-float" type="button">  View
                                  </button></a> 
                      <a href="../queries/deleter.php?q=service&id=<?php echo $serviceid; ?>"><button class="btn btn-danger wow bounceInRight hvr-float" type="button">  Delete
                                  </button></a> 
                  </div>
              </div>
          </div>
      </div>
			<br />
<?php
		}
	}
	else {
?>
      <div class="service-product">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 col-sm-4"> <img style="width: 150px; height: 150px;" class="img-responsive wow wobble" src="../images/service/nothing.png" /> </div>
                  <div class="col-md-4 col-sm-4">
                      <h2 class="wow fadeIn">No service found!</h2>
											<p><a href="../healerPages/postServices.php">Add post service</a></p>
                  </div>
              </div>
          </div>
      </div>
			<br />
<?php
	}

?>

