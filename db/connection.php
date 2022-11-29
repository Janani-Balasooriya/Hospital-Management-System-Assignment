<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "hospital_hnd_73";
$port = "3307";

// Create connection
$conn = new mysqli( $servername, $username, $password, $db, $port );

// Check connection
if ( $conn->connect_error ) {
  die( "Connection failed: " . $conn->connect_error );
}
//echo "Connected successfully";

?>
