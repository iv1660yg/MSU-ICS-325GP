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
				<?php if ((isset($_SESSION['user_id']) )) { ?>
                <li></li>
	
				<div class="main-page">
				<div class="form">

				<p class="welcome"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></strong></p>
					<fieldset>
					<legend>Employee Profile</legend>	
					<form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					
					<input type="text" name="firstname" placeholder="firstname" required class="form-control" />
				
					<input type="text" name="middle" placeholder="middle" required class="form-control" />

					<input type="text" name="lastname" placeholder="lastname" required class="form-control" />
			
					<input type="text" name="email" placeholder="email" required class="form-control" />
					
					<input type="text" name="primary_phone" placeholder="primary_phone" required class="form-control" />

					<button type="submit" name="login">login</button>
					</fieldset>
					</form>
				</div>



				<?php } ?>



			
		</div>
		
		
</div>