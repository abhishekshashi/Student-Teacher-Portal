<?php
session_start();
include "class.php";
unset($_SESSION["password1"]);
unset($_SESSION["name"]);
$obj->logout_user();
?>