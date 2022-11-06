<?php






require_once('../db/connection.php');
$sql1="SELECT patient_id FROM patients";
$result1=mysqli_query($conn,$sql1);
$sql2="SELECT test_id FROM lab_testings;";
$result2=mysqli_query($conn,$sql2);

?>
<?php
require_once('../nav.php');
?>

<!doctype html>
<html>



<head>
<title>Doing Testing</title>

<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">

<head>
<body>

<div class="container main_div" id="myform">
<h4 align="center" style="font-variant:small-caps" id="head">Recording Patient Testing</h4>
<form action="../db/do_lab_test.php"  method="post">

<div class="form-group row">
		<label for="did" class="col-sm-4 col-form-label" class="sr-only">Select Patient ID</label>
		<div class="col-sm-8">
		<select name="patientid" class="form-control" id="did" required>
		<?php
			while($row=mysqli_fetch_assoc($result1))
					echo "<option>".$row['patient_id']."</option>";
		?>
		</select>
		</div>
</div>
<div class="form-group row">
		<label for="did" class="col-sm-4 col-form-label" class="sr-only">Select Test ID</label>
		<div class="col-sm-8">
		<select name="testid" class="form-control" id="did" required>
		<?php
			while($row=mysqli_fetch_assoc($result2))
					echo "<option>".$row['test_id']."</option>";
		?>
		</select>
		</div>
</div>

<div class="form-group row">
		<label for="adt" class="col-sm-4 col-form-label">Choose Test Date and Time</label>
		<div class="col-sm-8">
		<input class="form-control" type="datetime-local" id="adt" name="testdatetime" required >
		</div>
</div>


<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary mb-2">Record Test</button>
  </div>
 </div>
</form>
</div>

</body>
</html>
