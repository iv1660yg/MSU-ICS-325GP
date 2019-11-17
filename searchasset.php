<?php 
session_start();
include('header.php');
include_once("db_connect.php");

if(isset($_SESSION['user_id']) =="") {
	header("Location: index.php");
}

if (empty($_POST["keyword"])) {
	$searcherr = "";
  } elseif (!empty($_POST["keyword"]) AND !preg_match("/^[a-zA-Z0-9 ]+$/",$_POST["keyword"])) {
	$searcherr = "Keyword must contain only numbers and alphabets.";
  }

?>

<head>
  <link rel="stylesheet" href="css/style.css">
</head>
<div class="search-page">
  <div class="form">
  	<fieldset>
	<legend>Search Assets</legend>	
    <form class="login-form" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
      <input type="text" name="keyword" placeholder="Enter A Serail Number" required class="form-control" />
      <button type="submit" name="search">Search Assets</button>
	  <?php echo "<BR>" .$error_message ?>

<table align="center" width="350">
	  <?php
// DB file
include_once("db_connect.php");
  


if(!empty($_POST['keyword'] && preg_match("/^[a-zA-Z0-9 ]+$/",$_POST["keyword"])))


{

      $aKeyword = explode(" ", trim($_POST['keyword']));
    

      $query ="SELECT * FROM assets WHERE serialnumber like '%" . $aKeyword[0] . "%'";
      
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
          $query .= " OR serialnumber like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = mysqli_query($conn, $query);
     echo "<tr>";
     echo "<td colspan='2'><br>You have searched for keywords: " . $_POST['keyword'];
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br>Result Found: ";
        echo "</td>";
        echo "</tr>";
        echo "<br><tr>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr><td> Result ".$row_count." </td> <td><a href=assetdetails.php?id=".$row['asset_id'].">" . $row['serialnumber'] ."</a><td></tr>";
        }
        echo "</tr>";
    }
    else {
        echo "<br>Result Found: NONE";
    }
}


?>
</table>
	  </fieldset>
    </form>
  </div>
</div>
