<?php 
session_start();
include('header.php');
include_once("db_connect.php");


?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>
<div class="container">
	<h2 align=center>MidTown Tech</h2>	
		
		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if ((isset($_SESSION['user_id']) )) { ?>
                <li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></strong></p></li>
	
				<div class="login-page">
				<div class="form">
					<fieldset>
					<legend>Employee Profile</legend>	
					<form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<input type="text" name="firstname" placeholder="email" required class="form-control" />
					<input type="text" name="lastname" placeholder="email" required class="form-control" />
			
					<input type="text" name="email" placeholder="email" required class="form-control" />

					<input type="password" name="password" placeholder="password" required class="form-control" />
					<button type="submit" name="login">login</button>
					<p class="message">Not registered? <a href="register.php">Create an account</a></p>
					</fieldset>
					</form>
				</div>



				<?php } ?>



			</ul>
		</div>
		
		
</div>