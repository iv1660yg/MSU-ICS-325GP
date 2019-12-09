<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if (!empty($_GET)){

	$aID = (int) $_GET['id'];
}

$result = mysqli_query($conn, "SELECT * FROM model  WHERE model_id = '" . $aID. "' ");
$row = mysqli_fetch_array($result);
$model_id = $row['model_id'];
$model_number = $row['model_number'];
$model_name = $row['model_name'];
$category = $row['category_type'];	
$status = $row['model_status'];
					




?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>
                
	
				<div class="main-page">
				<div class="form">

					<fieldset>
					<legend>Model Information</legend>	
					<table align=left>
						<tr>
							<td>Model ID:</td>
							<td><?php echo $model_id ?></td>
						</tr>
						<tr>
							<td>Number Number:</td>
							<td><?php echo $model_number ?></td>
						</tr>
						<tr>
							<td>Model Name:</td>
							<td><?php echo $model_name ?></td>
						</tr>
						<tr>
							<td>Model Category:</td>
							<td><?php echo $category ?></td>
						</tr>
						<tr>
							<td>Model Status:</td>
							<td><?php echo $status  ?></td>
						</tr>
					</table>
					</fieldset>
				</div>


		
		
