<?php
//include for bien siteurl
include("config/constants.php");

//destroy session
session_destroy();//unset session user

//chuyen ve trang login
header("location:".SITEURL."login-sv.php");
?>