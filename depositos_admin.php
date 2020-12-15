<?php

session_start();


$id_usuario = $_SESSION['id_usuario'];


include 'assets/includes/conex.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Devuelve en response un response con un formulario con todos los datos de la bd depositos al panel de administrador

echo "
</br>                       
<select name='depositos-list' id='depositos-list'>
<option value='id_deposito'>id_deposito</option>
<option value='id_fondo'>id_fondo</option>
<option value='id_usuario'>id_usuario</option>
<option value='fecha_deposito'>fecha_deposito</option>
<option value='cantidad'>cantidad</option> 
</select>                           
<input type='text' id='depositos-buscador'> 
</br>
</br>   
<form id='formulario_referidos' name='formulario_depositos' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_deposito</th>
<th class='text-success' scope='col'>id_fondo</th>
<th class='text-success' scope='col'>id_usuario</th>
<th class='text-success' scope='col'>fecha_deposito</th>
<th class='text-success' scope='col'>cantidad</th>
<th class='text-success' scope='col'></th>
</tr>
</thead>

<tbody> 
";

$contador = 0;
$sqlu = "SELECT * from depositos ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_deposito$contador' id='id_deposito$contador' value='$row[id_deposito]' disabled> </th>";
    echo "<td> <input  type='text' name='id_fondo$contador' id='id_fondo$contador' value='$row[id_fondo]'> </td>";
    echo "<td> <input  type='text' name='id_usuario$contador' id='id_usuario$contador' value='$row[id_usuario]'> </td>";
    echo "<td> <input  type='text' name='fecha_deposito$contador' id='fecha_deposito$contador' value='$row[fecha_deposito]'> </td>";
    echo "<td> <input  type='text' name='cantidad$contador' id='cantidad$contador' value='$row[cantidad]'> </td>";  
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


<div id='alerta_depositos'>
</div>

";

$conn->close();
?> 
