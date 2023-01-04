<?php
require_once 'connect.php';
if(isset($_POST["login"])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $sql = "SELECT * FROM `login` WHERE `username`='$u' and `password`='$p'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($query);
    if(count($row))
    {
        $_SESSION["login"] = $row;
        header("Location: homepage.php");
    
    } 
    else 
    {
        echo"Đăng nhập thất bại";
        require_once 'loginform.php';
    }  
}
?>