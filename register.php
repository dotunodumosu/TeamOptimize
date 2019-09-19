<?php 
ob_start();
include_once("cripts/linkup.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);	
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(user, email, pass) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
			$success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Vacation Lounge | Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <script>
 var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password does not match';
  }
}
    </script>
   <center>
        <div style="max-width:450px;" id="main">
                <div>
                        <h3>MEMBERSHIP SIGN UP</h3>
                        <div><h4><?php if (isset($success_message)) { echo $success_message; } ?></h4>
							<h4><?php if (isset($error_message)) { echo $error_message; } ?></h4>
						</div>
                    </div>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="fill" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="fill" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					
						<input type="password" name="password" placeholder="Password" required class="fill" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="fill" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					
                        <input type="submit" name="signup" value="SIGN UP" id="submit">
					
			</form><div>
                        Already a member? 
                        <a href="login.php"><b>Log In</b></a>
                    </div>
            </div>
   </center>
</body>
</html>