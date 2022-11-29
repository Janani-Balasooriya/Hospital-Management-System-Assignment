<?php
require_once( "../nav.php" );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inserting Patient</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="container main_div">
  <h5 align="center" id="head">Registering Patient</h5>
  <form action="../db/db_insert_patient.php" method="get">
    
    <!--	          Patient ID field               -->
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Patient ID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Patient ID" name="patient_id" pattern="[0-9]{4}">
      </div>
    </div>
    
    <!--	          First name field               -->
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Enter First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="First Name" name="first_name" pattern="[A-Za-z]">
      </div>
    </div>
    
    <!--	          Middle name field               -->
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Middle Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Middle Name" name="middle_name">
      </div>
    </div>
    
    <!--	          Last name field               -->
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Last Name" name="last_name">
      </div>
    </div>
    
    <!--	          Choose gender fields               -->
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Choose your gender</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="option1" checked>
            <label class="form-check-label" for="gridRadios1">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="option2">
            <label class="form-check-label" for="gridRadios2">Female</label>
          </div>
        </div>
      </div>
    </fieldset>
    
    <!--	          Age fields               -->
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Enter age</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="inputEmail3" placeholder="age" name="age" pattern="[0-9]{1,2,3}">
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="inlineRadio1" value="option1" name="unit">
        <label class="form-check-label" for="inlineRadio1">Month</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="inlineRadio2" value="option2" name="unit">
        <label class="form-check-label" for="inlineRadio2">Year</label>
      </div>
    </div>
    
    <!--	          Address fields               -->
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Address 1</label>
        <input type="text" class="form-control " id="validationServer01" placeholder="address1"  required name="address1">
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Address2</label>
        <input type="text" class="form-control " id="validationServer02" placeholder="address2"  required name="address2">
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServerUsername">City</label>
        <input type="text" class="form-control " id="validationServer02" placeholder="city"  required name="city">
      </div>
    </div>
    
    <!--	          Disease field               -->
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Write about Disease</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="disease"></textarea>
    </div>
    
    <!--	          Date time field               -->
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Register Patient</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
