<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>displaying room </title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/table-grid.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Room for Displaying</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Room ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="roomid" required maxlength="4" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Room</button>
      </div>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM rooms WHERE room_id='$_POST[roomid]';";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      $row = mysqli_fetch_assoc( $result );
      ?>
</div>
<div class="container main_div" id="grid">
  <h5 align="center"  id="head">Room Details </h5>
  <div class="row">
    <div class="col-sm my_row">
      <label for="pd" class="col-sm-6 col-form-label">Room ID</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['room_id'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label">Room Type</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['room_type'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label">Rate of room</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['room_rate'];?></label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label">Room Facility</label>
    </div>
    <div class="col-sm my_row">
      <label  class="col-sm-6 col-form-label"><?php echo $row['room_facility'] ;?></label>
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
