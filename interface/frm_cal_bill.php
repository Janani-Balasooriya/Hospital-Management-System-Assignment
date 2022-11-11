



<?php
require_once('../nav.php');
?>

<!doctype html>
<html>
<head>
<title>Displaying Bill</title>



<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">

<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Calculating Bill</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-3 col-form-label">Enter Patient ID</label>
		<div class="col-sm-6">
		<input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
		</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2" name="search">Search Tests  and Doctor charge</button>
</div>
</form>

<?php
if(isset($_POST['search'])){//if button is clicked
require_once('../db/connection.php');
$sql="SELECT *
FROM lab_testings
INNER JOIN  patient_testings ON  lab_testings.test_id = patient_testings.test_id WHERE patient_id='$_POST[patientid]';";
$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
				echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

		else{// if record is found

		
?>
</div>
<div class="container">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Reference Number</th>
      <th scope="col">Patient ID</th>
      <th scope="col">Test ID</th>
	  <th scope="col">Test Name</th>
      <th scope="col">Test Charge</th>
    </tr>
  </thead>
  <tbody>
<?php while($row=mysqli_fetch_assoc($result)){ ?>  
  <tr>
      <td><?php echo $row['ref_id'];?></td>
      <td><?php echo $row['patient_id'];?></td>
      <td><?php echo $row['test_id'];?></td>
	  <td><?php echo $row['test_name'];?></td>
      <td align="right"><?php echo 'Rs. '.$row['test_charge'];?></td>
    </tr>
<?php } ?>	
  </tbody>
  <tfoot>
  <tr bgcolor="aqua">
	  <td colspan="4" align="center"><b>Hospital Bill(Doctor charge+Lab testing)</b></td>
	  <td align="right"><b><?php 
	  $sql="SELECT sum(test_charge)
FROM lab_testings
INNER JOIN  patient_testings ON  lab_testings.test_id = patient_testings.test_id WHERE patient_id='$_POST[patientid]';";
$result=$conn->query($sql);		
$row=mysqli_fetch_array($result);	
$sql1="SELECT `hourly_rate`
FROM `patients`
INNER JOIN `doctors`
ON `patients`.`doctor_id` = `doctors`.`doctor_id`;";
$result1=$conn->query($sql1);
$row1=mysqli_fetch_array($result1);
		
$bill=$row[0]+$row1[0];		
	  echo 'Rs. '.$bill; ?> </b></td>
	</tr>	
  </tfoot>
</table>
</div>	
<?php
	}
	}	
?>
</body>
</html>
