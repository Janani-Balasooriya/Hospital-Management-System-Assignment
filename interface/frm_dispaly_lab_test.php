<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Displaying Lab Test</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/table-grid.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Test for Viewing</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Lab Test ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="testid" required maxlength="3"  pattern="[0-9]{3}" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Lab Test</button>
      </div>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if above submit  button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM lab_testings WHERE test_id='$_POST[testid]';";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      $row = mysqli_fetch_assoc( $result );
      ?>
</div>
<div class="container main_div" id="myform">
  <h4 align="center" id="head">Lab Testing Details</h4>
  <div class="row">
    <div class="col-sm my_row">
      <label for="pd" class="col-sm-6 col-form-label">Test ID</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['test_id'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label">Test Name</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['test_name'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label">Test Charge</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['test_charge'];?></label>
    </div>
  </div>
</div>
<?php
}
}
?>
</body>
</html>
