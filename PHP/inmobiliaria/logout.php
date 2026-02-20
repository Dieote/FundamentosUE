<?php
session_start();
session_destroy();
header("Location: /inmobiliaria/login.php");
exit();
?>