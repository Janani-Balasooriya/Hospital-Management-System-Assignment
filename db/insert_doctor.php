<?php

require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `gender`, `address1`, `address2`, `city`, `spec_area`, `hourly_rate`) VALUES ('$_POST[doctorid]', '$_POST[fname]', '$_POST[lname]', '$_POST[gender]', '$_POST[address1]', '$_POST[address2]', '$_POST[city]', '$_POST[spec_area]', '$_POST[hrate]')";


if ( $conn->query( $sql ) === TRUE ) {
  echo "<h3>New record created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>