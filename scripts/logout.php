<?php
session_start();

session_destroy();
header("Location:../newindex.php");
?>