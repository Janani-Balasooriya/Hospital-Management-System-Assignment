<?php

//db_insert_patient.php
 
require("connection.php");
 
if($_GET['unit']=="months")
    $age=$_GET['age']/12;
else
    $age=$_GET['age'];
 
$sql="INSERT INTO `patients` (`patient_id`, `first_name`, `middle_name`, `last_name`, `gender`, `age`, `address1`, `address2`, `city`, `disease`, `doctor_id`,`admit_date_time`, `allocated_room_id`) VALUES ('$_GET[patient_id]', '$_GET[first_name]', '$_GET[middle_name]', '$_GET[last_name]', '$_GET[gender]', $age, '$_GET[address1]', '$_GET[address2]', '$_GET[city]', '$_GET[disease]', NULL,NULL,NULL);";
 
if ($conn->query($sql) === TRUE) {
  echo "<h3>New record created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();
?>