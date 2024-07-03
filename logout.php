<?php
session_start();
session_destroy();
header("Location: science.php");
exit();
?>
