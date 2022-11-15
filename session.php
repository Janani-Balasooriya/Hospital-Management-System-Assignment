







<?php

session_start();//refresh the session
if(!isset($_SESSION['username']) )// if already log-out try to access without log-in
	header('Location:../frm_login.php');
else
	header('Location:../dashboard.php');//if you have already log in you can not access database file directly	

?>