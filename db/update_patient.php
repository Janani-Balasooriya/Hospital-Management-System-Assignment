


<?php
//require_once('../session.php');

require_once('connection.php');

if($_POST['unit']=="months")
	$age=$_POST['age']/12;
else
	$age=$_POST['age'];

$sql="UPDATE `patients` SET `first_name` = '$_POST[fname]', `middle_name` = '$_POST[mname]', `last_name` = '$_POST[lname]', `gender` = '$_POST[gender]', `age` = $age, `address1` = '$_POST[address1]', `address2` = '$_POST[address2]', `city` = '$_POST[city]', `disease` = '$_POST[disease]' WHERE `patients`.`patient_id` = $_POST[patientid];";


if ($conn->query($sql) === TRUE) {
  echo "<h3>Record updated successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>