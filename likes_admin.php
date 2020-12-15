<?php

session_start();


$id_usuario = $_SESSION['id_usuario'];


include 'assets/includes/conex.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Devuelve en response una tabla con todas las jugadas de el usuario que lo requiera

echo "


<form id='formulario_referidos' name='formulario_likes' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_usuario</th>
<th class='text-success' scope='col'>id_like</th>
</tr>
</thead>

<tbody> 
";

$contador = 1;
$sqlu = "SELECT * from likes ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_usuario$contador' id='id_usuario$contador' value='$row[id_usuario]' disabled> </th>";
    echo "<td> <input  type='text' name='id_like$contador' id='id_like$contador' value='$row[id_like]'> </td>"; 
    echo "<td>";
    echo "</td>";
    echo "</tr>";
    $contador++;

     }
  
 } 
 
echo "

</tbody>

</table>

</form>
</br>                       


<div id='alerta_likes'>
</div>

";

$conn->close();
?> 
