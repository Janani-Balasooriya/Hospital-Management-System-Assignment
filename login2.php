<!DOCTYPE html>
<html lang="en">
<head>
<title>Login V18</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	
</head>
<body style="background-color: #666666;">
<?php
if ( isset( $_POST[ 'login' ] ) && !empty( $_POST[ 'username' ] ) && !empty( $_POST[ 'password' ] ) ) {
  require( 'db/connection.php' );
  $sql = "SELECT * FROM `users` WHERE `username`='$_POST[username]'";
  $result = $conn->query( $sql );
  $row = mysqli_fetch_assoc( $result );
  if ( $_POST[ 'username' ] == $row[ 'username' ] && md5( $_POST[ 'password' ] ) == $row[ 'password' ] ) {
    session_start();
    $_SESSION[ 'username' ] = $row[ 'username' ];
    header( 'Location:dashboard.php' ); // redirection location
  } else { // if user name and password incorrect
    ?>
<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <form class="login100-form validate-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <span class="login100-form-title p-b-43"> Login to continue </span>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="username">
          <span class="focus-input100"></span> <span class="label-input100">Email</span> </div>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="password" name="pass">
          <span class="focus-input100"></span> <span class="label-input100">Password</span> </div>
        <div class="flex-sb-m w-full p-t-3 p-b-32">
          <div> <a href="#" class="txt1"> Forgot Password? </a> </div>
        </div>
        <div class="container-login100-form-btn"> 
          <!--          <button class="login100-form-btn"> Login </button>-->
          <input type="submit" value="login" class="btn float-right login_btn" name="login">
        </div>
        <div class="text-center p-t-20 p-b-20"> <span class="txt2"> Don't have an account? <a href="#">Sign Up</a></span> </div>
        <?php /*?><?php
        echo '<div class="alert alert-danger" ><strong>Warning!</strong> User Name or Password incorrect</div>';
        exit();
        ?><?php */?>
      </form>
      <div class="login100-more" style="background-image: url('image/a.png');"> </div>
    </div>
  </div>
</div>
<?php
} // if user name and password incorrect
} // if login button is click and user_name and password is not empty

?>

<!-- This login form will display only very first time -->
<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <form class="login100-form validate-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <span class="login100-form-title p-b-43"> Login to continue </span>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="username">
          <span class="focus-input100"></span> <span class="label-input100">Username</span> </div>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="password" name="password">
          <span class="focus-input100"></span> <span class="label-input100">Password</span> </div>
		  
        <div class="flex-sb-m w-full p-t-3 p-b-32">
          <div> <a href="#" class="txt1"> Forgot Password? </a> </div>
        </div>
        <div class="container-login100-form-btn"> 
          <!--          <button class="login100-form-btn"> Login </button>-->
          <input type="submit" value="login" class="login100-form-btn" name="login">
        </div>
        <div class="text-center p-t-20 p-b-20"> 
			<span class="txt2"> Don't have an account? 
				<a href="#">Sign Up</a>
			</span> 
		</div>
      </form>
      <div class="login100-more" style="background-image: url('image/a.png');"> </div>
    </div>
  </div>
</div>
	<!--===============================================================================================--> 
<script src="vendor/jquery/jquery-3.2.1.min.js"></script> 
<!--===============================================================================================--> 
<script src="vendor/animsition/js/animsition.min.js"></script> 
<!--===============================================================================================--> 
<script src="vendor/bootstrap/js/popper.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.min.js"></script> 
<!--===============================================================================================--> 
<script src="vendor/select2/select2.min.js"></script> 
<!--===============================================================================================--> 
<script src="vendor/daterangepicker/moment.min.js"></script> 
<script src="vendor/daterangepicker/daterangepicker.js"></script> 
<!--===============================================================================================--> 
<script src="vendor/countdowntime/countdowntime.js"></script> 
<!--===============================================================================================--> 
<script src="js/main.js"></script>


</body>
</html>