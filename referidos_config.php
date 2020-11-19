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

$sqlu = "SELECT * from referidos where id_referidor = '$id_usuario'";
$resultsqlu = $conn->query($sqlu);
$contador = 1;
echo " Sus referidos son";
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
        
        echo "<table class='table table-dark'> ";
        echo " <thead> ";
        echo " <tr>";
        echo "<th scope='col'>Fila</th>";
        echo " <th scope='col'>id_referido</th>";
        echo " <th scope='col'>id_referidor</th>";
        echo " </tr>";
        echo " </thead>";
        echo "<tr>";
        echo "<th scope='row'>" . $contador . "</th>";
        echo "<td>" . $row['id_referido'] . "</td>";
        echo "<td>" . $row['id_referidor'] . "</td>";

        $contador++;
    }
  
  
} 
$conn->close();
?> 
