<?php

session_start();

// response de un form con todos los datos de la BD para seccion apuestas

$id_usuario = $_SESSION['id_usuario'];


include 'assets/includes/conex.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

# Devuelve en response una tabla con todas las jugadas de el usuario que lo requiera

echo "
<br>
<select name='apuestas-list' id='apuestas-list'>
<option value='id_apuesta'>id_apuesta</option>
<option value='id_juego'>id_juego</option>
<option value='id_fondo'>id_fondo</option>
<option value='id_usuario'>id_usuario</option>
<option value='fecha_apuesta'>fecha_apuesta</option>
<option value='cantidad'>cantidad</option> 
</select>                           
<input type='text' id='apuestas-buscador'> 
<br>
<br>

<form id='formulario_referidos' name='formulario_apuestas' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_apuesta</th>
<th class='text-success' scope='col'>id_juego</th>
<th class='text-success' scope='col'>id_fondo</th>
<th class='text-success' scope='col'>id_usuario</th>
<th class='text-success' scope='col'>fecha_apuesta</th>
<th class='text-success' scope='col'>cantidad</th>
<th class='text-success' scope='col'></th>
</tr>
</thead>

<tbody> 
";

$contador = 1;
$sqlu = "SELECT * from apuestas ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_apuesta$contador' id='id_apuesta$contador' value='$row[id_apuesta]' disabled> </th>";
    echo "<td> <input  type='text' name='id_juego$contador' id='id_juego$contador' value='$row[id_juego]'> </td>";
    echo "<td> <input  type='text' name='id_fondo$contador' id='id_fondo$contador' value='$row[id_fondo]'> </td>";
    echo "<td> <input  type='text' name='id_usuario$contador' id='id_usuario$contador' value='$row[id_usuario]'> </td>";
    echo "<td> <input  type='text' name='fecha_apuesta$contador' id='fecha_apuesta$contador' value='$row[fecha_apuesta]'> </td>";
    echo "<td> <input  type='text' name='cantidad$contador' id='cantidad$contador' value='$row[cantidad]'> </td>";    
    echo "<td>";
    echo " <button type='button' id='alterar_apuestas_$contador'>alterar</button> <button type='button' id='borrar_apuestas_$contador'>borrar</button>";
    echo "</td>";
    echo "</tr>";
    $contador++;

     }
  
 } 
 
echo "
<tr>
<th scope='row'> <input name='id_apuestai'   id='id_apuestai'  value=''> </th>
<th scope='row'> <input name='id_juegoi'   id='id_juegoi'  value=''> </th>
<td> <input  type='text' name='id_fondoi' id='id_fondoi' value=''> </td>
<td> <input  type='text' name='id_usuarioi' id='id_usuarioi' value=''> </td>
<td> <input  type='text' name='fecha_apuestai' id='fecha_apuestai' value=''> </td>
<td> <input  type='text' name='cantidadi' id='cantidadi' value=''> </td>
<td>
<button type='button' id='agregar_apuestas'>agregar</button> 
</td>
</tr>
</tbody>

</table>

</form>
</br>                       


<div id='alerta_apuestas'>
</div>

";

$conn->close();
?> 
