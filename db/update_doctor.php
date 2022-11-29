<?php
require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "UPDATE `doctors` SET `first_name` = '$_POST[fname]', `last_name` = '$_POST[lname]', `gender` = '$_POST[gender]', `address1` = '$_POST[address1]', `address2` = '$_POST[address2]', `city` = '$_POST[city]', `spec_area` = '$_POST[spec_area]', `hourly_rate` = '$_POST[hrate]' WHERE `doctors`.`doctor_id` = $_POST[doctorid];";


if ( $conn->query( $sql ) === TRUE ) {
  echo "<h3>Record updated successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>