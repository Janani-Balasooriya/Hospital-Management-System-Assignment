<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Displaying Patient Lab Tests</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Patient's Lab Test</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-3 col-form-label">Enter Patient ID</label>
      <div class="col-sm-6">
        <input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Tests</button>
      </div>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM  patient_testings WHERE patient_id='$_POST[patientid]';";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      ?>
</div>
<div class="container main_div">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Reference Number</th>
        <th scope="col">Patient ID</th>
        <th scope="col">Test ID</th>
        <th scope="col">Test Date and Time</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($result)){ ?>
      <tr>
        <th scope="row"><?php echo $row['ref_id'];?></th>
        <td><?php echo $row['patient_id'];?></td>
        <td><?php echo $row['test_id'];?></td>
        <td><?php echo $row['test_date'];?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php
}
}
?>
</body>
</html>
