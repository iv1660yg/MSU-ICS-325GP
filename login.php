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
		$_SESSION['lastname'] = $row['lastname'];	
		$_SESSION['userType'] = $row['userType'];	
		header("Location: index.php");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>


<div class="container">
	<h2 align=center>MidTown Tech</h2>		
	<div class="row">
		<div class="">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Employee Login</legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>	
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="">	
		
		</div>
	</div>