<?php
session_start();
include('conexion/config.php');

date_default_timezone_set("America/Bogota");
$sesionHasta   = date("Y-m-d H:i:A");

$Update = ("UPDATE myusers SET sesionHasta='$sesionHasta' WHERE IdUser='".$_SESSION["IdUser"]."' ");
$resultado = mysqli_query($con, $Update);

/
setcookie ($_SESSION['IdUser'], "", 1);
setcookie ($_SESSION['IdUser'], false);
unset($_COOKIE[$_SESSION['IdUser']]);


unset ($_SESSION['IdUser']); 
session_unset(); 


session_destroy();
$parametros_cookies = session_get_cookie_params();
setcookie(session_name(),0,1,$parametros_cookies["path"]);

header("Location: index.php?sc=1");
?>
