<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if (empty($_SESSION['user_id'])){
header("Location: login.php");
}

?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>

		
		<br>
		<br>
			<?php if ((isset($_SESSION['user_id']) )) { ?>
				<div class="main-page">
				<div class="form">
				<p align="center" class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></strong></p>

		
				</div>
				</div>
				<?php } ?>
			</ul>
		</div>
		
		
</div>