<?php
require "./config.php";
$_SESSION = ["id"];
session_unset();
session_destroy();
echo "<script>alert('You are Loged out!')<script>";
header("Location: index.php");
