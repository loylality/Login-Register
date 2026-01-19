<?php
session_start();

// সব session destroy
session_unset();
session_destroy();

// login page এ পাঠিয়ে দাও
header("Location: design.php");
exit();
?>
