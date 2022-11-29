<?php
session_start(); //refresh the session
if ( !isset( $_SESSION[ 'username' ] ) ) // if already log-out try to access without log-in
  header( 'Location:frm_login.php' );
?>
<nav class="navbar navbar-light bg-light justify-content-between">
  <div class="welcome_div"><a class="navbar-brand" ><span><?php echo 'Welcome '.$_SESSION['username']; ?></span></a></div>
  <a class="navbar-brand" href="dashboard.php"><img src="icons/icon_dashboard_home.png" width="40" height="40"></a><a class="navbar-brand" href="logout.php"><img src="icons/icon_dashboard_logout.png" width="40" height="40"></a></nav>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css">
<link href="css/main-div.css" rel="stylesheet" type="text/css">
<link href="css/nav.css" rel="stylesheet" type="text/css">
<!--<link media="screen and (max-width: 400px)" href="css/style.css" rel="stylesheet" type="text/css">-->
</head>

<body>
<div class="container main_div">
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Managing Patient</h5>
          <div class="card-group d-flex">
            <div class="card" align="center"> <a href="interface/frm_insert_patient.php"><img class="card-img-top" src="icons/icon_patient_add.jpg" alt="Card image cap"></a>
                <h6 class="card-title">Add patient</h6>
              </div>
              <div class="card" align="center"> <a href="interface/frm_update_patient.php"><img class="card-img-top" src="icons/icon_patient_edit.jpg" alt="Card image cap"></a>
                <h6 class="card-title">Edit patient</h6>
              </div>
            <div class="card" align="center"> <a href="interface/frm_delete_patient.php"><img class="card-img-top" src="icons/icon_patient_delete.jpg" alt="Card image cap"></a>
                <h6 class="card-title" align="center">Delete patient</h6>
              </div>
              <div class="card" align="center"> <a href="interface/frm_display_patient.php"><img class="card-img-top" src="icons/icon_patient_view.jpg" alt="Card image cap"></a>
                <h6 class="card-title">View patient</h6>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Managing Doctor</h5>
          <div class="card-group">
            <div class="card" align="center"> <a href="interface/frm_Insert_Doctor.php"><img class="card-img-top" src="icons/icon_doctor_add.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Add doctor</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_update_doctor.php"><img class="card-img-top" src="icons/icon_doctor_edit.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Edit doctor</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_delete_doctor.php"><img class="card-img-top" src="icons/icon_doctor_delete.jpg" alt="Card image cap"></a>
              <h6 class="card-title" align="center">Delete doctor</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_display_doctor.php"><img class="card-img-top" src="icons/icon_doctor_view.jpg" alt="Card image cap"></a>
              <h6 class="card-title">View doctor</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Managing In and Out Patient</h5>
          <div class="card-group">
            <div class="card" align="center"> <a href="interface/frm_Insert_In_Patient.php"><img class="card-img-top" src="icons/icon_inpatient_add.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Add In patient</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_Update_In_Patient.php"><img class="card-img-top" src="icons/icon_inpatient_edit.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Edit In patient</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_Insert_Out_Patient.php"><img class="card-img-top" src="icons/icon_outpatient_add.jpg" alt="Card image cap"></a>
              <h6 class="card-title" align="center">Add Out patient</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_update_out_patient.php"><img class="card-img-top" src="icons/icon_outpatient_edit.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Edit Out patient</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Managing Rooms</h5>
          <div class="card-group">
            <div class="card" align="center"> <a href="interface/frm_Insert_room.php"><img class="card-img-top" src="icons/icon_room_add.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Add room</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_update_room.php"><img class="card-img-top" src="icons/icon_room_edit.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Edit room</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_delete_room.php"><img class="card-img-top" src="icons/icon_room_delete.jpg" alt="Card image cap"></a>
              <h6 class="card-title" align="center">Delete room</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_display_room.php"><img class="card-img-top" src="icons/icon_room_view.jpg" alt="Card image cap"></a>
              <h6 class="card-title">View room</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Managing Lab Testings</h5>
          <div class="card-group">
            <div class="card" align="center"> <a href="interface/frm_insert_lab_test.php"> <img class="card-img-top" src="icons/icon_test_add.jpg" alt="Card image cap"> </a>
              <h6 class="card-title">Add test</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_update_lab_test.php"><img class="card-img-top" src="icons/icon_test_edit.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Edit test</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_delete_lab_test.php"><img class="card-img-top" src="icons/icon_test_delete.jpg" alt="Card image cap"></a>
              <h6 class="card-title" align="center">Delete test</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_dispaly_lab_test.php"><img class="card-img-top" src="icons/icon_test_view.jpg" alt="Card image cap"></a>
              <h6 class="card-title">View test</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="topic_head" align="center">Do & View Tests & Discharge</h5>
          <div class="card-group">
            <div class="card" align="center"> <a href="interface/frm_do_test.php"><img class="card-img-top" src="icons/icon_do_test.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Do test</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_view_patient_lab_test.php"><img class="card-img-top" src="icons/icon_list_test.jpg" alt="Card image cap"></a>
              <h6 class="card-title">List test</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_cal_bill.php"><img class="card-img-top" src="icons/icon_calculate_bill.jpg" alt="Card image cap"></a>
              <h6 class="card-title" align="center">Calculate bill</h6>
            </div>
            <div class="card" align="center"> <a href="interface/frm_discharge.php"><img class="card-img-top" src="icons/icon_discharge.jpg" alt="Card image cap"></a>
              <h6 class="card-title">Discharge</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>