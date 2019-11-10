<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar2 {
  overflow: hidden;
  background-color: #333;
}

.navbar2 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown2 {
  float: left;
  overflow: hidden;
}

.dropdown2 .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar2 a:hover, .dropdown2:hover .dropbtn {
  background-color: green;
}

.dropdown2-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 5;
}

.dropdown2-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown2-content a:hover {
  background-color: #ddd;
}

.dropdown2:hover .dropdown2-content {
  display: block;
}
</style>
</head>
<body>

<!––if login user is admin-->
<?php if ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="admin" ) )) { ?>

<div class="navbar2">
  <a href="../index.php">Home</a>
  <div class="dropdown2">
    <button class="dropbtn">Search 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../searchuser.php">Search User</a>
      <a href="../searchasset.php">Search Assets</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">Manage 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../users/index.php">Users</a>
      <a href="#">Assets</a>
      <a href="#">Models</a>
      <a href="#">Suppliers</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../profile.php">View Profile</a>
      <a href="../changepassword.php">Change Password</a>
    </div> 
  </div>
  <a href="../logout.php">Logout</a>
</div>

<!––if login user is tech-->
<?php } elseif ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="tech" ) )) { ?>
<div class="navbar2">
  <a href="../index.php">Home</a>
  <div class="dropdown2">
    <button class="dropbtn">Search 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../searchuser.php">Search User</a>
      <a href="../searchasset.php">Search Assets</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">Update 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="#">Assets</a>
      <a href="#">Models</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../profile.php">View Profile</a>
      <a href="../changepassword.php">Change Password</a>
    </div> 
  </div>
  <a href="../logout.php">Logout</a>
</div>
<!––if login user is enduser-->
<?php } elseif ((isset($_SESSION['user_id']) AND (($_SESSION['userType'])=="enduser" ) )) { ?>

<div class="navbar2">
  <a href="../index.php">Home</a>
  <div class="dropdown2">
    <button class="dropbtn">Search 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../searchuser.php">Search User</a>
      <a href="../searchasset.php">Search Assets</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">View 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="#">Assets</a>
      <a href="#">Models</a>
    </div> 
  </div>
  <div class="dropdown2">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown2-content">
      <a href="../profile.php">View Profile</a>
      <a href="../changepassword.php">Change Password</a>
    </div> 
  </div>
  <a href="../logout.php">Logout</a>
</div>

<!––if no one logged in-->
<?php } else { ?>
<div class="navbar2">
  <a href="../index.php">Home</a>
  <a href="../register.php">Register</a>
  <a href="../login.php">Login</a>
</div>

<?php } ?>

</body>
</html>
