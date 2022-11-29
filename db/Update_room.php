<?php


require_once( '../session.php' );

require_once( 'connection.php' );
$sql = "UPDATE `rooms` SET `room_type` = '$_POST[roomtype]', `room_rate` = '$_POST[roomrate]', `room_facility` = '$_POST[roomfacility]' WHERE `rooms`.`room_id` = $_POST[roomid]";


if ( $conn->query( $sql ) === TRUE ) {
  //echo "<h3>Record updated successfully</h3>";
  header( 'location:../dashboard.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>