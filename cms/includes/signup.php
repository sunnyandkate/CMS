

<?php $title = "Sign up"; ?>
<?php include "db_connect.php"; ?>
<?php include "header.php"; ?>
<link rel="stylesheet" type="text/css" href="../styles2.css">

<?php

	$errorName="";
	$errorEmail = "";
    $errorPassword="";
	

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
	$useremail = $_POST['useremail'];
    $user_password = $_POST['user_password'];
	

    $username = mysqli_real_escape_string($connection, $username);
    $user_password = mysqli_real_escape_string($connection, $user_password);

	if(empty($_POST['username'])){
            $errorName= 'name is required';
			
        }
	if(empty($_POST['useremail'])){
            $errorEmail= 'email is required';
			
        }
    if(empty($_POST['user_password'])){
            $errorPassword = 'password is required';
			
      }
	  
	
	$check = "SELECT username FROM users WHERE username='$username'";
	$result = mysqli_query($connection, $check);
	if(mysqli_num_rows($result)) {
		$errorName = "Username already exists";
	}
	else{

		
	header("Location: ../blog.php");
	
	
    $query = "INSERT INTO users (username, useremail, user_password) ";
	$query .= "VALUES ('$username', '$useremail', '$user_password')";
    $insert_user_query = mysqli_query($connection, $query);
	}
    
}

?>

<div class="login-container">
    
    <div class="login">
        <h2>SIGN UP</h2>
        <form action="signup.php" method="post" class="login-form" autocomplete = "off">
            <input type="text" name="username" placeholder="Enter Username" autocomplete = "false">
			<span class="red-text"><?php echo $errorName; ?></span>
			<input type="text" name="useremail" placeholder="Enter Email" autocomplete = "false">
			<span class="red-text"><?php echo $errorEmail; ?></span>
            <input type="password" name="user_password" placeholder="Enter Password">
			 <span class="red-text"><?php echo $errorPassword; ?></span>
		   <button class="login-btn" type="submit" name="signup">Sign up</button>
			
        </form>
    </div>

	


<?php include "footer.php"; ?>