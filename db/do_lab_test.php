



<?php
//require_once('../session.php');

require_once('connection.php');

$sql="INSERT INTO `patient_testings` (`patient_id`,`test_id`, `test_date`) VALUES ('$_POST[patientid]', '$_POST[testid]', '$_POST[testdatetime]');";

if ($conn->query($sql) === TRUE) {
  echo "<h3>New record created successfully</h3>";
  //header('location:../dashboard.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>