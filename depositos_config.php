<?php

session_start();


$id_usuario = $_SESSION['id_usuario'];


include 'assets/includes/conex.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# devuelve los depositos realizados en una table response al panel configfuracion usuario

$sqlu = "SELECT * from depositos where id_usuario = '$id_usuario'";
$resultsqlu = $conn->query($sqlu);
echo " Sus depositos son";
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
        echo "<table class='table table-dark'> ";
        echo " <thead> ";
        echo " <tr>";
        echo " <th scope='col'>id_usuario</th>";
        echo " <th scope='col'>fecha_deposito</th>";
        echo " <th scope='col'>cantidad</th>";
        echo " </tr>";
        echo " </thead>";
        echo "<tr>";
        echo "<td>" . $row['id_usuario'] . "</td>";
        echo "<td>" . $row['fecha_deposito'] . "</td>";    
        if ($row['cantidad'] > 0) {
            echo "<td class='bg-success text-center'>" . $row['cantidad'] . "</td>";
        }
        echo "</tr>";

      
    }
  
  
} 
$conn->close();
?> 
