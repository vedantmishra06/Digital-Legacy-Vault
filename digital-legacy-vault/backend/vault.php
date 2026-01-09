<?php
require_once "db.php";
if(!isset($_SESSION['user_id'])) exit;

if(isset($_POST['save_vault'])) {
    $uid=$_SESSION['user_id'];
    $title=$_POST['title'];
    $secret=openssl_encrypt($_POST['secret'],"AES-128-ECB","vault_key");

    $stmt=$conn->prepare("INSERT INTO vaults(user_id,title,secret) VALUES(?,?,?)");
    $stmt->bind_param("iss",$uid,$title,$secret);
    $stmt->execute();

    header("Location: ../dashboard.php");
}
?>
