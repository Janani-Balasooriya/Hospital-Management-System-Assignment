


<?php
require_once('../nav.php');
?>
<!doctype html>
<html>
<head>
<title>Registering Room</title>

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
<div class="container main_div" id="myform">
<h5 align="center" id="head">Registering Room</h5>
<form action="../db/insert_room.php" method="post">

<div class="form-group row">
		<label for="rid" class="col-sm-4 col-form-label" class="sr-only">Enter room ID</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" name="roomid" required maxlength="4" id="rid" autofocus>
		</div>
</div>

<div class="form-group row">
		<label for="rt" class="col-sm-4 col-form-label" class="sr-only">Select Type</label>
		<div class="col-sm-8">
		<select name="roomtype" class="form-control" id="rt" requird onchange="displayrate()">
			<option>luxury suites</option>
			<option>deluxe rooms</option>
			<option>normal rooms</option>
			<option>ward beds</option>
		</select>
		</div>
</div>

<div class="form-group row">
		<label for="rc" class="col-sm-4 col-form-label" class="sr-only">Per Day Charge</label>
		<div class="col-sm-8">
		<input type="text" name="roomrate" readonly id="pc">
		</div>
</div>
<div class="form-group row">
		<label for="rf" class="col-sm-4 col-form-label" class="sr-only">Room Facility</label>
		<div class="col-sm-8">
		<textarea name="roomfacility" class="form-control" required id="rf" rows="4"></textarea>
		</div>
</div>

<div class="form-group row">
 <button type="submit" class="btn btn-primary mb-2">Register Room</button>
 </div>
</form>
</div>
</body>
</html>
