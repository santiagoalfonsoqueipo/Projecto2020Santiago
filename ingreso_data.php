<?php

session_start();


$id_usuario = $_SESSION['id_usuario'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_casino";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# comprobar datos de login

$sqlu = "select *from  fondos WHERE id_usuario='$id_usuario';";
$resultsqlu = $conn->query($sqlu);


if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
        echo "<form id='formulario_config' name='formulario_config' method='post' > ";      
        echo "<p>Sus fondos son: ";
        echo $row['cantidad'] ;
        echo " Euros </p>";
        
        echo "<p> ¿Que cantidad le gustaria ingresar? </p>";
        echo "<input type='text' name='cantidad_ingresar' id='cantidad_ingresar' value=''>";
        echo "<button type='button' id='ingreso_fondo'>Ingresar</button>";
        echo "</form>";
    }
}

?> 