



<?php
//require_once('../session.php');


require_once('connection.php');

$sql="INSERT INTO `rooms` (`room_id`, `room_type`, `room_rate`, `room_facility`) VALUES ('$_POST[roomid]', '$_POST[roomtype]', '$_POST[roomrate]', '$_POST[roomfacility]');";

if ($conn->query($sql) === TRUE) {
	
  echo "<h3>New record created successfully</h3>";
   //header('location:../dashboard.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>