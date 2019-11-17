<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if (!empty($_GET)){

	$aID = (int) $_GET['id'];
}

$result = mysqli_query($conn, "SELECT * FROM assets join users using (user_id) WHERE asset_id = '" . $aID. "' ");
$row = mysqli_fetch_array($result);
$uid = $row['asset_id'];
$assignto = $row['firstname']. " " .row['lastname'];
$serialnumber = $row['serialnumber'];

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


?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>
	<h2 align=center>MidTown Tech</h2>	
		
		<br>
		<br>
                
	
				<div class="main-page">
				<div class="form">

					<fieldset>
					<legend>Asset Information</legend>	
					<table>
						<tr>
							<td>Asset ID:</td>
							<td><?php echo $aID ?></td>
						</tr>
						<tr>
							<td>Serial Number:</td>
							<td><?php echo $serialnumber ?></td>
						</tr>
						<tr>
							<td>Asset Assgined To:</td>
							<td><?php echo $assignto  ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $email ?></td>
						</tr>
						<tr>
							<td>Title</td>
							<td><?php echo $title ?></td>
						</tr>
					</table>
					

					</fieldset>
				</div>


		
		
