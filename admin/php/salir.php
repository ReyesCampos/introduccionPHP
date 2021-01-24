<?php
session_start();
//unset($_SESSION['userData']); //elimina una sola variable de session
session_destroy();//elimina todo
header("Location: ../login.php");
?>