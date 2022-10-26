



<?php
require_once('../nav.php');
?>

<!doctype html>
<html>



<head>
<title>Inserting Doctor</title>



<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">

<head>
<body>
<div class="container main_div">
<h5 align="center" id="head">Registering Doctor</h5>
<form action="../db/insert_doctor.php" method="post">

<div class="form-group row">
		<label for="dd" class="col-sm-4 col-form-label" class="sr-only">Enter Doctor ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="dd" name="doctorid" required maxlength="4" autofocus>
		</div>
</div>

<div class="form-group row">
		<label for="fn" class="col-sm-4 col-form-label">Enter First Name</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="fn" name="fname" required maxlength="15"  pattern="[a-zA-Z]+">
		</div>
</div>

<div class="form-group row">
		<label for="ln" class="col-sm-4 col-form-label">Enter Last Name</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="ln" name="lname"  maxlength="25"  pattern="[a-zA-Z]+" required>
		</div>
</div>
<div class="form-group row">
		<label for="dob" class="col-sm-4 col-form-label">Choose your Date of Birth</label>
		<div class="col-sm-8">
		<input class="form-control" type="date" id="dob" name="dob" required>
		</div>
</div>

<div class="form-group row">
<label for="dob" class="col-sm-4 col-form-label">Choose your Gender</label>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
  <label class="form-check-label" for="male">Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="female" value="0">
  <label class="form-check-label" for="female">Female</label>
</div>
</div>
</div>

<div class="form-group row">
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="ad1">Address1</label>
  <input  type="text" name="address1" id="ad1" required class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="ad2">Address2</label>
  <input  type="text" name="address2" id="ad2" class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-check form-check-inline">
  <label class="col-sm-4 form-check-label" for="c">City</label>
  <input  type="text" name="city" id="c" required class="form-control">
</div>
</div>
</div>

<div class="form-group row">
<label for="ln" class="col-sm-4 col-form-label">Details about Doctor</label>
<div class="col-sm-8">
	<textarea class="form-control" name="spec_area" rows="4"  cols="75" required></textarea>
</div>
</div>

<div class="form-group row">
<label for="hr" class="col-sm-4 col-form-label">Hourly Rate</label>
<div class="col-sm-8">
  <input  type="text" name="hrate" id="hr" required class="form-control">
</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2">Register Doctor</button>
 </div>
</form>
</div>
</body>
</html>
