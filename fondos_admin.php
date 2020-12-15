<?php

session_start();


$id_usuario = $_SESSION['id_usuario'];


include 'assets/includes/conex.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Devuelve en response con un form con todos los datos de fondos y actualiza la tabla de administrador

echo "
<br>
<select name='fondos-list' id='fondos-list'>
<option value='id_fondo'>id_fondo</option>
<option value='id_usuario'>id_usuario</option>
<option value='cantidad'>cantidad</option>
</select>
<br>
<br>
<input type='text' id='depositos-buscador'> 
<br>

<form id='formulario_referidos' name='formulario_fondos' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_fondo</th>
<th class='text-success' scope='col'>id_usuario</th>
<th class='text-success' scope='col'>cantidad</th>
<th class='text-success' scope='col'></th>
</tr>
</thead>

<tbody> 
";

$contador = 1;
$sqlu = "SELECT * from depositos ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_fondo$contador' id='id_fondo$contador' value='$row[id_fondo]' disabled> </th>";
    echo "<td> <input  type='text' name='id_usuario$contador' id='id_usuario$contador' value='$row[id_usuario]'> </td>";
    echo "<td> <input  type='text' name='cantidad$contador' id='cantidad$contador' value='$row[cantidad]'> </td>";  
    echo "<td>";
    echo " <button type='button' id='alterar_fondos_$contador'>alterar</button> <button type='button' id='borrar_fondos_$contador'>borrar</button>";
    echo "</td>";
    echo "</tr>";
    $contador++;

     }
  
 } 
 
echo "
<tr>
<th scope='row'> <input name='id_fondoi'   id='id_fondoi'  value=''> </th>
<th scope='row'> <input name='id_usuarioi'   id='id_usuarioi'  value=''> </th>
<td> <input  type='text' name='cantidad' id='cantidad' value=''> </td>
<td>
<button type='button' id='agregar_fondos'>agregar</button> 
</td>
</tr>
</tbody>

</table>

</form>
</br>                       


<div id='alerta_fondos'>
</div>

";

$conn->close();
?> 
