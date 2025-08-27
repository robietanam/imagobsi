<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db/db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 

	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            $success_message = "Berhasil registrasi!";
        }
    }
?>


<?php if(isset($success_message)): ?>
<div class="toast success" id="successToast">
    <?php echo $success_message; ?>
</div>
<script>
setTimeout(function() {
    document.getElementById('successToast').style.display = 'none';
}, 4000);
</script>
<p style="text-align: center; margin-top: 20px;">
    <a href='login.php'>Click here to Login</a>
</p>
<?php else: ?>
    
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
<?php endif; ?>
</div>
</body>
</html>