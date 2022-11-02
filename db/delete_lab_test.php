<?php

//require_once('../session.php');

require_once('connection.php');

$sql="DELETE FROM  lab_testings WHERE test_id='$_POST[testid]';";


if ($conn->query($sql) === TRUE) {
   echo "<h3>Record Deleted successfully</h3>";
  // header('location:../dashboard.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



?>