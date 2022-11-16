<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!------ Include the above in your HEAD tag ----------> 

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link href="css/bootstrap-4.3.1.css" rel="stylesheet" type="text/css">

<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!--Custom styles-->
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
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
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
      </div>
      <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
            <input type="text" class="form-control" placeholder="username" name="username">
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
            <input type="password" class="form-control" placeholder="password" name="password">
          </div>
          <div class="row align-items-center remember">
            <input type="checkbox">
            Remember Me </div>
          <div class="form-group">
            <input type="submit" value="login" class="btn float-right login_btn" name="login">
          </div>
          <?php
          echo '<div class="alert alert-danger" ><strong>Warning!</strong> User Name or Password incorrect</div>';
          exit();
          ?>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links"> Don't have an account?<a href="#">Sign Up</a> </div>
        <div class="d-flex justify-content-center"> <a href="#">Forgot your password?</a> </div>
      </div>
    </div>
  </div>
</div>
<?php
} // if user name and password incorrect
} // if login button is click and user_name and password is not empty

?>

<!-- This login form will display only very first time -->
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
      </div>
      <div class="card-body">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
            <input type="text" class="form-control" placeholder="username" name="username">
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
            <input type="password" class="form-control" placeholder="password" name="password">
          </div>
          <div class="row align-items-center remember">
            <input type="checkbox">
            Remember Me </div>
          <div class="form-group">
            <input type="submit" value="login" class="btn float-right login_btn" name="login">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links"> Don't have an account?<a href="#">Sign Up</a> </div>
        <div class="d-flex justify-content-center"> <a href="#">Forgot your password?</a> </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>