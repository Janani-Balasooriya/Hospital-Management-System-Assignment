<?php
require_once( '../db/connection.php' );
$sql1 = "SELECT patient_id FROM patients WHERE `allocated_room_id` IS NULL";
$result1 = mysqli_query( $conn, $sql1 );
$sql2 = "SELECT doctor_id FROM doctors;";
$result2 = mysqli_query( $conn, $sql2 );
$sql3 = "SELECT room_id FROM rooms WHERE available=1;";
$result3 = mysqli_query( $conn, $sql3 );

?>
<?php
require_once( '../nav.php' );
?>

<!doctype html>
<html>
<head>
<title>Updating Out patient</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" class="my" id="head">Searching Out Patient for Editing</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Patient ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <button type="submit" class="btn btn-primary mb-2" name="search">Search Patient</button>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if above submit  button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM patients WHERE patient_id='$_POST[patientid]' AND `allocated_room_id` IS NULL;";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      $row1 = mysqli_fetch_assoc( $result );


      ?>
</div>
<div class="container main_div" id="myform">
  <h5 align="center" style="font-variant:small-caps" id="head">Updating Out Patient </h5>
  <form action="../db/update_out_patient.php"  method="get">
    <div class="form-group row">
      <label for="pid" class="col-sm-4 col-form-label" class="sr-only">
      Select Patient ID
      </label>
      <div class="col-sm-8">
        <input type="text" name="patientid" class="form-control" id="pid" readonly value=" <?php echo $row1['patient_id']; ?> ">
      </div>
    </div>
    <div class="form-group row">
      <label for="did" class="col-sm-4 col-form-label" class="sr-only">
      Select Doctor ID
      </label>
      <div class="col-sm-8">
        <select name="doctorid" class="form-control" id="did" required>
          <?php
          while ( $row = mysqli_fetch_assoc( $result2 ) )
            if ( $row1[ 'doctor_id' ] == $row[ 'doctor_id' ] )
              echo "<option selected >" . $row[ 'doctor_id' ] . "</option>";
            else
              echo "<option>" . $row[ 'doctor_id' ] . "</option>";

            ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="adt" class="col-sm-4 col-form-label">Admission Date and Time</label>
      <div class="col-sm-8">
        <input class="form-control" type="datetime-local" id="adt" name="admitdatetime" required value="<?php echo str_replace(" ","T",$row1['admit_date_time']);?>" >
      </div>
    </div>
    <div class="form-group row">
      <label for="d" class="col-sm-4 col-form-label" class="sr-only">
      About Disease
      </label>
      <div class="col-sm-8">
        <textarea name="disease" rows="4" class="form-control" id="d"><?php echo $row1['disease'];?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2">Update Out Patient</button>
      </div>
    </div>
  </form>
</div>
<?php
}
}
?>
</body>
</html>
