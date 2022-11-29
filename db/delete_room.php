<?php

require_once( '../session.php' );

require_once( 'connection.php' );


$sql = "DELETE FROM rooms WHERE room_id='$_GET[id]';";


if ( $conn->query( $sql ) === TRUE ) {
  //echo "<h3>Record Deleted successfully</h3>";
  header( 'location:../dashboard.php' );
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>