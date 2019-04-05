<?php
require_once "bootstrap.php";
session_start();
if(!isset($_SESSION['username'])){
	die ("<div style = 'padding: 50px'> Please Login first to Logout <br/><a class = 'btn btn-info' href = 'login.php'>Login</a></div>");
}
session_destroy();
header('Location: index.php');
return;
 ?>