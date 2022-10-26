




<?php
require_once('../nav.php');
?>
<!doctype html>
<html>
<head>
<title>Displaying Patient</title>



<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">

<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Searching Patient for Displaying</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-6 col-form-label">Enter Patient ID</label>
		<div class="col-sm-6">
		<input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
		</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2" name="search">Search Patient</button>
</div>
</form>

<?php
if(isset($_POST['search'])){//if button is clicked
require_once('../db/connection.php');
$sql="SELECT * FROM patients WHERE patient_id='$_POST[patientid]';";
$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
				echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

		else{// if record is found
			$row=mysqli_fetch_assoc($result);	
?>
</div>
<div class="container main_div" id="grid">
<h5 align="center"  id="head">Patient Details </h5>

<!--
  <div class="row">
    <div class="col-sm">
		<label for="pd" class="col-sm-6 col-form-label">Patient ID</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['patient_id'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">First Name</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['first_name'];?></label>
    </div>
  </div> 
  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Middle Name</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['middle_name'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Last Name</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['last_name'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Gender</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php if($row['gender']==1)  echo 'Male'; else echo 'Female';?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Age</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['age'];?></label>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Address</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['address1']."\t".$row['address2']."<br>".$row['city'] ;?></label>
    </div>
  </div>
   <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Disease</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['disease'] ;?></label>
    </div>
  </div>
    <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Assigned Doctor</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['doctor_id'] ;?></label>
    </div>
  </div>
      <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Admission Date and Time</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['admit_date_time'] ;?></label>
    </div>
  </div>
-->
	
<!--table goes here-->
		<table class="table table-striped">
  <tbody>
    <tr>
      <th scope="row">Patient ID</th>
      <td><?php echo $row['patient_id'];?></td>
    </tr>
    <tr>
      <th scope="row">First Name</th>
      <td><?php echo $row['first_name'];?></td>
    </tr>
    <tr>
      <th scope="row">Middle Name</th>
      <td><?php echo $row['middle_name'];?></td>
    </tr>
	  <tr>
      <th scope="row">Last Name</th>
      <td><?php echo $row['last_name'];?></td>
    </tr>
	  <tr>
      <th scope="row">Gender</th>
      <td><?php if($row['gender']==1)  echo 'Male'; else echo 'Female';?></td>
    </tr>
	  <tr>
      <th scope="row">Age</th>
      <td><?php echo $row['age'];?></td>
    </tr>
	  <tr>
      <th scope="row">Address</th>
      <td><?php echo $row['address1']."\t".$row['address2']."<br>".$row['city'] ;?></td>
    </tr>
	  <tr>
      <th scope="row">Disease</th>
      <td><?php echo $row['disease'] ;?></td>
    </tr>
	  <tr>
      <th scope="row">Assigned doctor</th>
      <td><?php echo $row['doctor_id'] ;?></td>
    </tr>
	  <tr>
      <th scope="row">Admission date and time</th>
      <td><?php echo $row['admit_date_time'] ;?></td>
    </tr>
  </tbody>
</table>
	
  </div>  
</div>
<?php
		}
}	
?>
	
	

	
</body>
</html>
