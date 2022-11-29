<?php
//print_r($_GET);
require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "UPDATE `patients` SET `doctor_id` = '$_GET[doctorid]', `admit_date_time` = '$_GET[admitdatetime]', `disease`='$_GET[disease]' WHERE `patients`.`patient_id` = '$_GET[patientid]';";

if ( $conn->multi_query( $sql ) === TRUE ) {
  //echo "<h3>Record updated Successfully</h3>";
  header( 'location:../dashboard.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>