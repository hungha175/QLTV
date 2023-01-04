<?php
require_once 'connect.php';
    session_destroy();
    header("location:loginform.php");
    
?>