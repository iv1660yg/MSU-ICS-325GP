<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if(isset($_SESSION['user_id']) =="") {
	header("Location: index.php");
}

if (isset($_POST['updatepassword'])) {
		
		$password0 = $_SESSION['password'];
		$password1 = $_POST['password1'] ;
		$password2 = $_POST['password2'] ;


		if ($password0 == $password1) {
			$error_message = "Error new password can not old match!";
		}

		elseif ($password1 == $password2) {

			// include mysql conection 
			include_once("db_connect.php");

			if (mysqli_query($conn, " UPDATE users SET password = '" . md5($password1) . " ' WHERE user_id = " .$_SESSION['user_id']." ")){
			$error_message = "Password successfully changed!";
			}
			else {
				//unable to run sql query to update password
				$error_message = "System Error";
			}
		}
	

		else {

			$error_message = "Error password does not match!";

		}
		


	} else {
		$error_message = "";
	}


?>

<head>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-1.7.min.js"></script>
<script src="script.js"></script>
</head>
<div class="login-page">
  <div class="form">
  	<fieldset>
	<legend>Change Password</legend>	
    <form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
      <input type="password" name="password1" placeholder="new password" required class="form-control" />
      <input type="password" id="pswd" name="password2" placeholder="confirm password" required class="form-control" />
      <button type="submit" name="updatepassword">Change Password</button>
	  <?php echo "<BR>" .$error_message ?>
	  <div id="pswd_info">
			<h4>Password must meet the following requirements:</h4>
			<ul>
				<li id="letter" class="invalid">At least <strong>one letter</strong></li>
				<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
				<li id="number" class="invalid">At least <strong>one number</strong></li>
				<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
			</ul>
		</div>
	  </fieldset>
	</form>
  </div>
</div>