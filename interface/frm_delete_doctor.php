



<?php
require_once('../nav.php');
?>
<!doctype html>
<html>



<head>
<title>Deleting Doctor</title>



<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">

<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Searching Doctor for Deleting</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-4 col-form-label">Enter Doctor ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="pd" name="doctorid" required maxlength="4"  autofocus>
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
<div class="container" id="myform">
<h5 align="center" class="my">Doctor Details</h5>
<form action="../db/delete_doctor.php" method="post">

<div class="form-group row">
		<label for="dd" class="col-sm-4 col-form-label" class="sr-only">Enter Doctor ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="dd" name="doctorid" required maxlength="4"  pattern="[0-9]{4}" autofocus readonly value="<?php echo $row['doctor_id'];?>" >
		</div>
</div>

<div class="form-group row">
		<label for="fn" class="col-sm-4 col-form-label">Enter First Name</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="fn" name="fname" required maxlength="15"  pattern="[a-zA-Z]+" value="<?php echo $row['first_name'];?>" disabled >
		</div>
</div>

<div class="form-group row">
		<label for="ln" class="col-sm-4 col-form-label">Enter Last Name</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="ln" name="lname"  maxlength="25"  pattern="[a-zA-Z]+" required value="<?php echo $row['last_name'];?>" disabled>
		</div>
</div>
<div class="form-group row">
		<label for="dob" class="col-sm-4 col-form-label">Choose your Date of Birth</label>
		<div class="col-sm-8">
		<input class="form-control" type="date" id="dob" name="dob" required value="<?php echo $row['dob'];?>" disabled>
		</div>
</div>

<div class="form-group row">
<label for="dob" class="col-sm-4 col-form-label">Choose your Gender</label>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?php if($row['gender']==1) echo 'checked' ?> disabled>
  <label class="form-check-label" for="male"  >Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="female" value="0" <?php if($row['gender']==0) echo 'checked' ?> disabled>
  <label class="form-check-label" for="female">Female</label>
</div>
</div>
</div>

<div class="form-group row">
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="ad1">Address1</label>
  <input  type="text" name="address1" id="ad1" required class="form-control" value="<?php echo $row['address1'];?>"  disabled>
</div>
</div>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="ad2">Address2</label>
  <input  type="text" name="address2" id="ad2" class="form-control" value="<?php echo $row['address2'];?>" disabled>
</div>
</div>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="c">City</label>
  <input  type="text" name="city" id="c" required class="form-control" value="<?php echo $row['city'];?>" disabled>
</div>
</div>
</div>

<div class="form-group row">
<label for="ln" class="col-sm-4 col-form-label">Details about Doctor</label>
<div class="col-sm-8">
	<textarea class="form-control" name="spec_area" rows="4"  cols="75" required disabled><?php echo $row['spec_area'];?></textarea>
</div>
</div>

<div class="form-group row">
<label for="hr" class="col-sm-4 col-form-label">Hourly Rate</label>
<div class="col-sm-8">
  <input  type="text" name="hrate" id="hr" required class="form-control" value="<?php echo $row['hourly_rate'];?>" disabled>
</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2">Delete Doctor</button>
 </div>
</form>
</div>
<?php
		}
}
?>
</body>
</html>
