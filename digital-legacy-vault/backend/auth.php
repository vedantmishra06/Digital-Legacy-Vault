<?php
require_once "db.php";

if(isset($_POST['register'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt=$conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
    $stmt->bind_param("sss",$name,$email,$pass);
    $stmt->execute();

    header("Location: ../login.php");
}

if(isset($_POST['login'])) {
    $email=$_POST['email'];
    $pass=$_POST['password'];

    $stmt=$conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $res=$stmt->get_result()->fetch_assoc();

    if($res && password_verify($pass,$res['password'])) {
        $_SESSION['user_id']=$res['id'];
        header("Location: ../dashboard.php");
    } else {
        echo "Invalid Credentials";
    }
}
?>
