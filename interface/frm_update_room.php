




<?php
require_once('../nav.php');
?>
<!doctype html>
<html>
<head>
<title>Updating Room</title>

<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
	
<script>
var roomtype=['luxury suites','deluxe rooms','normal rooms','ward beds'];
var roomrate=[15000,10000,8000,5000];
function displayrate(){
var index=document.getElementById("rt").selectedIndex;
document.getElementById("pc").value=roomrate[index];
}
</script> 
<head>
<body>
<div class="container main_div">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<h5 align="center" id="head">Searching Room for Editing</h5>
<div class="form-group row">
		<label for="pd" class="col-sm-4 col-form-label">Enter Room ID</label>
		<div class="col-sm-8">
		<input class="form-control" type="text" id="pd" name="roomid" required maxlength="3" autofocus>
		</div>
</div>
<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2" name="search">Search Room</button>
</div>
</form>

<?php
if(isset($_POST['search'])){//if above submit  button is clicked
require_once('../db/connection.php');
$sql="SELECT * FROM rooms WHERE room_id='$_POST[roomid]';";
$result=$conn->query($sql);
		if(mysqli_num_rows($result)==0)
				echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

		else{// if record is found
			$row=mysqli_fetch_assoc($result);	
?>
</div>
<div class="container" id="myform">
<h4 align="center" class="my">Updating Room</h4>
<form action="../db/update_room.php" method="post">

<div class="form-group row">
		<label for="rid" class="col-sm-4 col-form-label" class="sr-only">Enter room ID</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="roomid" required maxlength="4" pattern="[0-9]{3}" id="rid" autofocus readonly value="<?php echo $_POST['roomid'] ?>" >
		</div>
</div>

<div class="form-group row">
		<label for="rt" class="col-sm-4 col-form-label" class="sr-only">Select Type</label>
		<div class="col-sm-8">
		<select name="roomtype" class="form-control" id="rt" requird onchange="displayrate()">
				<option <?php if($row['room_type']=='luxury suites')echo 'selected' ?> >luxury suites</option>
				<option <?php if($row['room_type']=='deluxe rooms')echo 'selected' ?> >deluxe rooms</option>
				<option <?php if($row['room_type']=='normal rooms')echo 'selected' ?> >normal rooms</option>
				<option <?php if($row['room_type']=='ward beds')echo 'selected' ?> >ward beds</option>
		</select>
		</div>
</div>

<div class="form-group row">
		<label for="rc" class="col-sm-4 col-form-label" class="sr-only">Per Day Charge</label>
		<div class="col-sm-8">
		<input type="text" name="roomrate" class="form-control" id="pc" requird value="<?php echo $row['room_rate']; ?>">
		</div>
</div>
<div class="form-group row">
		<label for="rf" class="col-sm-4 col-form-label" class="sr-only">Room Facility</label>
		<div class="col-sm-8">
		<textarea name="roomfacility" class="form-control" required id="rf" rows="4"><?php echo $row['room_facility']; ?></textarea>
		</div>
</div>

<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2">Update Room</button>
 </div>
</form>
</div>
<?php
		}
}
?>	
</body>
</html>
