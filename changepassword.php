<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" .$password. "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['firstname'] = $row['firstname'];	
		$_SESSION['middle'] = $row['middle'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['userType'] = $row['userType'];	
		header("Location: index.php");

	} elseif (isset($_POST['updatepassword'])) {
		
		$password1 = $_POST['password1'] ;
		$password2 = $_POST['password2'] ;

		if ($password1 == $password2) {
			include_once("db_connect.php");
			mysqli_query($conn, "UPDATE 'users' SET 'password' = " .$password1. " WHERE 'users'.'user_id' = " .$_SESSION['user_id']." ");
		}
		else {
			$error_message = "password does not match" ;

		}









	} else {
		$error_message = "error !!!";
	}


}
?>

<head>
  <link rel="stylesheet" href="css/style.css">
</head>
<div class="login-page">
  <div class="form">
  	<fieldset>
	<legend>Employee Login</legend>	
    <form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
      <input type="password" name="password1" placeholder="password" required class="form-control" />
      <input type="password" name="password2" placeholder="password" required class="form-control" />
      <button type="submit" name="updatepassword">Change Password</button>
	  <?php echo $error_message ?>
	  </fieldset>
    </form>
  </div>
</div>