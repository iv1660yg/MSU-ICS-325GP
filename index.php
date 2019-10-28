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
	
				<?php } ?>
			</ul>
		</div>
		
		
</div>