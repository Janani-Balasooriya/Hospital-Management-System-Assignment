<html>
	<head>
		<link href="css/nav.css" rel="stylesheet" type="text/css">
	</head>
	<body>
				<?php
			session_start();//refresh the session
			if(!isset($_SESSION['username']) )// if already log-out try to access without log-in
				header('Location:../frm_login.php');
			?>
		<nav class="navbar navbar-light bg-light justify-content-between">
			<div class="welcome_div">
				<a class="navbar-brand" ><span><?php echo 'Welcome '.$_SESSION['username']; ?></span></a>
			</div>
		  <a class="navbar-brand" href="../dashboard.php"><img src="../icons/icon_dashboard_home.png" width="40" height="40"></a>
		  <a class="navbar-brand" href="../logout.php"><img src="../icons/icon_dashboard_logout.png" width="40" height="40"></a>
		</nav>
	</body>
</html>


