<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">

<!––if login user is admin-->
<?php if ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="admin" ) )) { ?>

<a class="active" href="#home">Home</a>

<a href="profile">Profile</a>

<a href="logout.php">logout</a>


<!––if login user is tech-->
<?php } elseif ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="tech" ) )) { ?>

<a class="active" href="#home">Home</a>

<a href="profile">Profile</a>

<a href="logout.php">logout</a>



<?php } elseif ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="enduser" ) )) { ?>

<a class="active" href="#home">Home</a>

<a href="logout.php">logout</a>


 <?php } else { ?>
<a class="active" href="#home">Home</a>

<a href="login.php">Login</a>
<a href="register.php">Register</a>

<?php } ?>

</div>
</body>
</html>
