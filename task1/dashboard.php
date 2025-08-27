<?php
include("utils/auth.php");
require('db/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="dashboard">
<h1>Dashboard</h1>
<p>Halo selamat datang di dashboard.  <?php echo $_SESSION['username']; ?>!</p>
<p><a href="index.php">Home</a> | <a href="logout.php" class="logout-btn">Logout</a></p>
</div>
</body>
</html>