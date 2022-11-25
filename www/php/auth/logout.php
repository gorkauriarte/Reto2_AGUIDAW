<?php
session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['id_usuario']);
unset($_SESSION['email']);
session_destroy();
header("location:/index.php");
exit();