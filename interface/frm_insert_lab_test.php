<?php
require_once( '../nav.php' );
?>
<!doctype html>
<html>
<head>
<title>Registering Lab Test</title>
<link href="../css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/main-div.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<head>
<body>
<div class="container main_div" id="myform">
  <h4 align="center" id="head">Registering lab Test</h4>
  <form action="../db/insert_lab_test.php" method="post">
    <div class="form-group row">
      <label for="rid" class="col-sm-3 col-form-label" class="sr-only">
      Enter Test ID
      </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="testid" required maxlength="3	" pattern="[0-9]{3}" id="rid" autofocus>
      </div>
    </div>
    <div class="form-group row">
      <label for="rt" class="col-sm-3 col-form-label" class="sr-only">
      Enter Test Name
      </label>
      <div class="col-sm-9">
        <textarea class="form-control" name="testname" required  pattern="[a-zA-Z\s0-9]{100}" id="rid"> </textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="rf" class="col-sm-3 col-form-label" class="sr-only">
      Test Charge
      </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="testcharge" required maxlength="7" pattern="[0-9]" id="rid" >
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary mb-2">Add Test</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
