<?php
# fichero que inicia sesiones y borra el array del mismo - redireciona de vuelta al index
session_start();
$_SESSION = array();
header("Location: index.php");
?>

