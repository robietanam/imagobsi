<?php
include("utils/auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Task 1</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="dashboard">
<h1>TASK 1 </h1>
<p>Hallo <?php echo $_SESSION['username']; ?>! </p>
<p>Kamu telah berhasil login.</p>
<p><a href="dashboard.php">Dashboard</a> | <a href="logout.php" class="logout-btn">Logout</a></p>
</div>
</body>
</html>