<?php 
session_start();
include('header.php');
include_once("db_connect.php");


?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>

				<?php if ((isset($_SESSION['user_id']) )) { ?>
                
	
				<div class="main-page">
				<div class="form">

				<p align="center" class="welcome"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></strong></p>
					<fieldset>
					<legend>Employee Profile</legend>	
					<table>
						<tr>
							<td>UserID</td>
							<td><?php echo $_SESSION['user_id']; ?></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td><?php echo $_SESSION['firstname']; ?></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td><?php echo $_SESSION['middle']; ?></td>
						</tr>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><?php echo $_SESSION['lastname']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $_SESSION['email']; ?></td>
						</tr>
						<tr>
							<td>Title</td>
							<td><?php echo $_SESSION['title']; ?></td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td><?php echo $_SESSION['primary_phone']; ?></td>
						</tr>

					</table>
					

					</fieldset>
				</div>


				<?php } ?>
		
		
