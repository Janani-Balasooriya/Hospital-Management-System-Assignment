






<?php
//print_r($_GET);
//require_once('../session.php');

require_once('connection.php');

$sql="UPDATE `patients` SET `doctor_id` = '$_GET[doctorid]', `admit_date_time` = '$_GET[admitdatetime]', `disease`='$_GET[disease]' , `allocated_room_id`='$_GET[roomid]' WHERE `patients`.`patient_id` = '$_GET[patientid]';";

$sql.="UPDATE `rooms` SET `current_patient_id` = '$_GET[patientid]', `available` =0 WHERE `rooms`.`room_id` = '$_GET[roomid]';";

$sql.="UPDATE `rooms` SET `current_patient_id` = NULL, `available` =1 WHERE `rooms`.`room_id` = '$_GET[oldroomid]';";

if($_GET['roomid']==$_GET['oldroomid'])
		 echo "<h3>Record updated Successfully</h3>";
		 //header('location:../dashboard.php');
else
	if ($conn->multi_query($sql) === TRUE) {
		echo "<h3>Record updated Successfully</h3>";
		//header('location:../dashboard.php');
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;	
	}

$conn->close();

?>