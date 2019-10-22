<?php 
session_start();
include_once("db_connect.php");
?>


<div class="container">
	<h2 align=center>MidTown Tech</h2>	
		
		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="admin" ) )) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } elseif ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="enduser" ) )) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } elseif (isset($_SESSION['user_id'])) { ?>
					<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<div>
				</div>
				<?php } ?>
			</ul>
		</div>
		
		
</div>