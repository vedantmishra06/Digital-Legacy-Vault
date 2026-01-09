<?php
require_once "backend/db.php";
if(!isset($_SESSION['user_id'])) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="dashboard">
<h2>Your Vault</h2>

<form action="backend/vault.php" method="POST">
<input type="text" name="title" placeholder="Vault Title" required>
<textarea name="secret" placeholder="Your secret message"></textarea>
<button name="save_vault">Save</button>
</form>

<a href="logout.php" class="logout">Logout</a>
</div>

</body>
</html>
