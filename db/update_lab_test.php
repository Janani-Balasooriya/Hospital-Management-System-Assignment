<?php

//require_once('../session.php');

require_once('connection.php');





$sql="UPDATE `lab_testings` SET `test_name` = '$_POST[testname]', `test_charge` = '$_POST[testcharge]' WHERE `lab_testings`.`test_id` = '$_POST[testid]'";


if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
   //header('location:../dashboard.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>