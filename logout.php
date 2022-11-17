<?php
session_start();//refresh the session
session_destroy();//clear all the session variable
header('location:frm_login.php'); ///redirect the login page
?>