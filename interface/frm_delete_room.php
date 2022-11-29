<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Deleting Room</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Room for Removing</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Room ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="roomid" required maxlength="3" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Room</button>
      </div>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if above submit  button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM rooms WHERE room_id='$_POST[roomid]';";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      $row = mysqli_fetch_assoc( $result );
      ?>
</div>
<div class="container" id="myform">
  <h5 align="center" class="my">Room Details</h5>
  <form action="" method="post">
    <div class="form-group row">
      <label for="rid" class="col-sm-4 col-form-label" class="sr-only">
      Enter room ID
      </label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="roomid" required maxlength="4" pattern="[0-9]{3}" id="rid"  readonly value="<?php echo $_POST['roomid'] ?>" >
      </div>
    </div>
    <div class="form-group row">
      <label for="rt" class="col-sm-4 col-form-label" class="sr-only">
      Room Type
      </label>
      <div class="col-sm-8">
        <input type="text" name="roomtype" class="form-control" id="rt" requird  disabled value=<?php echo $row['room_type'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="rc" class="col-sm-4 col-form-label" class="sr-only">
      Per Day Charge
      </label>
      <div class="col-sm-8">
        <input type="text" name="roomtype" class="form-control" id="rt" requird  disabled value="<?php echo $row['room_rate'] ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="rf" class="col-sm-4 col-form-label" class="sr-only">
      Room Facilities
      </label>
      <div class="col-sm-8">
        <textarea name="roomfacility" class="form-control" required id="rf" rows="4" disabled><?php echo $row['room_facility']; ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2 remove" onclick="confirmDeletion();" >Delete Room</button>
      </div>
    </div>
  </form>
</div>
<?php
}
}
?>
<script type="text/javascript">
	function confirmDeletion(){
		//alert('Yayy ');
		var id = document.getElementById("rid").value;
		//alert('Yayy : ' + id);
        if(confirm('Are you sure to remove this room ?')){
            $.ajax({
               url: '../db/delete_room.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    alert("Record removed successfully");  
               }
            });
        }	  
	}
													  
</script>
</body>
</html>
