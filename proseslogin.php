<?php
session_start();
include_once('config.php');
if(isset($_POST['login'])){
    extract($_POST);
    $user = mysqli_query($conn,"select * from tbuser where username='$username'");
    $data = mysqli_fetch_array($user);
    if(password_verify($password,$data['password'])){
       $_SESSION['useername'] = $data['username'];
       $_SESSION['nama_user'] = $data['nama_user'];
       $_SESSION['iduser'] = $data['iduser'];
       header('location:index.php');
    }else{
        header('location:login.php');
    }
}
?>