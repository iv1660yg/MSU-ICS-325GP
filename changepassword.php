<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if(isset($_SESSION['user_id']) =="") {
	header("Location: index.php");
}

if (isset($_POST['updatepassword'])) {
		
		$password1 = $_POST['password1'] ;
		$password2 = $_POST['password2'] ;

		if ($password1 == $password2) {
			include_once("db_connect.php");
			if (mysqli_query($conn, "UPDATE users SET password = " . $password1. " WHERE user_id = " .$_SESSION['user_id']." ")){
			$error_message = "Password successfully changed!";
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
</head>
<div class="login-page">
  <div class="form">
  	<fieldset>
	<legend>Change Password</legend>	
    <form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
      <input type="password" name="password1" placeholder="new password" required class="form-control" />
      <input type="password" name="password2" placeholder="confirm password" required class="form-control" />
      <button type="submit" name="updatepassword">Change Password</button>
	  <?php echo "<BR>" .$error_message ?>
	  </fieldset>
    </form>
  </div>
</div>