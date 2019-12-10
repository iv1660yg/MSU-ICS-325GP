<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if (!empty($_GET)){

	$aID = (int) $_GET['id'];

}


$result = mysqli_query($conn, "SELECT * FROM assets left OUTER join users using (user_id) WHERE asset_id = '" . $aID. "' ");
$row = mysqli_fetch_array($result);
$aSid = $row['asset_id'];
$serialnumber = $row['serialnumber'];
$userID = $row['user_id'];
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
$price = $row['unit_price'];
$rental= $row['monthly_rental_price'];	
$status = $row['asset_status'];						

$assignto = $firstname." ".$lastname;


?>


<head>
  <link rel="stylesheet" href="css/style.css">
</head>
                
	
				<div class="main-page">
				<div class="form">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
					<fieldset>
					<legend>Asset Information</legend>	
					<table align=left>
						<tr>
							<td>Asset ID:</td>
							<td><?php echo $aID ?></td>
						</tr>
						<tr>
							<td>Asset Status:</td>
							<td><?php echo $status ?></td>
						</tr>
						<tr>
							<td>Serial Number:</td>
							<td><?php echo $serialnumber ?></td>
						</tr>
						<tr>
							<td>Unit Price:</td>
							<td><?php echo $price ?></td>
						</tr>
						<tr>
							<td>Rental Price:</td>
							<td><?php echo $rental ?></td>
						</tr>
						<tr>
							<td>Asset Assgined To:</td>
							<td>
							<select userID="user_id" ng-required="true">
                                            <option value="">Select</option>
                                            <?php 

                                                include_once("../db_connect.php");


                                                //delcare var and set its value to sql query
                                                $sqli = "SELECT * FROM users";

                            
                                                $result = mysqli_query($conn, $sqli);

                                                while ($row = mysqli_fetch_array($result)) {
                                                $user =  trim($row['firstname']. " " .$row['lastname']);
                                                $uid = $row['user_id'];
                                                echo "<option value='$uid'>$user</option>";
                                                }
                                            ?>
                             </select>
							</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><?php echo $email ?></td>
						</tr>
						<tr>
							<td>Title:</td>
							<td><?php echo $title ?></td>
						</tr>
					</table>
					</fieldset>
				</div>


		
		
