<?php

require_once( '../session.php' );

require_once( 'connection.php' );

$sql = "UPDATE `patients` SET `doctor_id` = '$_POST[doctorid]', `admit_date_time` = '$_POST[admitdatetime]', `disease`=CONCAT(`disease`,' ','$_POST[disease]') , `allocated_room_id`='$_POST[roomid]' WHERE `patients`.`patient_id` = '$_POST[patientid]';";

$sql .= "UPDATE `rooms` SET `current_patient_id` = '$_POST[patientid]', `available` =0 WHERE `rooms`.`room_id` = '$_POST[roomid]';";

if ( $conn->multi_query( $sql ) === TRUE ) {
  //echo "<h3>New record created successfully</h3>";
  header( 'location:../dashboard.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>