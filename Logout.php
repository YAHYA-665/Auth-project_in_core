<?php

session_start();
$_SESSION = [];

session_destroy();
header("Location: Sign-up.php");
exit();