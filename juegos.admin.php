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
</br>
<select name='juegos-list' id='juegos-list'>
<option value='id_juego'>id_juego</option>
<option value='nombre_juego'>nombre_juego</option>
</select>                           
<input type='text' id='juegos-buscador'> 
</br>
</br> 
<form id='formulario_referidos' name='formulario_juegos' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_juego</th>
<th class='text-success' scope='col'>nombre_juego</th>
</tr>
</thead>

<tbody> 
";

$contador = 1;
$sqlu = "SELECT * from juegos ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_juego$contador' id='id_juego$contador' value='$row[id_juego]' disabled> </th>";
    echo "<td> <input  type='text' name='nombre_juego$contador' id='nombre_juego$contador' value='$row[nombre_juego]'> </td>"; 
    echo "<td>";
    echo " <button type='button' id='alterar_juegos_$contador'>alterar</button> <button type='button' id='borrar_juegos_$contador'>borrar</button>";
    echo "</td>";
    echo "</tr>";
    $contador++;

     }
  
 } 
 
echo "
<tr>
<th scope='row'> <input name='id_juegoi'   id='id_juegoi'  value=''> </th>
<th scope='row'> <input name='nombre_juegoi'   id='nombre_juegoi'  value=''> </th>
<td>
<button type='button' id='agregar_juegos'>agregar</button> 
</td>
</tr>
</tbody>

</table>

</form>
</br>                       


<div id='alerta_juegos'>
</div>

";

$conn->close();
?> 
