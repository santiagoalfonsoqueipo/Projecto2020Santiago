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
<select name='referidos-list' id='referidos_list'>
<option value='id_referido'>id_referido</option>
<option value='id_referidor'>id_referidor</option>                                     
</select>         
<input type='text' id='referidos_buscador'>
</br>
</br>
<form id='formulario_referidos' name='formulario_referidos' method='post' >
<table  class='table table-dark'>
<thead>
<tr>
<th class='text-success' scope='col'>id_referido</th>
<th class='text-success' scope='col'>id_referidor</th>
<th class='text-success' scope='col'></th>
</tr>
</thead>

<tbody> 
";

$contador = 0;
$sqlu = "SELECT * from referidos ";
$resultsqlu = $conn->query($sqlu);
if ($resultsqlu->num_rows > 0) {
    while ($row = $resultsqlu->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'><input  type='text' name='id_referido_$contador' id='id_referido_$contador' value='$row[id_referido]' disabled> </th>";
    echo "<td> <input  type='text' name='id_referidor_$contador' id='id_referidor_$contador' value='$row[id_referidor]'> </td>";
    echo "<td>";
    echo " <button type='button' id='alterar_$contador'>alterar</button> <button type='button' id='borrar_$contador'>borrar</button>";
    echo "</td>";
    echo "</tr>";
    $contador++;

     }
  
 } 
 
echo "
<tr>
<th scope='row'> <input name='id_referidoi'   id='id_referidoi'  value=''> </th>
<td> <input  type='text' name='id_referidori' id='id_referidori' value=''> </td>
<td>
<button type='button' id='agregar_1'>agregar</button> 
</td>
</tr>
</tbody>

</table>

</form>
</br>                       


<div id='alerta_referidos'>
</div>

";

$conn->close();
?> 
