<?php

require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "UPDATE `patients` SET `doctor_id` = '$_POST[doctorid]', `admit_date_time` = '$_POST[admitdatetime]', `disease`='$_POST[disease]'  WHERE `patients`.`patient_id` = '$_POST[patientid]';";


if ( $conn->query( $sql ) === TRUE ) {
  //echo "<h3>New record created successfully</h3>";
  header( 'location:../dashboard.php' );

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>