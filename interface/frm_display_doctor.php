



<?php
require_once('../nav.php');
?>

<!doctype html>
<html>
<head>
<title>Viewing Patient</title>



<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/table-grid.css" rel="stylesheet" type="text/css">

<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Searching Doctor for Displaying</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-4 col-form-label">Enter Doctor ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="pd" name="doctorid" required maxlength="4"  pattern="[0-9]{4}" autofocus>
		</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2" name="search">Search Doctor</button>
</div>
</form>

<?php
if(isset($_POST['search'])){//if button is clicked
require_once('../db/connection.php');
$sql="SELECT * FROM doctors WHERE doctor_id='$_POST[doctorid]';";
$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
				echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

		else{// if record is found
			$row=mysqli_fetch_assoc($result);	
?>
</div>
<div class="container" id="grid">
<h5 align="center"  class="my">Doctor Details </h5>

  <div class="row">
    <div class="col-sm">
		<label for="pd" class="col-sm-6 col-form-label">Doctor ID</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['doctor_id'];?></label>
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
		<label  class="col-sm-6 col-form-label">Address</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['address1']."\t".$row['address2']."<br>".$row['city'] ;?></label>
    </div>
  </div>
   <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Specific Area</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['spec_area'] ;?></label>
    </div>
  </div>
    <div class="row">
    <div class="col-sm">
		<label  class="col-sm-6 col-form-label">Hourly Rate</label>
    </div>
    <div class="col-sm">
      <label  class="col-sm-6 col-form-label"><?php echo $row['hourly_rate'] ;?></label>
    </div>
  </div>
  </div>  
</div>
<?php
		}
}	
?>
</body>
</html>
