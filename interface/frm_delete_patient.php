<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Deleting Patient</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Patient for Deleting</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Patient ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Patient</button>
      </div>
    </div>
  </form>
</div>
<?php
if ( isset( $_POST[ 'search' ] ) ) { //if button is clicked
  require_once( '../db/connection.php' );
  $sql = "SELECT * FROM patients WHERE patient_id='$_POST[patientid]';";
  $result = $conn->query( $sql );
  if ( mysqli_num_rows( $result ) == 0 )
    echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

  else { // if record is found
    $row = mysqli_fetch_assoc( $result );
    if ( $row[ 'age' ] < 1 )
      $age = ceil( $row[ 'age' ] * 12 );
    else
      $age = ceil( $row[ 'age' ] );

    ?>
<div class="container main_div" id="myform">
  <h5 align="center" id="head">Patient Details </h5>
  <form action="../db/delete_patient.php" method="post">
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Patient ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="patientid" required maxlength="4"  pattern="[0-9]{4}" autofocus value="<?php echo $row['patient_id'];?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="fn" class="col-sm-4 col-form-label">Enter First Name</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="fn" name="fname" required maxlength="15"  pattern="[a-zA-Z]+" value="<?php echo $row['first_name'];?>" disabled >
      </div>
    </div>
    <div class="form-group row">
      <label for="mn" class="col-sm-4 col-form-label">Enter Middle Name</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="mn" name="mname"  maxlength="15"  pattern="[a-zA-Z]+" value="<?php echo $row['middle_name'];?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="ln" class="col-sm-4 col-form-label">Enter Last Name</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="ln" name="lname"  maxlength="25"  pattern="[a-zA-Z]+" required value="<?php echo $row['last_name'];?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" 
  	value="1" <?php if($row['gender']==1) echo 'checked';?> disabled>
          <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="female" 
		value="0" <?php if($row['gender']==0) echo 'checked';?> disabled>
          <label class="form-check-label" for="female">Female</label>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="age">Enter Age</label>
          <input class="form-check-input" type="number" name="age" id="age" min="0" required value="<?php echo $age;?>" disabled>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="unit" id="m" value="months" disabled <?php if($row['age']<1) echo 'checked'?>>
          <label class="form-check-label" for="m">Month</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="unit" id="y" value="years"   disabled <?php if($row['age']>=1) echo 'checked'?>>
          <label class="form-check-label" for="y">Year</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="ad1">Address1</label>
          <input  type="text" name="address1" id="ad1" required class="form-control" value="<?php echo $row['address2'];?>" disabled>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="ad2">Address2</label>
          <input  type="text" name="address2" id="ad2" class="form-control" value="<?php echo $row['address2'];?>" disabled>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-check form-check-inline">
          <label class="form-check-label" for="c">City</label>
          <input  type="text" name="city" id="c" required class="form-control" value="<?php echo $row['city'];?>" disabled>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="ln" class="col-sm-4 col-form-label">Write about Disease</label>
      <div class="col-sm-8">
        <textarea class="form-control" name="disease" rows="4"  cols="75" required disabled><?php echo $row['disease'];?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="did" class="col-sm-4 col-form-label">Assigned Doctor ID</label>
      <div class="col-sm-8">
        <input  type="text" name="city" id="c" required class="form-control" value="<?php echo $row['doctor_id'];?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <label for="did" class="col-sm-4 col-form-label">Admitted Date and Time</label>
      <div class="col-sm-8">
        <input  type="text" name="city" id="c" required class="form-control" value="<?php echo $row['admit_date_time'];?>" disabled>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2">Delete Patient</button>
      </div>
    </div>
  </form>
</div>
<?php

} //if record is found	
} //if submit button is clicked
?>
</body>
</html>
