//register html page
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
    
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="loginpage.php">Sign in</a>
  	</p>
  </form>
</body>
</html>

<?php

//register page
//connect to database
require 'connect.php';
//initialize variables
$username = "";
$errors = array();
//register users
if (isset($_POST['reg_user'])) {
    //receive all input values from the form
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password_1 = mysqli_real_escape_string($mysqli, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($mysqli, $_POST['password_2']);
    //form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    //register the user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt password before storing in database (security)
        $query = "INSERT INTO users (user_name, password) VALUES ('$username','$password')";
        mysqli_query($mysqli, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}



?>