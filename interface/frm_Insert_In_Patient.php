<?php
require_once( '../db/connection.php' );
$sql1 = "SELECT patient_id FROM patients WHERE doctor_id IS NULL AND admit_date_time IS  NULL  AND allocated_room_id IS NULL";
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
<title>Registering In patient</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div" id="myform">
  <h4 align="center" style="font-variant:small-caps" id="head">Registering In Patient </h4>
  <form action="../db/insert_in_patient.php" method="post">
    <div class="form-group row">
      <label for="pid" class="col-sm-4 col-form-label" class="sr-only">
      Select Patient ID
      </label>
      <div class="col-sm-8">
        <select name="patientid" class="form-control" id="pid" required >
          <?php
          while ( $row = mysqli_fetch_assoc( $result1 ) )
            echo "<option>" . $row[ 'patient_id' ] . "</option>";
          ?>
        </select>
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
            echo "<option>" . $row[ 'doctor_id' ] . "</option>";
          ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="adt" class="col-sm-4 col-form-label">Admission Date and Time</label>
      <div class="col-sm-8">
        <input class="form-control" type="datetime-local" id="adt" name="admitdatetime" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="rid" class="col-sm-4 col-form-label" class="sr-only">
      Select Room ID
      </label>
      <div class="col-sm-8">
        <select name="roomid" class="form-control" id="rid">
          <?php
          while ( $row = mysqli_fetch_assoc( $result3 ) )
            echo "<option>" . $row[ 'room_id' ] . "</option>";
          ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="d" class="col-sm-4 col-form-label" class="sr-only">
      About Disease
      </label>
      <div class="col-sm-8">
        <textarea name="disease" rows="4" class="form-control" id="d"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2">Register In Patient</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
