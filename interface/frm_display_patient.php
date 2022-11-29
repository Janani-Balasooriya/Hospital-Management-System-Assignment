<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Displaying Patient</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container main_div">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <h5 align="center" id="head">Searching Patient for Displaying</h5>
    <div class="form-group row">
      <label for="pd" class="col-sm-4 col-form-label">Enter Patient ID</label>
      <div class="col-sm-8">
        <input class="form-control" type="text" id="pd" name="patientid" required maxlength="4" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2" name="search">Search Patient</button>
      </div>
    </div>
  </form>
  <?php
  if ( isset( $_POST[ 'search' ] ) ) { //if button is clicked
    require_once( '../db/connection.php' );
    $sql = "SELECT * FROM patients WHERE patient_id='$_POST[patientid]';";
    $result = $conn->query( $sql );
    if ( mysqli_num_rows( $result ) == 0 )
      echo '<div class="alert alert-warning" ><strong>Warning!</strong> No record found.</div>';

    else { // if record is found
      $row = mysqli_fetch_assoc( $result );
      ?>
</div>
<div class="container main_div" id="grid">
  <h5 align="center"  id="head">Patient Details </h5>
  
  <!--table goes here-->
  <table class="table table-striped">
    <tbody>
      <tr>
        <th scope="row">Patient ID</th>
        <td><?php echo $row['patient_id'];?></td>
      </tr>
      <tr>
        <th scope="row">First Name</th>
        <td><?php echo $row['first_name'];?></td>
      </tr>
      <tr>
        <th scope="row">Middle Name</th>
        <td><?php echo $row['middle_name'];?></td>
      </tr>
      <tr>
        <th scope="row">Last Name</th>
        <td><?php echo $row['last_name'];?></td>
      </tr>
      <tr>
        <th scope="row">Gender</th>
        <td><?php if($row['gender']==1)  echo 'Male'; else echo 'Female';?></td>
      </tr>
      <tr>
        <th scope="row">Age</th>
        <td><?php echo $row['age'];?></td>
      </tr>
      <tr>
        <th scope="row">Address</th>
        <td><?php echo $row['address1']."\t".$row['address2']."<br>".$row['city'] ;?></td>
      </tr>
      <tr>
        <th scope="row">Disease</th>
        <td><?php echo $row['disease'] ;?></td>
      </tr>
      <tr>
        <th scope="row">Assigned doctor</th>
        <td><?php echo $row['doctor_id'] ;?></td>
      </tr>
      <tr>
        <th scope="row">Admission date and time</th>
        <td><?php echo $row['admit_date_time'] ;?></td>
      </tr>
    </tbody>
  </table>
</div>
<?php
}
}
?>
</body>
</html>
