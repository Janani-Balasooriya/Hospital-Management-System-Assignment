


<?php
require_once('../session.php');

require_once('connection.php');

$sql="DELETE FROM patients WHERE patient_id='$_POST[patientid]';";
$sql.="DELETE FROM `patient_testings` WHERE `patient_id`='$_POST[patientid]';";
$sql.="UPDATE `rooms` SET `current_patient_id` = NULL WHERE `rooms`.`current_patient_id` = '$_POST[patientid]';";


if ($conn->multi_query($sql) === TRUE) {
  
  header("location:../dashboard.php");
  //echo "<h3>Record Deleted successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?>