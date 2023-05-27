<?php
session_start();
require "./config.php";
$_SESSION['login'] === false;
$_SESSION['id'] === 'id';
session_unset();
session_destroy();
echo "<script>alert('You are Loged out!')<script>";
header("Location: index.php");
