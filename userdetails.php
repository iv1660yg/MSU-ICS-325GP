<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if (!empty($_GET)){

	$userID = (int) $_GET['id'];
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '" . $userID. "' ");
$row = mysqli_fetch_array($result);
$uid = $row['user_id'];
$userType = $row['userType'];	
$firstname = $row['firstname'];
$middle = $row['middle'];	
$lastname = $row['lastname'];	
$email = $row['email'];	
$title = $row['title'];
$managed_byID = $row['managed_by'];
$dept_id = $row['dept_id'];
$location_id = $row['location_id'];	
$primary_phone = $row['primary_phone'];						

?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>
	<h2 align=center>MidTown Tech</h2>	
		
		<br>
		<br>
				<?php if ((isset($_SESSION['user_id']) )) { ?>
                
	
				<div class="main-page">
				<div class="form">

					<fieldset>
					<legend>Employee Profile</legend>	
					<table align=right>
						<tr>
							<td>UserID</td>
							<td><?php echo $userID  ?></td>
						</tr>
						<tr>
							<td>First Name</td>
							<td><?php echo $firstname ?></td>
						</tr>
						<tr>
							<td>Middle Name</td>
							<td><?php echo $middle ?></td>
						</tr>
						</tr>
						<tr>
							<td>Last Name</td>
							<td><?php echo $lastname ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $email  ?></td>
						</tr>
						<tr>
							<td>Title</td>
							<td><?php echo $title ?></td>
						</tr>
						<tr>
							<td>Manager</td>
							<td><?php echo $managed_byID ?></td>
						</tr>

					</table>
					

					</fieldset>
				</div>


				<?php } ?>
		
		
