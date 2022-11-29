<?php

require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "INSERT INTO `lab_testings` (`test_id`, `test_name`, `test_charge`) VALUES ('$_POST[testid]', '$_POST[testname]', '$_POST[testcharge]');";

if ( $conn->query( $sql ) === TRUE ) {
  //echo "<h3>New record created successfully</h3>";
  header( 'location:../dashboard.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>