<?php 
ob_start();
include_once("cripts/linkup.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" . md5($password). "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['uid'];
		$_SESSION['user_name'] = $row['user'];		
		header("Location: index.php");
	} else {
		$error_message = "Ouch! Wrong Username or Password";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in to Vacation Lounge Membership</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <center>
            <div id="center">
			<form role="form" style="max-width:450px;margin:auto" id="main"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">

              <h3>User Log In</h3>
                        <font color="#FF0000"><?php if (isset($error_message)) { echo $error_message; } ?></font>
            
                       <div id="grow">
                        <div>
                            <i class="fa fa-user icon" id="icn"></i>
                            <input type="text" name="email" class="user user-input" placeholder="Username" required id="email">
                           </div>
                           
                           <div>
                                <i class="fa fa-key icon"></i>
                            <input type="password" name="password" class="user user-input" placeholder="Password" required id="password">
                           </div>
                       </div>

                      <div id="checks">
                        <input name="remember" type="checkbox" class="check" value="yes" checked="CHECKED" id="remember">Remember me
                      </div><br>

                      <div>
                        <input name="login" type="submit" class="login" id="login" value="Login">
                     </div><br><br><br><br><br><br>

                     <div class="butm">
                        <a href="#" class="but">Forgot password?</a>
                    </div>
                    <div class="but-m">
                        New Here?
                        <a href="register.php"  class="reg"> <b>Register</b></a>
                     </div>
                    </form>
            </div>
                

                
    </center>
    
    
</body>
</html>