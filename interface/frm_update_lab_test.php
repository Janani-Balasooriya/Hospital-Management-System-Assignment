<?php
require_once('../nav.php');
?>
<!doctype html>
<html>
<head>
<title>Updating Lab Test</title>

<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
	 
<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Searching Test for Editing</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-4 col-form-label">Enter Lab Test ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="pd" name="testid" required maxlength="3"  pattern="[0-9]{3}" autofocus>
		</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2" name="search">Search Lab Test</button>
</div>
</form>

<?php
if(isset($_POST['search'])){//if above submit  button is clicked
require_once('../db/connection.php');
$sql="SELECT * FROM lab_testings WHERE test_id='$_POST[testid]';";
$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
				echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

		else{// if record is found
			$row=mysqli_fetch_assoc($result);	
?>
</div>
<div class="container" id="myform">
<h4 align="center" class="my">Updating Lab Testing</h4>
<form action="../db/update_lab_test.php" method="post">

<div class="form-group row">
		<label for="rid" class="col-sm-3 col-form-label" class="sr-only">Test ID</label>
		<div class="col-sm-9">
		<input type="text" class="form-control" name="testid" required maxlength="3	" pattern="[0-9]{3}" id="rid" autofocus value="<?php echo $row['test_id'];?>">
		</div>
</div>

<div class="form-group row">
		<label for="rt" class="col-sm-3 col-form-label" class="sr-only">Enter Test Name</label>
		<div class="col-sm-9">
		<textarea class="form-control" name="testname" required  pattern="[a-zA-Z\s0-9]{100}" id="rid"> <?php echo $row['test_name'];?></textarea>
		</div>
</div>

<div class="form-group row">
		<label for="rf" class="col-sm-3 col-form-label" class="sr-only">Test Charge</label>
		<div class="col-sm-9">
		<input type="text" class="form-control" name="testcharge" required maxlength="7" pattern="[0-9]{+}" id="rid" value="<?php echo $row['test_charge'];?>" >
		</div>
</div>

<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2">Update Lab Test</button>
 </div>
</form>
</div>
<?php
		}
}
?>	
</body>
</html>
