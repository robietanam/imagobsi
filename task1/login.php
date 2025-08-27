<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db/db.php');
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	
    $rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
	    exit();
         } else{
	    $error_message = "Username/password salah";
	}
    }
?>

<?php if(isset($error_message)): ?>
<div class="toast" id="errorToast">
    <?php echo $error_message; ?>
</div>
<script>
setTimeout(function() {
    document.getElementById('errorToast').style.display = 'none';
}, 4000);
</script>
<?php endif; ?>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Belum register ? <a href='register.php'>Register Disini</a></p>
</div>
</body>
</html>