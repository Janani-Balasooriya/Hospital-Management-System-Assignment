


<?php
//require_once('../session.php');

require_once('connection.php');

$sql="DELETE FROM patients WHERE patient_id='$_POST[patientid]';";


if ($conn->query($sql) === TRUE) {
  echo "<h3>Record Deleted successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?>