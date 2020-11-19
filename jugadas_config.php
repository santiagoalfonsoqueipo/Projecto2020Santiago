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

$sqlu = "SELECT * from apuestas where id_usuario = '$id_usuario'";
$resultsqlu = $conn->query($sqlu);
echo " Sus jugadas son";
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
        echo "<table class='table table-dark'> ";
        echo " <thead> ";
        echo " <tr>";
        echo " <th scope='col'>id_juego</th>";
        echo " <th scope='col'>fecha_apuesta</th>";
        echo " <th scope='col'>cantidad</th>";
        echo " </tr>";
        echo " </thead>";
        echo "<tr>";
        echo "<td>" . $row['id_juego'] . "</td>";
        echo "<td>" . $row['fecha_apuesta'] . "</td>";       
        if ($row['cantidad'] > 0) {
            echo "<td class='bg-success text-center'>" . $row['cantidad'] . "</td>";
        } else {
            echo "<td class='bg-danger text-center'>" . $row['cantidad'] . "</td>";
        }

        echo "</tr>";

        
    }
  
  
} 
$conn->close();
?> 
